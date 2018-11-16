<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Mypage Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Table\ContentsTable $Contents
 *
**/

class MypageController extends AppController
{

        //index method
    public function index()
    {
        $userid = $this->Auth->user('id');
        $user = $this->Users->get($userid, [
            'contain' => []
        ]);

        $myicon = parent::display_img($user->icon, "50%", "50%");
        $this->set(compact('user', 'myicon'));
    }

}
