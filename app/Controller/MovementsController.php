<?php
App::uses('AppController', 'Controller');
/**
 * Movements Controller
 *
 * @property Movement $Movement
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MovementsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Movement->recursive = 0;
		$this->set('movements', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Movement->exists($id)) {
			throw new NotFoundException(__('Invalid movement'));
		}
		$options = array('conditions' => array('Movement.' . $this->Movement->primaryKey => $id));
		$this->set('movement', $this->Movement->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Movement->create();
			if ($this->Movement->save($this->request->data)) {
				$this->Session->setFlash(__('The movement has been saved.'));
				return $this->redirect(array('admin' => true, 'action' => 'add'));
			} else {
				$this->Session->setFlash(__('The movement could not be saved. Please, try again.'));
			}
		}
		$stations = $this->Movement->Station->find('list');
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
		if (!$this->Movement->exists($id)) {
			throw new NotFoundException(__('Invalid movement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Movement->save($this->request->data)) {
				$this->Session->setFlash(__('The movement has been saved.'));
				return $this->redirect(array('admin' => true, 'action' => 'edit', $id));
			} else {
				$this->Session->setFlash(__('The movement could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Movement.' . $this->Movement->primaryKey => $id));
			$this->request->data = $this->Movement->find('first', $options);
		}
		$stations = $this->Movement->Station->find('list');
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
		$this->Movement->id = $id;
		if (!$this->Movement->exists()) {
			throw new NotFoundException(__('Invalid movement'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Movement->delete()) {
			$this->Session->setFlash(__('The movement has been deleted.'));
		} else {
			$this->Session->setFlash(__('The movement could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
