<?php
App::uses('AppController', 'Controller');
/**
 * Places Controller
 *
 * @property Place $Place
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PlacesController extends AppController {

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
	public $helpers = array('Image', 'Html');
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		if (Configure::read('debug') == 0) { throw new NotFoundException(); } // Temporary authentication work-around
		$this->Place->recursive = 0;
		$this->set('places', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (Configure::read('debug') == 0) { throw new NotFoundException(); } // Temporary authentication work-around
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if (Configure::read('debug') == 0) { throw new NotFoundException(); } // Temporary authentication work-around
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'));
			}
		}
		$stations = $this->Place->Station->find('list');
		$this->set(compact('stations'));
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
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
		}
		$stations = $this->Place->Station->find('list');
		$this->set(compact('stations'));
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
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__('Invalid place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__('The place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
