<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;
use Cake\View\View;

class TargetsController extends Controller 
{
	public function index() 
	{
		$targets = $this->Targets->find('all');
		$this->set('targets', $targets);
	}

	public function addEdit($id = null)
    {
    	$targetsTable  = TableRegistry::get('targets');

    	if ($id == null) {
            $targetEntity = $targetsTable->newEntity(); 
        } else {
            $targetEntity = $targetsTable->get($id);
            $this->set('target', $targetEntity);
        }

    	if ($this->request->is('post')) {
    		$data = $this->request->data;

    		$targetEntity->title = $data['title'];
    		$targetEntity->description = $data['description'];
            $targetEntity->type = $data['type'];
            $targetEntity->name = $data['name'];
            $targetEntity->width = $data['width'];
            $targetEntity->height = $data['height'];
            $targetEntity->html5_url = $data['html5_url'];
            $targetEntity->flash_url = $data['flash_url'];
            $targetEntity->video_url = $data['video_url'];
            $targetEntity->poster_url = $data['poster_url'];
            $targetEntity->rx = $data['rx'];
            $targetEntity->ry = $data['ry'];
            $targetEntity->rz = $data['rz'];
            $targetEntity->ox = $data['ox'];
            $targetEntity->oy = $data['oy'];
            $targetEntity->edge = $data['edge'];

    		$targetsTable->save($targetEntity);
    	}
    }

    public function delete($id = null) 
    {
    	$targetsTable = TableRegistry::get('targets');
        $targetEntity = $targetsTable->get($id); 
        $targetsTable->delete($targetEntity);
        return $this->redirect(['action' => 'index']);
    }
}