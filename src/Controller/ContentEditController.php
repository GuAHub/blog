<?php
namespace App\Controller;

use App\Controller\AppController;

class ContentEditController extends AppController
{


    public function index($id = null)
    {
        $get_data = $this->request->getData();
        $userid = $this->Auth->user('id');

        $content = $this->Contents->get($id, [
            'contain' => []
        ]);
        if ($this->Auth->user('id') <> $content->userid) {
            $this->Flash->success(__("このページにはアクセスできません。"));
            return $this->redirect(['controller' => 'timeline']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {

            $contentdata = [
                'title' => $get_data['title'],
                'body' => $get_data['body'],
                'userid' => $userid,
                'category' => $get_data['category']
            ];

            if($get_data['img']['size'] > 0){
                $contentdata['img']= parent::img_64encode($get_data['img']);
            }

            $this->Contents->patchEntity($content, $contentdata);

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

        $userid = $this->Auth->user('id');
        if ($this->Auth->user('id') <> $content->userid) {
            $this->Flash->success(__("このページにはアクセスできません。"));
            return $this->redirect(['controller' => 'timeline']);
        }

        if ($this->Contents->delete($content)) {
            $this->Flash->success(__('削除に成功しました。'));
        } else {
            $this->Flash->error(__('削除に失敗しました。もう一度実行してください。'));
        }

        return $this->redirect(['controller' => 'timeline']);
    }

}
