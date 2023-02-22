<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Slides Controller
 *
 * @property \App\Model\Table\SlidesTable $Slides
 */
class ReportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */




    public function index()
    {

       // exec('notepad.exe');

    }

    public function getSessionsByClient(){
        //$path = __DIR__;
       // $donnee = 'C:\Users\owner\Documents\Rapports\cat_formations.rdl';
       system('MSReportBuilder.exe');
      //system('notepad.exe C:\xampp\img\lanceur.bat');
       //debug($path);
        die();
        $this->redirect($this->referer());
    }


}
