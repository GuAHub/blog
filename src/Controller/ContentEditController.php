<?php
namespace App\Controller;

use App\Controller\AppController;

class ContentEditController extends AppController
{

    public function index($id = null)
    {
        $content = $this->Contents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $get_data = $this->request->getData();
            $userid = $this->Auth->user('id');

            $content = $this->Contents->patchEntity(
                $content,
                [
                    'title' => $get_data['title'],
                    'body' => $get_data['body'],
                    'img' => parent::img_64encode($get_data['img']),
                    'userid' => $userid,
                    'category' => $get_data['category']
                ]
            );
            if ($this->Contents->save($content)) {
                $this->Flash->success(__("保存に成功しました"));

                return $this->redirect(['controller' => 'timeline']);
            }
            $this->Flash->error(__('保存に失敗しました。もう一度実行してください。'));
        }
        $this->set(compact('content'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $content = $this->Contents->get($id);
        if ($this->Contents->delete($content)) {
            $this->Flash->success(__('削除に成功しました。'));
        } else {
            $this->Flash->error(__('削除に失敗しました。もう一度実行してください。'));
        }

        return $this->redirect(['controller' => 'timeline']);
    }

}
