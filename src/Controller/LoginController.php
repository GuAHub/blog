<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class LoginController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow('index');
    }

    public function index()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('ユーザ名もしくはパスワードが間違っています'));
        }
    }
}
