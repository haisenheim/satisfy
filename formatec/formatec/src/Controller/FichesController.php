<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Fiches Controller
 *
 * @property \App\Model\Table\FichesTable $Fiches
 */
class FichesController extends AppController
{


    public function beforeFilter(Event $event){
        parent::beforeRender($event);
        $this->Auth->allow(['view', 'fill','saveJson','cancel']);
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sessions', 'Clients']
        ];
        $fiches = $this->paginate($this->Fiches);

        $this->set(compact('fiches'));
        $this->set('_serialize', ['fiches']);
    }

    /**
     * View method
     *
     * @param string|null $id Fich id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fich = $this->Fiches->get($id, [
            'contain' => ['Sessions', 'Clients', 'Champs']
        ]);

        $this->set('fich', $fich);
        $this->set('_serialize', ['fich']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fich = $this->Fiches->newEntity();
        if ($this->request->is('post')) {
            $fich = $this->Fiches->patchEntity($fich, $this->request->data);
            if ($this->Fiches->save($fich)) {
                $this->Flash->success(__('The fich has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fich could not be saved. Please, try again.'));
            }
        }
        $sessions = $this->Fiches->Sessions->find('list', ['limit' => 200]);
        $clients = $this->Fiches->Clients->find('list', ['limit' => 200]);
        $champs = $this->Fiches->Champs->find('list', ['limit' => 200]);
        $this->set(compact('fich', 'sessions', 'clients', 'champs'));
        $this->set('_serialize', ['fich']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fich id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fich = $this->Fiches->get($id, [
            'contain' => ['Champs']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fich = $this->Fiches->patchEntity($fich, $this->request->data);
            if ($this->Fiches->save($fich)) {
                $this->Flash->success(__('The fich has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fich could not be saved. Please, try again.'));
            }
        }
        $sessions = $this->Fiches->Sessions->find('list', ['limit' => 200]);
        $clients = $this->Fiches->Clients->find('list', ['limit' => 200]);
        $champs = $this->Fiches->Champs->find('list', ['limit' => 200]);
        $this->set(compact('fich', 'sessions', 'clients', 'champs'));
        $this->set('_serialize', ['fich']);
    }

    /**
     * Fill method
     *
     * @param string|null $id Fich id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function fill($id = null)

    {
        $fr=true;
        if($this->request->is('post')){
            $fr=$this->request->data('lang');
        }
        $fich = $this->Fiches->get($id, [
            'contain' => ['Champs','Sessions.Formateurs','Sessions.Formations','Clients']
        ]);

        $this->loadModel('Categories');
        $this->loadModel('Clients');

        $clients= $this->Clients->find()->all();

        $categories =$this->Categories->find()->contain(['Champs'])->all();
        /*if ($this->request->is(['patch', 'post', 'put'])) {
            $fich = $this->Fiches->patchEntity($fich, $this->request->data);
            if ($this->Fiches->save($fich)) {
                $this->Flash->success(__('Fiche enregistree avec succes !!!.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fich could not be saved. Please, try again.'));
            }
        }*/

        $this->set(compact('fich', 'categories','clients', 'fr'));
        $this->set('_serialize', ['fich']);
    }



    /**
     * Fill method
     *
     * @param string|null $id Fich id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function cancel($id = null)
    {
        $fich = $this->Fiches->get($id);

        $fich->verrou = 0;
        $this->Fiches->save($fich);
        return $this->redirect(['controller'=>'Front','action' => 'index']);

    }



    public function saveJson(){

        if($this->request->is('ajax')){

            $donnees = $this->request->data('donnees');
            $client = $this->request->data('client');
            $fich = $this->Fiches->get($this->request->data('fich'));
            $fich->client_id = $client;
            $this->loadModel('ChampsFiches');
            foreach($donnees as $donnee){
                $cf = $this->ChampsFiches->newEntity();
                $cf->fich_id = $fich->id;
                $cf->champ_id = $donnee['champ'];
               switch ($donnee['choix']){
                   case 'tmc': $cf->tmc = 1;
                       break;
                   case 'mc': $cf->mc = 1;
                       break;
                   case 'sat':$cf->sat = 1;
                       break;
                   case 'tsat':$cf->tsat = 1;
                       break;

               }

                $this->ChampsFiches->save($cf);

            }

            $fich->statut = 1;
            if ($fich= $this->Fiches->save($fich)){
                $this->set('_serialize', ['fich']);
            };
        }

    }

    /**
     * Delete method
     *
     * @param string|null $id Fich id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fich = $this->Fiches->get($id);
        if ($this->Fiches->delete($fich)) {
            $this->Flash->success(__('The fich has been deleted.'));
        } else {
            $this->Flash->error(__('The fich could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
