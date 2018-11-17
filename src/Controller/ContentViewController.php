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

        $img = parent::display_img($content->img, "80%", "");

        $this->set(compact('content', 'img'));
    }
}
