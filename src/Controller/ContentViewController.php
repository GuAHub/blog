<?php
namespace App\Controller;

use App\Controller\AppController;

class ContentViewController extends AppController
{
    public function index($id = null)
    {
        $content = $this->Contents->get($id, [
            'contain' => []
        ]);

        $Authid = $this->Auth->user('id');

        $user_data = $this->Users->find()
            ->select([
                'icon' => 'users.icon',
                'name' => 'users.name',
            ])->where([
                'id' => $content->userid,
            ])->first();

        $username = $user_data->name;
        $usericon = parent::display_img($user_data->icon, "30px", "");

        $img = parent::display_img($content->img, "80%", "");

        $this->set(compact('content', 'img','aciton','Authid','username','usericon'));
    }

    public function delete($id=Null)
    {
        parent::contentdelete($id);
    }
}
