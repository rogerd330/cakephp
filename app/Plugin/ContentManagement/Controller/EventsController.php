<?php
App::uses('ContentManagementAppController', 'ContentManagement.Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends ContentManagementAppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
//	public function view($id = null) {
//		$this->Event->id = $id;
//		if (!$this->Event->exists()) {
//			throw new NotFoundException(__('Invalid event'));
//		}
//		$this->set('event', $this->Event->read(null, $id));
//	}

/**
 * add method
 *
 * @return void
 */
//	public function add() {
//		if ($this->request->is('post')) {
//			$this->Event->create();
//			if ($this->Event->save($this->request->data)) {
//				$this->setFlash(__('The event has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->setFlash(__('The event could not be saved. Please, try again.'), false);
//			}
//		}
//	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
//	public function edit($id = null) {
//		$this->Event->id = $id;
//		if (!$this->Event->exists()) {
//			throw new NotFoundException(__('Invalid event'));
//		}
//		if ($this->request->is('post') || $this->request->is('put')) {
//			if ($this->Event->save($this->request->data)) {
//				$this->setFlash(__('The event has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->setFlash(__('The event could not be saved. Please, try again.'), false);
//			}
//		} else {
//			$this->request->data = $this->Event->read(null, $id);
//		}
//	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
//	public function delete($id = null) {
//		if (!$this->request->is('post')) {
//			throw new MethodNotAllowedException();
//		}
//		$this->Event->id = $id;
//		if (!$this->Event->exists()) {
//			throw new NotFoundException(__('Invalid event'));
//		}
//		if ($this->Event->delete()) {
//			$this->setFlash(__('Event deleted'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->setFlash(__('Event was not deleted'), false);
//		$this->redirect(array('action' => 'index'));
//	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->set('event', $this->Event->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->setFlash(__('The event has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('The event could not be saved. Please, try again.'), false);
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Event->save($this->request->data)) {
				$this->setFlash(__('The event has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('The event could not be saved. Please, try again.'), false);
			}
		} else {
			$this->request->data = $this->Event->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->Event->delete()) {
			$this->setFlash(__('Event deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Event was not deleted'), false);
		$this->redirect(array('action' => 'index'));
	}
}
