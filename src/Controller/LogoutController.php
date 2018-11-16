<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class LogoutController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow('index');
    }

    public function index()
    {
        return $this->redirect($this->Auth->logout());
    }
}
