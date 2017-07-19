<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;
use Cake\View\View;

class StylesController extends Controller 
{
	public function index() 
	{
		$styles = $this->Styles->find('all');
		$this->set('styles', $styles);
	}

	public function addEdit($id = null)
    {
    	$stylesTable  = TableRegistry::get('styles');

    	if ($id == null) {
            $styleEntity = $stylesTable->newEntity(); 
        } else {
            $styleEntity = $stylesTable->get($id);
            $this->set('style', $styleEntity);
        }

    	if ($this->request->is('post')) {
    		$data = $this->request->data;

    		$styleEntity->name = $data['name'];
    		$styleEntity->url = $data['url'];
    		$styleEntity->width = $data['width'];
            $styleEntity->height = $data['height'];

    		$stylesTable->save($styleEntity);
    	}
    }

    public function delete($id = null) 
    {
    	$stylesTable = TableRegistry::get('styles');
        $styleEntity = $stylesTable->get($id); 
        $stylesTable->delete($styleEntity);
        return $this->redirect(['action' => 'index']);
    }
}