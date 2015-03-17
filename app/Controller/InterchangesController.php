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
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		if (Configure::read('debug') == 0) { throw new NotFoundException(); } // Temporary authentication work-around
		$this->Interchange->recursive = 0;
		$this->set('interchanges', $this->Paginator->paginate());
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
		if (!$this->Interchange->exists($id)) {
			throw new NotFoundException(__('Invalid interchange'));
		}
		$options = array('conditions' => array('Interchange.' . $this->Interchange->primaryKey => $id));
		$this->set('interchange', $this->Interchange->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if (Configure::read('debug') == 0) { throw new NotFoundException(); } // Temporary authentication work-around		if ($this->request->is('post')) {
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
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (Configure::read('debug') == 0) { throw new NotFoundException(); } // Temporary authentication work-around
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
	}
	
}
