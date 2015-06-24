<?php
App::uses('AppController', 'Controller');
/**
 * Sounds Controller
 *
 * @property Sound $Sound
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SoundsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Sound->recursive = 0;
		$this->set('sounds', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Sound->exists($id)) {
			throw new NotFoundException(__('Invalid sound'));
		}
		$options = array('conditions' => array('Sound.' . $this->Sound->primaryKey => $id));
		$this->set('sound', $this->Sound->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Sound->create();
			if ($this->Sound->save($this->request->data)) {
				$this->Session->setFlash(__('The sound has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sound could not be saved. Please, try again.'));
			}
		}
		$stations = $this->Sound->Station->find('list');
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
		if (!$this->Sound->exists($id)) {
			throw new NotFoundException(__('Invalid sound'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sound->save($this->request->data)) {
				$this->Session->setFlash(__('The sound has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sound could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sound.' . $this->Sound->primaryKey => $id));
			$this->request->data = $this->Sound->find('first', $options);
		}
		$stations = $this->Sound->Station->find('list');
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
		$this->Sound->id = $id;
		if (!$this->Sound->exists()) {
			throw new NotFoundException(__('Invalid sound'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Sound->delete()) {
			$this->Session->setFlash(__('The sound has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sound could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
