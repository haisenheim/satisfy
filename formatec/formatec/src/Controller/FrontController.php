<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Slides Controller
 *
 * @property \App\Model\Table\SlidesTable $Slides
 */
class FrontController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */


   public function beforeFilter(Event $event){
       parent::beforeRender($event);
       $this->Auth->allow(['view', 'index']);
   }

    public function index()
    {

       // exec('notepad.exe');
        $this->loadModel('Sessions');
       // debug($this->request);
        if($this->request->is('get')){
            //debug($this->request->data);

            $code = $this->request->query('code');

            if(!empty($code)){
                $session = $this->Sessions->find()->where(['code'=>$code])->first();
                if($session){
                    $this->loadModel('Fiches');
                    $fich = $this->Fiches->find()->where(['session_id'=>$session->id, 'statut'=>0, 'verrou'=>0])->first();
                    if($fich){
                        $fich->verrou = 1;
                        $this->Fiches->save($fich);
                        return $this->redirect(['controller'=>'Fiches', 'action'=>'fill', $fich->id]);
                    }else{
                        $this->Flash->error('Plus de fiches disponibles pour cettes Session. Bien vouloir Contacter l\'Administrateur.');
                    }
                }else{
                    $this->Flash->error('Aucune Session de Formation ne correspond au code saisi. Bien vouloir Contacter l\'Administrateur');
                }
            }

        }

    }


}
