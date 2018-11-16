<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ProfileEditController extends AppController
{
    public function index()
    {
        $userid = $this->Auth->user('id');
        $user = $this->Users->get($userid, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            debug($data);
            $profile = [
                'name' => $data['name'],
                'icon' => parent::img_64encode($data['icon']),
                'header' => parent::img_64encode($data['header']),
                'color' => $data['color'],
                'backicon' => parent::img_64encode($data['backicon']),
            ];

            $user = $this->Users->patchEntity($user, $profile);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('プロフィールを変更しました'));

                return $this->redirect(['controller' => 'timeline']);
            }
            $this->Flash->error(__('保存に失敗しました。もう一度実行してください'));
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod('delete');
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('削除に成功しました。'));
        } else {
            $this->Flash->error(__('削除に失敗しました。もう一度実行してください。'));
        }

        return $this->redirect(['Controller' => 'logout']);
    }
}
