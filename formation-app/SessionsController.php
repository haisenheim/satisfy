<?php 
namespace App\Controller;

use Cake\Collection\Collection;

/**
 *
 *@property \App\Model\Table\SessionsTable $Sessions
 *@property \App\Model\Table\FichesTable $Fiches
 */
class SessionsController extends AppController {

	public function find() 
	{
		$code = $this->request->query('code');
		$session = $this->Sessions->find()
			->contain(['Formateurs', 'Formations', 'Clients', 'Fiches'])
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
		//$this->autoRender = false;

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
		$response = ['error' => false];
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
				}
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