<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ChampsFiches Controller
 *
 * @property \App\Model\Table\ChampsFichesTable $ChampsFiches
 */
class ChampsFichesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fiches', 'Champs']
        ];
        $champsFiches = $this->paginate($this->ChampsFiches);

        $this->set(compact('champsFiches'));
        $this->set('_serialize', ['champsFiches']);
    }

    /**
     * View method
     *
     * @param string|null $id Champs Fich id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $champsFich = $this->ChampsFiches->get($id, [
            'contain' => ['Fiches', 'Champs']
        ]);

        $this->set('champsFich', $champsFich);
        $this->set('_serialize', ['champsFich']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $champsFich = $this->ChampsFiches->newEntity();
        if ($this->request->is('post')) {
            $champsFich = $this->ChampsFiches->patchEntity($champsFich, $this->request->data);
            if ($this->ChampsFiches->save($champsFich)) {
                $this->Flash->success(__('The champs fich has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The champs fich could not be saved. Please, try again.'));
            }
        }
        $fiches = $this->ChampsFiches->Fiches->find('list', ['limit' => 200]);
        $champs = $this->ChampsFiches->Champs->find('list', ['limit' => 200]);
        $this->set(compact('champsFich', 'fiches', 'champs'));
        $this->set('_serialize', ['champsFich']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Champs Fich id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $champsFich = $this->ChampsFiches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $champsFich = $this->ChampsFiches->patchEntity($champsFich, $this->request->data);
            if ($this->ChampsFiches->save($champsFich)) {
                $this->Flash->success(__('The champs fich has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The champs fich could not be saved. Please, try again.'));
            }
        }
        $fiches = $this->ChampsFiches->Fiches->find('list', ['limit' => 200]);
        $champs = $this->ChampsFiches->Champs->find('list', ['limit' => 200]);
        $this->set(compact('champsFich', 'fiches', 'champs'));
        $this->set('_serialize', ['champsFich']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Champs Fich id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $champsFich = $this->ChampsFiches->get($id);
        if ($this->ChampsFiches->delete($champsFich)) {
            $this->Flash->success(__('The champs fich has been deleted.'));
        } else {
            $this->Flash->error(__('The champs fich could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
