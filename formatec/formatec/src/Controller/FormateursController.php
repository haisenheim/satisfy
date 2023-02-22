<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formateurs Controller
 *
 * @property \App\Model\Table\FormateursTable $Formateurs
 */
class FormateursController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'limit'=>5
        ];
        $formateurs = $this->paginate($this->Formateurs);

        $this->set(compact('formateurs'));
        $this->set('_serialize', ['formateurs']);
    }

    /**
     * View method
     *
     * @param string|null $id Formateur id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formateur = $this->Formateurs->get($id, [
            'contain' => ['Sessions']
        ]);

        $this->set('formateur', $formateur);
        $this->set('_serialize', ['formateur']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formateur = $this->Formateurs->newEntity();
        if ($this->request->is('post')) {
            $formateur = $this->Formateurs->patchEntity($formateur, $this->request->data);
            if ($this->Formateurs->save($formateur)) {
                $this->Flash->success(__('Enregistrement Effectue avec succes !!!.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Echec lors de l\'enregistrement.'));
            }
        }
        $this->set(compact('formateur'));
        $this->set('_serialize', ['formateur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formateur id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formateur = $this->Formateurs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formateur = $this->Formateurs->patchEntity($formateur, $this->request->data);
            if ($this->Formateurs->save($formateur)) {
                $this->Flash->success(__('The formateur has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formateur could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('formateur'));
        $this->set('_serialize', ['formateur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formateur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formateur = $this->Formateurs->get($id);
        if ($this->Formateurs->delete($formateur)) {
            $this->Flash->success(__('The formateur has been deleted.'));
        } else {
            $this->Flash->error(__('The formateur could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function getAllJson(){

        $nom = $this->request->query('needle');
        $this->loadModel('Eleves');
        $produits=$this->Formateurs->find()->where(['upper(nom) LIKE'=> strtoupper($nom).'%'])->orWhere(['upper(prenom) LIKE'=> strtoupper($nom).'%'])->all();
        $this->set(compact('produits'));

    }
}
