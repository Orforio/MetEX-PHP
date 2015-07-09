<?php
App::uses('AppController', 'Controller');
/**
 * Stations Controller
 *
 * @property Station $Station
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Navigation', 'Image', 'LineBadge', 'Sound', 'Html');

/**
 * admin_index method
 *
 * @return void
 */

	public function admin_index() {
		if (Configure::read('debug') == 0) { throw new NotFoundException(); } // Temporary authentication work-around
		$this->Station->recursive = 0;
		$this->set('stations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Station->exists($id)) {
			throw new NotFoundException(__('Invalid station'));
		}
		$options = array('conditions' => array('Station.' . $this->Station->primaryKey => $id));
		$this->set('station', $this->Station->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if (Configure::read('debug') == 0) { throw new NotFoundException(); } // Temporary authentication work-around
		if ($this->request->is('post')) {
			$this->Station->create();
			if ($this->Station->save($this->request->data)) {
				$this->Session->setFlash(__('The station has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station could not be saved. Please, try again.'));
			}
		}
		$lines = $this->Station->Line->find('list');
		$interchanges = $this->Station->Interchange->find('list');
		$movements = $this->Station->Movement->find('list');
		$this->set(compact('lines', 'interchanges', 'movements'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (Configure::read('debug') == 0) { throw new NotFoundException(); } // Temporary authentication work-around
		if (!$this->Station->exists($id)) {
			throw new NotFoundException(__('Invalid station'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Station->save($this->request->data)) {
				$this->Session->setFlash(__('The station has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Station.' . $this->Station->primaryKey => $id));
			$this->request->data = $this->Station->find('first', $options);
		}
		$lines = $this->Station->Line->find('list');
		$interchanges = $this->Station->Interchange->find('list');
		$movements = $this->Station->Movement->find('list');
		$this->set(compact('lines', 'interchanges', 'movements'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (Configure::read('debug') == 0) { throw new NotFoundException(); } // Temporary authentication work-around
		$this->Station->id = $id;
		if (!$this->Station->exists()) {
			throw new NotFoundException(__('Invalid station'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Station->delete()) {
			$this->Session->setFlash(__('The station has been deleted.'));
		} else {
			$this->Session->setFlash(__('The station could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}	
	
}
