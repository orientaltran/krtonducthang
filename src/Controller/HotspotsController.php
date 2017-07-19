<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;
use Cake\View\View;

class HotspotsController extends Controller 
{
	public function index() 
	{
		$hotspots = $this->Hotspots->find('all');
		$this->set('hotspots', $hotspots);
	}

	public function addEdit($id = null)
    {
    	$hotspotsTable  = TableRegistry::get('hotspots');
        $targetsTable = TableRegistry::get('targets');

        $resultHotspots = null;
        $resultTargets = null;

        if ($id == null) {
            $targetEntity = $targetsTable->newEntity();
            $hotspotEntity = $hotspotsTable->newEntity(); 
        } else {
            $hotspotEntity = $hotspotsTable->get($id);
            $this->set('hotspot', $hotspotEntity);

            $targetEntity = $targetsTable->get($id);
            $this-set('target', $targetEntity);
        }

    	if ($this->request->is('post')) {

            $data = $this->request->data;

            $vdir = WWW_ROOT.'files/vtour/';

            //$vfilename = $vdir .'tour.xml';
            $vfilename = $vdir .'tour.xml';

            $nameScene = NULL;

            if (isset($data['idScene']) && isset($data['nameScene'])) {
                $nameScene = $data['nameScene'];
            }

            if (isset($data['hpTitle']) && isset($data['hpDescription']) && isset($data['idStyle'])) {
                $targetEntity->title = $data['hpTitle'];
                $targetEntity->description = $data['hpDescription'];
                //$targetEntity->type = $data['idType'];
                $resultTargets = $targetsTable->save($targetEntity);

                $hotspotEntity->target_id = $resultTargets->id;
                //$hotspotEntity->scene_id = $data['scene_id'];
                //$hotspotEntity->scene_destination_id = $data['scene_destination_id'];
                $hotspotEntity->ath = 0;
                $hotspotEntity->atv = 0;
                $hotspotEntity->style_id = $data['idStyle'];

                $resultHotSpots = $hotspotsTable->save($hotspotEntity);
                $idHotspot = $resultHotSpots->id;

                if ($idHotspot) {
                    $hotspotEntity->name = "spot" . $idHotspot;
                    $resultHotSpots = $hotspotsTable->save($hotspotEntity);
                }

                // check if the file exists
                if (file_exists($vfilename)) {
                    $vfile_data = file_get_contents($vfilename);
                    $vtour_xml  = simplexml_load_string($vfile_data);


                    $scenes = $vtour_xml->xpath("/krpano/scene[@name='scene_DSC04263_room02-2_nologo']");

                    if (count($scenes) > 0) {
                        $hotspot = $scenes[0]->addChild("hotspot");
                        $hotspot->addAttribute("name","spot" . $idHotspot);
                        $hotspot->addAttribute("style","skin_hotspotstyle");
                        $hotspot->addAttribute("atv","0");
                        $hotspot->addAttribute("ath","0");

                        if (isset($data['radioAdd'])) {
                            $hotspot->addAttribute("onclick","transition(spot". $idHotspot .", ". $data['radioAdd'] . ");");
                            $hotspot->addAttribute("linkedscene", $data['radioAdd']);
                        } else {
                            $hotspot->addAttribute("onclick","transition(spot". $idHotspot .",a);");
                            $hotspot->addAttribute("linkedscene", "a");
                        }

                        $hotspot->addAttribute("ondown","draghotspot();");


                        file_put_contents($vfilename, $vtour_xml->saveXML());                         
                    }
                }
            }

           if (isset($data["hpName"]) && isset($data["hpAth"]) && isset($data["hpAtv"])) {
                $i = -1;
                foreach ($data["hpName"] as $key => $hpName) {
                    $i ++;
                    //updated database
                    $id = substr($hpName, 4);

                    $hotspotEntity = $hotspotsTable->get($id);
                    $hotspotEntity->ath = $data["hpAth"][$i];
                    $hotspotEntity->atv = $data["hpAtv"][$i];
                    $hotspotsTable->save($hotspotEntity);

                   if (file_exists($vfilename)) {
                        $vfile_data = file_get_contents($vfilename);
                        $vtour_xml  = simplexml_load_string($vfile_data);

                        $hotspot = $vtour_xml->xpath("/krpano/scene/hotspot[@name='" . $hpName . "']");

                        if (count($hotspot) > 0) {
                            foreach ($hotspot as $child) {
                                unset($child[0]);
                            }

                            file_put_contents($vfilename, $vtour_xml->saveXML());  
                        }

                        $scenes = $vtour_xml->xpath("/krpano/scene[@name='scene_DSC04263_room02-2_nologo']");

                        if (count($scenes) > 0) {
                            $hotspot = $scenes[0]->addChild("hotspot");
                            $hotspot->addAttribute("name", $hpName);
                            $hotspot->addAttribute("style","skin_hotspotstyle");
                            $hotspot->addAttribute("ath", $data["hpAth"][$i]);
                            $hotspot->addAttribute("atv", $data["hpAtv"][$i]);

                            if (isset($data['radioAdd'])) {
                                $hotspot->addAttribute("onclick","transition(". $hpName .", ". $data['radioAdd'] . ");");
                                $hotspot->addAttribute("linkedscene", $data['radioAdd']);
                            } else {
                                $hotspot->addAttribute("onclick","transition(". $hpName .",a);");
                                $hotspot->addAttribute("linkedscene", "a");
                            }
                            $hotspot->addAttribute("ondown","draghotspot();");

                            file_put_contents($vfilename, $vtour_xml->saveXML());                         
                        } 
                    }
                }
            }
            
            $this->redirect(['controller' => 'Admins', 'action' => 'editscene']);
    	}
    }

    public function delete() 
    {
    	$hotspotsTable = TableRegistry::get('hotspots');

        if ($this->request->is('post')) {
            $data = $this->request->data;

            if (isset($data["hpDelete"])) {
                $vdir = WWW_ROOT.'files/vtour/';

                $vfilename = $vdir .'tour.xml';

                if (file_exists($vfilename)) {
                    $vfile_data = file_get_contents($vfilename);
                    $vtour_xml  = simplexml_load_string($vfile_data);

                    $hotspot = $vtour_xml->xpath("/krpano/scene/hotspot[@name='" . $data["hpDelete"] . "']");

                    if (count($hotspot) > 0) {
                        foreach ($hotspot as $child) {
                            unset($child[0]);
                        }

                        file_put_contents($vfilename, $vtour_xml->saveXML());  
                    }
                }
                
                $id = substr($data["hpDelete"], 4);

                if (isset($id)) {
                    $hotspotEntity = $hotspotsTable->get($id); 
                    $hotspotsTable->delete($hotspotEntity);
                    return $this->redirect(['controller' => 'Admins', 'action' => 'editscene']);
                } else {
                    $this->redirect(['controller' => 'Admins', 'action' => 'editscene']);
                }
            }
        }
    }       
}