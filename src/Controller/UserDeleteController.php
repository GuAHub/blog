<?php
namespace App\Controller;

use App\Controller\AppController;

class DeleteController extends AppController
{
    public function index($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('削除に成功しました。'));
        } else {
            $this->Flash->error(__('削除に失敗しました。もう一度実行してください。'));
        }

        return $this->redirect(['Controller' => 'logout']);
    }
}
