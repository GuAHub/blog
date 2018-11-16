<?php
namespace App\Controller;

use App\Controller\AppController;

class ContentDeleteController extends AppController
{
    public function index($id = null)
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
