<?php 

namespace App\Controller;


use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;
use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\View\View;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\Routing\Router;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Controller;
use Cake\Utility\Xml;

Class AdminsController extends Controller 
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

        $scenesTable = TableRegistry::get('scenes');
        $scenes = $scenesTable->find('all');
        $this->set('scenes', $scenes);

    }

    public function login()
    {
        $this->viewBuilder()->layout('login');
        $usersTable = TableRegistry::get('users');
        $session = $this->request->session();
        $session->delete('message');

        if ($this->request->is('post'))
        {
            $data = $this->request->data;
            $userEntity = $usersTable->find('all')->where(['username' => $data['username']])->first();
            $password = hash('sha512', $data['password']);
            $password2 = NULL;
            if ($userEntity != NULL)
            {
                $password2 = $userEntity->password;
            }
            
            if ($password == $password2) 
            {
                $this->redirect(array('controller' => 'Admins', 'action' => 'index'));
            }
            else
            {
                $session->write('message', "Username or password is wrong!");
                $this->set('message', $session->read('message'));
            }
        }
    }
}