<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;


class UsersController extends AppController
{

    public function index()
    {
        $key = $this->request->getQuery('key');
        if($key){
            $query = $this->Users
                ->findByUsernameOrEmail($key, $key);

        }else{
            $query = $this->Users;
        }
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }


    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }


    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if(!$user->getErrors ){
                $image = $this->request->getData('image_file');
//                debug($image);
                $name_img = $image->getClientFilename();

                $path = WWW_ROOT.'img'.DS.'user-img';
                if(!is_dir($path))
                    mkdir($path,0775);
                $targetPath = $path.DS.$name_img;
                if($name_img)
                $image->moveTo($targetPath);
                $user->image = 'user-img/'.$name_img;
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }


    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if(!$user->getErrors ){
                $image = $this->request->getData('change_image');
//                debug($image);
                $name_img = $image->getClientFilename();

                if($name_img){
                    $path = WWW_ROOT.'img'.DS.'user-img';

                    if(!is_dir($path))
                        mkdir($path,0775);

                    $targetPath = $path.DS.$name_img;
                    $image->moveTo($targetPath);

                    $targetOldPath = $path.DS.$user->image;

                    if(file_exists($targetOldPath)){
                        unlink($targetOldPath);
                    }

                    $user->image = 'user-img/'.$name_img;


                }

            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $imgPath = WWW_ROOT.'img'.DS.$user->image;
        if ($this->Users->delete($user)) {
            if(file_exists($imgPath)){
                unlink($imgPath);
            }
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            if($result->getData()->status == 1){
                $this->Flash->error("You not authentication access");
                $this->Authentication->logout();
                return $this->redirect(['action' => 'login']);
            }

            return $this->redirect(['action' => 'index']);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout(){
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function  userStatus($id = null, $status ){
        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);
        if($user->status ==1){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        if($this->Users->save($user)){
            $this->Flash->success(__("The user {0} has change status.", $user->id));
            return$this->redirect(['action'=> 'index']);
        }
        $this->Flash->success(__("The user {0} has change status.", $user->id));
        $this->set(compact('user'));




    }


}
