<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Champs Controller
 *
 * @property \App\Model\Table\ChampsTable $Champs
 */
class ChampsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $champs = $this->paginate($this->Champs);

        $this->set(compact('champs'));
        $this->set('_serialize', ['champs']);
    }

    /**
     * View method
     *
     * @param string|null $id Champ id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $champ = $this->Champs->get($id, [
            'contain' => ['Categories', 'Fiches']
        ]);

        $this->set('champ', $champ);
        $this->set('_serialize', ['champ']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $champ = $this->Champs->newEntity();
        if ($this->request->is('post')) {
            $champ = $this->Champs->patchEntity($champ, $this->request->data);
            if ($this->Champs->save($champ)) {
                $this->Flash->success(__('The champ has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The champ could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Champs->Categories->find('list', ['limit' => 200]);
        $fiches = $this->Champs->Fiches->find('list', ['limit' => 200]);
        $this->set(compact('champ', 'categories', 'fiches'));
        $this->set('_serialize', ['champ']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Champ id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $champ = $this->Champs->get($id, [
            'contain' => ['Fiches']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $champ = $this->Champs->patchEntity($champ, $this->request->data);
            if ($this->Champs->save($champ)) {
                $this->Flash->success(__('The champ has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The champ could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Champs->Categories->find('list', ['limit' => 200]);
        $fiches = $this->Champs->Fiches->find('list', ['limit' => 200]);
        $this->set(compact('champ', 'categories', 'fiches'));
        $this->set('_serialize', ['champ']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Champ id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $champ = $this->Champs->get($id);
        if ($this->Champs->delete($champ)) {
            $this->Flash->success(__('The champ has been deleted.'));
        } else {
            $this->Flash->error(__('The champ could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
