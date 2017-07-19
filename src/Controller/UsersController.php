<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;
use Cake\View\View;

Class UsersController extends Controller 
{
	public function initialize() 
    {
        parent::initialize();

        $this->viewBuilder()->layout('admin');
    }

    public function index()
    {
        $toursTable  = TableRegistry::get('tours');
        $tours = $toursTable->find('all');
        $this->set('tours', $tours);

        $users = $this->Users->find('all');
        $this->set('users', $users);
    }

    public function addEdit($id = null)
    {
    	$usersTable  = TableRegistry::get('users');

    	if ($id == null) {
            $userEntity = $usersTable->newEntity(); 
        } else {
            $userEntity = $usersTable->get($id);
            $this->set('user', $userEntity);
        }

    	if ($this->request->is('post')) {
    		$data = $this->request->data;

    		$userEntity->username = $data['username'];
    		$userEntity->password = $data['password'];

    		$usersTable->save($userEntity);
    	}
    }

    public function delete($id = null) 
    {
    	$usersTable = TableRegistry::get('users');
        $userEntity = $usersTable->get($id); 
        $usersTable->delete($userEntity);
        return $this->redirect(['action' => 'index']);
    }

    public function add()
    {
        $usersTable = TableRegistry::get('users');
        if ($this->request->is('post'))
        {
            $data = $this->request->data;
            $userEntity = $usersTable->newEntity();
            $userEntity->username = $data['username'];
            $userEntity->password = hash('sha512', $data['password']);
            $userEntity->created = date('Y-m-d H:i:s', time());
            $usersTable->save($userEntity);
        }
        $this->redirect(array('controller' => 'users', 'action' => 'index'));
    }

    public function edit()
    {
        $usersTable = TableRegistry::get('users');
        if ($this->request->is('post'))
        {
            $data = $this->request->data;
            $userEntity = $usersTable->get($data['idUser']);
            $userEntity->password = hash('sha512', $data['password']);
            $usersTable->save($userEntity);
        }
        $this->redirect(array('controller' => 'users', 'action' => 'index'));
    }
}