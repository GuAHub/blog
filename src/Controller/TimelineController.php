<?php
namespace App\Controller;

use App\Controller\AppController;
use JsonSchema\Uri\Retrievers\FileGetContents;

class TimelineController extends AppController
{

    public function index()
    {

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
                'posticon' => 'u.icon',
                'created' => 'Contents.created',
            ]);

        $contents = $this->paginate($jointable);

        $myaccount = $this->Auth->user();
        $myname = $myaccount['name'];

        $myid = $myaccount['id'];
        $iconsource = $this->Users->find()
            ->select([
                'icon' => 'users.icon',
            ])->where([
                'id' => $myid,
            ])->first()
            ->icon;

            $myicon = parent::display_img($iconsource,"30px","30px");

        $this->set(compact('contents', 'myname', 'myicon'));
    }
}
