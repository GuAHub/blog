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

        $Authid = $this->Auth->user(['id']);

        $img = parent::display_img($content->img, "80%", "");

        $this->set(compact('content', 'img','aciton','Authid'));
    }
}
