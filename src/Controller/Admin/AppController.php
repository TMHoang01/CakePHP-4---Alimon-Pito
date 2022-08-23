<?php
declare(strict_types=1);


namespace App\Controller\Admin;

use Cake\Controller\Controller;


class AppController extends Controller
{

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('UserLogs');

        $this->loadComponent('Authentication.Authentication');
//        $this->Auth->allow(["login","add",'index', 'add']);
//        $this->Auth->allow();
//        $this->set('username', $this->Auth->user('username'));

    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

}
