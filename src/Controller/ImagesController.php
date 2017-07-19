<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;
use Cake\View\View;


class ImagesController extends Controller 
{
	public function initialize() 
	{
		parent::initialize();

 		$this->viewBuilder()->layout('admin');
	}
	
	public function index() 
	{

	}
}
