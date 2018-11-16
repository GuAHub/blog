<?php
namespace App\Controller;

use App\Controller\AppController;

class NewContentController extends AppController
{

    public function index()
    {
        $content = $this->Contents->newEntity();
        if ($this->request->is('post')) {

            $get_data = $this->request->getData();

            $userid = $this->Auth->user('id');

            $file['size'] = $get_data['img']['size'];

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
                $this->Flash->success(__('作成に成功しました。'));

                return $this->redirect(['controller' => 'timeline']);
            }
            $this->Flash->error(__('保存に失敗しました。もう一度実行してください。'));
        }
        $this->set(compact('content'));
    }
}
