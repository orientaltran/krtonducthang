<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;
use Cake\View\View;

class ToursController extends Controller 
{
	public function index($id = null) 
	{
        $this->viewBuilder()->layout('admin');
        $toursTable = TableRegistry::get('tours');
		$tour = $toursTable->get($id);
		$this->set('tour', $tour);

        $tours = $toursTable->find('all');
        $this->set('tours', $tours);

        $scenesTable = TableRegistry::get('scenes');
        $scenes = $scenesTable->find('all');
        $this->set('scenes', $scenes);

        $listScene = $scenesTable->find('all', [ 
            'conditions' => ['SceneTours.tour_id' => $id], 
                'join' => [ 
                    'SceneTours' => [ 
                        'table' => 'scene_tours', 
                        'type' => 'INNER', 'conditions' => 
                        'SceneTours.scene_id = scenes.id' 
                    ] 
                ] 
        ]);

        $this->set('listScene', $listScene->all());
	}

	public function addEdit($id = null)
    {
    	$toursTable  = TableRegistry::get('tours');

    	if ($this->request->is('post')) {

    		$data = $this->request->data;

            $id = $data['tourId'];

            if ($id == null) {
                $tourEntity = $toursTable->newEntity(); 
            } else {
                $tourEntity = $toursTable->get($id);
                $this->set('tour', $tourEntity);
            }


    		$tourEntity->name = $data['name'];
    		$tourEntity->alias = $data['alias'];
    		//$tourEntity->user_id = $data['user_id'];

    		$toursTable->save($tourEntity);

            $this->redirect(["controller" => "Admins",'action' => 'index']);
    	}
    }


    public function delete($id = null) 
    {
    	$toursTable = TableRegistry::get('tours');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (isset($data["idTour"])) {
                $id = $data["idTour"];
            }
            
            $tourEntity = $toursTable->get($id); 
            $toursTable->delete($tourEntity);
        }
        return $this->redirect(["controller" => "Admins",'action' => 'index']);
    }
}