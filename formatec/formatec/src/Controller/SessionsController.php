<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;
use Cake\Event\Event;

/**
 * Sessions Controller
 *
 * @property \App\Model\Table\SessionsTable $Sessions
 */
class SessionsController extends AppController
{


    public function beforeFilter(Event $event){
        parent::beforeRender($event);
        $this->Auth->allow(['find', 'deleteSession','upload','getChampCategories','updateDownloadFiches']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {


        $debut = $this->request->query('debut');
        $fin = $this->request->query('fin');

        $this->paginate = [
            'contain' => ['Formateurs', 'Formations', 'Users', 'Clients'],
            'limit'=>5
        ];



        if((!empty($debut))&&(!empty($fin))){

            $sessions = $this->paginate($this->Sessions->find()->contain(['Formations','Formateurs','Users'])->where(['Sessions.created >='=>$debut, 'Sessions.created <='=>$fin])->order(['Sessions.created'=>'DESC']));
        }else{
            $sessions = $this->paginate($this->Sessions->find()->contain(['Formations','Formateurs','Users'])->where(['Sessions.created >= '=> new \DateTime('1 day ago')])->order(['Sessions.created'=>'DESC']));
        }


        $this->set(compact('sessions'));
        $this->set('_serialize', ['sessions']);
    }





    public function saveJson(){

        if($this->request->is('ajax')){

            $donnees = $this->request->data('donnees');
            $debut = $this->request->data('debut');
            $fin = $this->request->data('fin');
            $code = $this->request->data('code');
            $statut = $this->request->data('statut');
            $formateur_id = $this->request->data('formateur');
            $formation_id = $this->request->data('formation');
            $sess = $this->Sessions->newEntity();
            $sess->dt_debut = $debut;
            $sess->dt_fin = $fin;
            $sess->formateur_id = $formateur_id;
            $sess->formation_id = $formation_id;
            $sess->statut = $statut;
            $sess->code = $code;
            $sess->user_id = $this->Auth->user()['id'];
            $sess = $this->Sessions->save($sess);
            $this->loadModel('ClientsSessions');
            if($sess){
                foreach($donnees as $donnee){
                    $cs = $this->ClientsSessions->newEntity();
                    $cs->session_id = $sess->id;
                    $cs->client_id = $donnee['client'];
                    $cs->nombre = $donnee['qt'];
                    $this->ClientsSessions->save($cs);

                }

                $this->set('_serialize', true);
            }else{
                $this->set('_serialize', false);
            }
        }

    }

    /**
     * View method
     *
     * @param string|null $id Session id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => ['Formateurs', 'Formations', 'Users', 'Fiches']
        ]);

        $this->set('session', $session);
        $this->set('_serialize', ['session']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->Sessions->newEntity();
        if ($this->request->is('post')) {
            $session = $this->Sessions->patchEntity($session, $this->request->data);
            if($this->Auth->user()['id']){
                $session -> user_id = $this->Auth->user()['id'];
            }
            //debug($session); die();
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('Enregistrement effectue avec succes !!!.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('l\'enregistrement a connu un echec !!!.'));
            }
        }

        $this->set(compact('session'));
        $this->set('_serialize', ['session']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Session id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->Sessions->patchEntity($session, $this->request->data);
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The session has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The session could not be saved. Please, try again.'));
            }
        }
        $formateurs = $this->Sessions->Formateurs->find('list', ['limit' => 200]);
        $formations = $this->Sessions->Formations->find('list', ['limit' => 200]);
        $users = $this->Sessions->Users->find('list', ['limit' => 200]);
        $this->set(compact('session', 'formateurs', 'formations', 'users'));
        $this->set('_serialize', ['session']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Session id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $session = $this->Sessions->get($id);
        if ($this->Sessions->delete($session)) {
            $this->Flash->success(__('The session has been deleted.'));
        } else {
            $this->Flash->error(__('The session could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }







    //lepres Part
    public function find() 
	{
		$code = $this->request->query('code');
		$session = $this->Sessions->find()
			->contain(['Formateurs', 'Formations', 'Clients', 'Fiches' => function($q) {
				return $q->where(['statut' => false]);
			}])
			->where(['Sessions.code' => $code])
			->first();

		if($session) {
			$c = new Collection($session->fiches);
			$counted = $c->countBy(function($item) {
				return $item->downloaded == true ? 'traiter' : 'non_traitrer';
			});
			$counted = $counted->toArray();
			$session->ficheDispo = isset($counted['non_traitrer']) ? $counted['non_traitrer'] : 0;
		}
		$session->fiches = null;
		$this->set('session', $session);
	}

	public function getChampCategories() 
	{
		$this->loadModel('Champs');
		$this->loadModel('Fiches');

		$fiche_from = $this->request->data('fiche_from');
		$fiche_to = $this->request->data('fiche_to');
		$session_id = $this->request->data('session_id');

		$fiches = $this->Fiches->find()
			->contain(['Clients'])
			->where(['Fiches.session_id' => $session_id, 'downloaded' => false, 'statut' => false])
			->offset($fiche_from - 1)
			->limit(($fiche_to - $fiche_from) + 1)->all();

		$champs = $this->Champs->find()
			->contain(['Categories'])
			->all();

		$this->set('datas', compact('fiches','champs'));
	}

	public function updateDownloadFiches () 
	{
		$this->loadModel('Fiches');
		$response = ['success' => true];
		$fichesIds = $this->request->data('fiche_ids');
		if(!is_null($fichesIds) && is_array($fichesIds)) {
			foreach ($fichesIds as $fiche_id) {
				$fiche = $this->Fiches->get($fiche_id);
				$fiche->downloaded = true;
				if(!$this->Fiches->save($fiche)) {
					$response['success'] = false;
					break;
				}
			}
		}
		$this->set(compact('response'));
	}

	public function upload() 
	{
		$this->loadModel('ChampsFiches');
		$this->loadModel('Fiches');
		$response = ['error' => false, 'message' => ''];
		$fiches = $this->request->data('fiches');
		
		foreach ($fiches as $fiche) {
			$storedFiche = $this->Fiches->find()->where(['id' => $fiche['id']])->first();
			if($storedFiche) {
				$storedFiche->statut = $fiche['statut'];
				$champFiches = array_map(function($champFiche) {
					$champFiche['created'] = date('Y-m-d H:i:s');
					unset($champFiche['champ']);
					return $champFiche;
				}, $fiche['champFiches']);

				$cfEntities = $this->ChampsFiches->newEntities($champFiches);
				if($this->ChampsFiches->saveMany($cfEntities)) {
					$this->Fiches->save($storedFiche);
				} else {
					$response['error'] = true;
					$response['message'] = 'Unable to store champ fichs';
				}
			} else {
				$response['error'] = true;
				$request['message'] = 'Impossible de trouver la fiche '. $fiche['id'];
			}
		}
		$this->set(compact('response'));
	}

	public function deleteSession() {
		$this->loadModel('Fiches');
		$fiches = $this->request->data('fiches');
		$response = ['success' => true];
		foreach ($fiches as $fiche) {
			$storedFiche = $this->Fiches->find()
				->where(['Fiches.id' => $fiche['id']])
				->first();
			if($storedFiche) {
				$storedFiche->downloaded = false;
				$storedFiche->statut = false;
				if(!$this->Fiches->save($storedFiche)) {
					$response['success'] = false;
				};
			}
		}
		$this->set(compact('response'));
	}
}
