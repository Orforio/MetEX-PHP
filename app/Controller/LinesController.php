<?php
App::uses('AppController', 'Controller');
/**
 * Lines Controller
 *
 * @property Line $Line
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LinesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session');
	public $helpers = array('LineBadge', 'Html');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('lines', $this->Line->find('all', array('conditions' => array('Line.active' => true))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Line->exists($id)) {
			throw new NotFoundException(__('Invalid line'));
		}
		$options = array('conditions' => array('Line.' . $this->Line->primaryKey => $id, 'Line.active' => true));
		$line = $this->Line->find('first', $options);
		
		if (empty($line)) {
			throw new NotFoundException('Invalid line');
		} else {
			$this->set('line', $line);
		}
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if (Configure::read('debug') == 0) { throw new NotFoundException(); } // Temporary authentication work-around
		if ($this->request->is('post')) {
			$this->Line->create();
			if ($this->Line->save($this->request->data)) {
				$this->Session->setFlash(__('The line has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The line could not be saved. Please, try again.'));
			}
		}
		$stocks = $this->Line->Stock->find('list');
		$this->set(compact('stocks'));
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
		if (!$this->Line->exists($id)) {
			throw new NotFoundException(__('Invalid line'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Line->save($this->request->data)) {
				$this->Session->setFlash(__('The line has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The line could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Line.' . $this->Line->primaryKey => $id));
			$this->request->data = $this->Line->find('first', $options);
		}
		$stocks = $this->Line->Stock->find('list');
		$this->set(compact('stocks'));
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
		$this->Line->id = $id;
		if (!$this->Line->exists()) {
			throw new NotFoundException(__('Invalid line'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Line->delete()) {
			$this->Session->setFlash(__('The line has been deleted.'));
		} else {
			$this->Session->setFlash(__('The line could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
}
