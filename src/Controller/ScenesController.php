<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;
use Cake\View\View;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class ScenesController extends Controller 
{
    public function initialize() 
    {
        parent::initialize();

        $this->viewBuilder()->layout('admin');
    }

	public function index($id) 
	{  
        $toursTable  = TableRegistry::get('tours');
        $tours = $toursTable->find('all');
        $this->set('tours', $tours);

		$scenes = $this->Scenes->find('all');
		$this->set('scenes', $scenes);

        $scene = $this->Scenes->get($id);
        $this->set('scene', $scene);

        $js = array('/js/vendor/jquery.ui.widget.js',
                    '/js/load-image.all.min.js',
                    '/js/canvas-to-blob.min.js',
                    '/js/bootstrap.min.js',
                    '/js/jquery.iframe-transport.js',
                    '/js/jquery.fileupload.js',
                    '/js/jquery.fileupload-process.js',
                    '/js/jquery.fileupload-image.js',
                    '/js/jquery.fileupload-audio.js',
                    '/js/jquery.fileupload-video.js',
                    '/js/jquery.fileupload-validate.js',
                    '/js/uploadfile.js'
                    );
        $this->set('js', $js);
	}

	public function addEdit($id = null)
    {
        $hotspotsTable = TableRegistry::get('hotspots');
        $hotspots = $hotspotsTable->find('all');
        $this->set('hotspots', $hotspots);

        $stylesTable = TableRegistry::get('styles');
        $styles = $stylesTable->find('all');
        $this->set('styles', $styles);

        $targetsTable = TableRegistry::get('targets');
        $targets = $targetsTable->find('all');
        $this->set('targets', $targets);

        $scenesTable = TableRegistry::get('scenes');
        $scenes = $scenesTable->find('all');
        $this->set('scenes', $scenes);

        $toursTable  = TableRegistry::get('tours');
        $tours = $toursTable->find('all');
        $this->set('tours', $tours);

        $scene_toursTable = TableRegistry::get("scene_tours");
        

    	if ($id == null) {
            $sceneEntity = $scenesTable->newEntity(); 
            $scene_tourEntity = $scene_toursTable->newEntity();
        } else {
            $sceneEntity = $scenesTable->get($id);
            $this->set('scene', $sceneEntity);
        }

    	if ($this->request->is('post')) {
    		$data = $this->request->data;

            if (isset($data['txtSceneName']) && isset($data['txtSceneTitle']) && isset($data['txtSceneDescription']) && isset($data['txtNameFile']) && isset($data['txtIdFile'])) {

                $fileRun = $data['txtNameFile'];
                $fileName = substr($data['txtNameFile'], 0, -4);

                $sceneEntity->name = "scene_". $fileName;
                $sceneEntity->title = $data['txtSceneTitle'];
                $sceneEntity->uri = "/tours/". $data['txtIdFile'] ."/panos/" . $fileName . ".tiles/thumb.jpg";
                $sceneEntity->description = $data['txtSceneDescription'];

                $resultScene = $scenesTable->save($sceneEntity);

                $scene_tourEntity->tour_id = $data['txtIdFile'];
                $scene_tourEntity->scene_id = $resultScene->id;
                $scene_toursTable->save($scene_tourEntity);

                chdir(WWW_ROOT);
                $cmd = WWW_ROOT."krpano/krpanotools makepano templates/vtour-multires.config files/". $fileRun;
                exec($cmd);
                
                $vdir = WWW_ROOT.'files/vtour/';

                $vfilename = $vdir .'tour.xml';

                $tour = WWW_ROOT."tours/". $data['txtIdFile'] ."/tour.xml";

                $src = WWW_ROOT."files/vtour/panos/" . $fileName . ".tiles";
                $dst = WWW_ROOT."files/tours/". $data['txtIdFile']. "/panos/" . $fileName . ".tiles";

                $fscene = new Folder($src);
                $fscene->copy($dst);

                if (!file_exists($tour)) {
                    copy($vfilename, $tour);
                    copy($swfFile, $swf);
                }

                if (file_exists($tour)) {
                    $vfile_data = file_get_contents($tour);
                    $vtour_xml  = simplexml_load_string($vfile_data);


                    $krpano = $vtour_xml->xpath("/krpano");

                    if (count($krpano) > 0) {
                        $scene = $krpano[0]->addChild("scene");
                        $scene->addAttribute("name", "scene_". $fileName);
                        $scene->addAttribute("title", $data['txtSceneTitle']);
                        $scene->addAttribute("onstart","");
                        $scene->addAttribute("thumburl", "/files/tours/". $data['txtIdFile'] ."/panos/" . $fileName . ".tiles/thumb.jpg");
                        $scene->addAttribute("lat", "");
                        $scene->addAttribute("lng", "");
                        $scene->addAttribute("heading", "");

                        $view = $scene[0]->addChild("view");
                        $view->addAttribute("hlookat", "0");
                        $view->addAttribute("vlookat", "0");
                        $view->addAttribute("fovtype", "MFOV");
                        $view->addAttribute("fov", "90");
                        $view->addAttribute("maxpixelzoom", "2.0");
                        $view->addAttribute("fovmin", "90");
                        $view->addAttribute("fovmax", "90");
                        $view->addAttribute("limitview", "auto");

                        $preview = $scene[0]->addChild("preview");
                        $preview->addAttribute("url", "/files/tours/". $data['txtIdFile'] ."/panos/" . $fileName . ".tiles/preview.jpg");

                        $image = $scene[0]->addChild("image");
                        $image->addAttribute("type", "CUBE");
                        $image->addAttribute("multires", "true");
                        $image->addAttribute("tilesize", "512");

                        $level1 = $image[0]->addChild("level");
                        $level1->addAttribute("tiledimagewidth", "3584");
                        $level1->addAttribute("tiledimageheight", "3584");

                        $cube1 = $level1->addChild("cube");
                        $cube1->addAttribute("url", "/files/tours/". $data['txtIdFile'] ."/panos/" . $fileName . ".tiles/%s/l3/%v/l3_%s_%v_%h.jpg");

                        $level2 = $image->addChild("level");
                        $level2->addAttribute("tiledimagewidth", "1792");
                        $level2->addAttribute("tiledimageheight", "1792");

                        $cube2 = $level2->addChild("cube");
                        $cube2->addAttribute("url", "/files/tours/". $data['txtIdFile'] ."/panos/" . $fileName . ".tiles/%s/l2/%v/l2_%s_%v_%h.jpg");

                        $level3 = $image->addChild("level");
                        $level3->addAttribute("tiledimagewidth", "1024");
                        $level3->addAttribute("tiledimageheight", "1024");

                        $cube3 = $level3->addChild("cube");
                        $cube3->addAttribute("url", "/files/tours/". $data['txtIdFile'] ."/panos/" . $fileName . ".tiles/%s/l1/%v/l1_%s_%v_%h.jpg");

                        file_put_contents($tour, $vtour_xml->saveXML());                         
                    }
                }

                //delete folder after run cmd
                $deleteOld = WWW_ROOT. "files/vtour";
                $folder = new Folder($deleteOld);
                $folder->delete();
                
                $this->redirect(['controller' => 'Tours', 'action' => 'index/'. $data['txtIdFile']]);
            }
    	}

        $js = array('/js/krpano.js', "/js/editScene.js");

        $this->set('js', $js);
    }

    public function delete($id = null) 
    {
    	$scenesTable = TableRegistry::get('scenes');
        $sceneEntity = $scenesTable->get($id); 
        $scenesTable->delete($sceneEntity);
        return $this->redirect(['action' => 'index']);
    }
}