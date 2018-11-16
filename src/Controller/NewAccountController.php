<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class NewAccountController extends AppController
{

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow('index');
    }

    public function index()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $get_data = $this->request->getData();

            $user = $this->Users->patchEntity($user, $get_data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('アカウントが作成されました'));
                return $this->redirect(['controller' => 'login']);
            }
            $this->Flash->error(__('作成に失敗しました'));
        }
        $this->set(compact('user'));
    }
}
