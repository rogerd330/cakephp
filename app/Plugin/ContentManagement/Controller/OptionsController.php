<?php
App::uses('ContentManagementAppController', 'ContentManagement.Controller');
/**
 * Options Controller
 *
 * @property Option $Option
 */
class OptionsController extends ContentManagementAppController {


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Option->recursive = 0;
		$this->set('options', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Option->id = $id;
		if (!$this->Option->exists()) {
			throw new NotFoundException(__('Invalid option'));
		}
		$this->set('option', $this->Option->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Option->create();
			if ($this->Option->save($this->request->data)) {
				$this->setFlash(__('The option has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('The option could not be saved. Please, try again.'), false);
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
		$this->Option->id = $id;
		if (!$this->Option->exists()) {
			throw new NotFoundException(__('Invalid option'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Option->save($this->request->data)) {
				$this->setFlash(__('The option has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('The option could not be saved. Please, try again.'), false);
			}
		} else {
			$this->request->data = $this->Option->read(null, $id);
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
		$this->Option->id = $id;
		if (!$this->Option->exists()) {
			throw new NotFoundException(__('Invalid option'));
		}
		if ($this->Option->delete()) {
			$this->setFlash(__('Option deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Option was not deleted'), false);
		$this->redirect(array('action' => 'index'));
	}
}
