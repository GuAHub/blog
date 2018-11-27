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

        $jointable = $this->Contents->find()
            ->join([
                'table' => 'users',
                'alias' => 'u',
                'type' => 'INNER',
                'conditions' => 'u.id = contents.userid',
            ])->select([
                'id' => 'Contents.id',
                'title' => 'Contents.title',
                'body' => 'Contents.body',
                'img' => 'Contents.img',
                'category' => 'Contents.category',
                'postname' => 'u.name',
                'created' => 'Contents.created',
            ])->where(['u.id' => $userid]);


        $contents = $this->paginate($jointable);

        foreach ($contents as $content) {
            $content->img = parent::display_img($content->img, "90%", "");

        }

        $myicon = parent::display_img($user->icon, "20%", "20%");
        $myheader = parent::display_img($user->header, "100%", "");
        $mybackicon = parent::display_img($user->backicon, "50%", "");
        $this->set(compact('user', 'myicon','myheader','mybackicon','contents'));
    }

}
