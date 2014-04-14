<?php
App::uses('AppController', 'Controller');
/**
 * Interchanges Controller
 *
 * @property Interchange $Interchange
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InterchangesController extends AppController {

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
	public function index() {
		$this->Interchange->recursive = 0;
		$this->set('interchanges', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Interchange->exists($id)) {
			throw new NotFoundException(__('Invalid interchange'));
		}
		$options = array('conditions' => array('Interchange.' . $this->Interchange->primaryKey => $id));
		$this->set('interchange', $this->Interchange->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Interchange->create();
			if ($this->Interchange->save($this->request->data)) {
				$this->Session->setFlash(__('The interchange has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interchange could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Interchange->exists($id)) {
			throw new NotFoundException(__('Invalid interchange'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Interchange->save($this->request->data)) {
				$this->Session->setFlash(__('The interchange has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interchange could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Interchange.' . $this->Interchange->primaryKey => $id));
			$this->request->data = $this->Interchange->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Interchange->id = $id;
		if (!$this->Interchange->exists()) {
			throw new NotFoundException(__('Invalid interchange'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Interchange->delete()) {
			$this->Session->setFlash(__('The interchange has been deleted.'));
		} else {
			$this->Session->setFlash(__('The interchange could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
