<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();

        $this->Users = TableRegistry::get("users");
        $this->Contents = TableRegistry::get("contents");

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'timeline'
            ],
            'logoutRedirect' => [
                'controller' => 'login',
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
        ]);
    }

    //フォームから受け取った画像配列データをbase64にして返す
    public function img_64encode($getimg)
    {
        if ($getimg['size'] > 0) {
            return base64_encode(file_get_contents($getimg['tmp_name']));
        } else {
            return "";
        }
    }

    //DBから受け取ったsourceデータを開きimgタグとして返す
    public function display_img($myicon,$width,$height)
    {
        if(is_null($myicon)){
            return "";
        }elseif(is_string($myicon)){
            return "<img width='" . $width . "' height='" . $height . "' src='data:image/png;base64," . $myicon . "'>";
        }
        $myiconsource = stream_get_contents($myicon);
        if (mb_strlen($myiconsource) > 0) {
            return "<img width='" . $width . "' height='" . $height . "' src='data:image/png;base64," . $myiconsource . "'>";
        } else {
            return "";
        }
    }

    public function contentdelete($id)
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
