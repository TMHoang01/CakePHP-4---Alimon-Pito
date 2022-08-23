<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class BlogsController extends AppController
{
    public function  beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('blog');

        $this->loadModel('Menus');

        $menus = $this->Menus->find('all', ['contain' => ['Submenus']])->all();

        $this->set('menus',$menus);
    }

    public function index(){
//        echo "holle";
//        exit();
    }
    public  function home(){
        $this->loadModel("Articles") ;

        $articleList = $this->Articles->find('list');

        $articles = $this->Articles
            ->find('all')
            ->order(['Articles.id DESC']);
//        debug($articles);
        $this->set('articles',$this->paginate( $articles, ['limit' => '1']));
        $this->set('articleList',$articleList);

    }
    public  function about(){
//        $this->viewBuilder()->setLayout('blog');
    }

    public function view($id = null){
        $this->loadModel("Articles") ;
        $article = $this->Articles->get($id);
        $this->set('article', $article);
    }


}
