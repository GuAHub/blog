<?php
namespace App\Controller;

use App\Controller\AppController;
use Symfony\Component\Console\Helper\FormatterHelper;

class SearchCategoryController extends AppController
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
                'postid' => 'u.id',
                'created' => 'Contents.created',
            ])->where([
                'category' => $this->request->getData('category'),
            ]);

        $contents = $this->paginate($jointable);

        $myaccount = $this->Auth->user();

        $myid = $myaccount['id'];

        //ログイン中のアカウントデータを取得
        $user_data = $this->Users->find()
            ->select([
                'icon' => 'users.icon',
                'name' => 'users.name',
            ])->where([
                'id' => $myid,
            ])->first();

        $myname = $user_data->name;
        $myicon = parent::display_img($user_data->icon, "20px", "");

        foreach ($contents as $content) {
            $content->img = parent::display_img($content->img, "90%", "");
            $content->posticon = parent::display_img($content->posticon, "", "40px");
            $content->created = date("Y年m月d日h時投稿", strtotime($content->created));
        }
        $this->set(compact('contents', 'myname', 'myicon'));
    }

}
