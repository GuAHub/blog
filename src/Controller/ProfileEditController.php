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

            $profile = [
                'name' => $data['name'],
                'color' => $data['color'],
            ];

                if($data['icon']['size'] > 0){
                    $profile['icon'] = parent::img_64encode($data['icon']);
                }

                if($data['header']['size'] > 0){
                    $profile['header'] = parent::img_64encode($data['header']);
                }

                if($data['backicon']['size'] > 0){
                    $profile['backicon'] = parent::img_64encode($data['backicon']);
                }

            $user = $this->Users->patchEntity($user, $profile);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('プロフィールを変更しました'));

                return $this->redirect(['controller' => 'Mypage']);
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
