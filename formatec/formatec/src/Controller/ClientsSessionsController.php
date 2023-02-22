<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClientsSessions Controller
 *
 * @property \App\Model\Table\ClientsSessionsTable $ClientsSessions
 */
class ClientsSessionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Sessions']
        ];
        $clientsSessions = $this->paginate($this->ClientsSessions);

        $this->set(compact('clientsSessions'));
        $this->set('_serialize', ['clientsSessions']);
    }

    /**
     * View method
     *
     * @param string|null $id Clients Session id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clientsSession = $this->ClientsSessions->get($id, [
            'contain' => ['Clients', 'Sessions']
        ]);

        $this->set('clientsSession', $clientsSession);
        $this->set('_serialize', ['clientsSession']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clientsSession = $this->ClientsSessions->newEntity();
        if ($this->request->is('post')) {
            $clientsSession = $this->ClientsSessions->patchEntity($clientsSession, $this->request->data);
            if ($this->ClientsSessions->save($clientsSession)) {
                $this->Flash->success(__('The clients session has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The clients session could not be saved. Please, try again.'));
            }
        }
        $clients = $this->ClientsSessions->Clients->find('list', ['limit' => 200]);
        $sessions = $this->ClientsSessions->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('clientsSession', 'clients', 'sessions'));
        $this->set('_serialize', ['clientsSession']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clients Session id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clientsSession = $this->ClientsSessions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clientsSession = $this->ClientsSessions->patchEntity($clientsSession, $this->request->data);
            if ($this->ClientsSessions->save($clientsSession)) {
                $this->Flash->success(__('The clients session has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The clients session could not be saved. Please, try again.'));
            }
        }
        $clients = $this->ClientsSessions->Clients->find('list', ['limit' => 200]);
        $sessions = $this->ClientsSessions->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('clientsSession', 'clients', 'sessions'));
        $this->set('_serialize', ['clientsSession']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clients Session id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clientsSession = $this->ClientsSessions->get($id);
        if ($this->ClientsSessions->delete($clientsSession)) {
            $this->Flash->success(__('The clients session has been deleted.'));
        } else {
            $this->Flash->error(__('The clients session could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
