<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;
use Cake\View\View;

Class ViewerController extends Controller 
{
	public function index()
	{
		$this->viewBuilder()->layout(false);
	}
}