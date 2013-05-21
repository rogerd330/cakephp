<?php
App::uses('ContentManagementAppController', 'ContentManagement.Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends ContentManagementAppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
//	public function view($id = null) {
//		$this->Category->id = $id;
//		if (!$this->Category->exists()) {
//			throw new NotFoundException(__('Invalid category'));
//		}
//		$this->set('category', $this->Category->read(null, $id));
//	}

/**
 * add method
 *
 * @return void
 */
//	public function add() {
//		if ($this->request->is('post')) {
//			$this->Category->create();
//			if ($this->Category->save($this->request->data)) {
//				$this->setFlash(__('The category has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->setFlash(__('The category could not be saved. Please, try again.'), false);
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
//		$this->Category->id = $id;
//		if (!$this->Category->exists()) {
//			throw new NotFoundException(__('Invalid category'));
//		}
//		if ($this->request->is('post') || $this->request->is('put')) {
//			if ($this->Category->save($this->request->data)) {
//				$this->setFlash(__('The category has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->setFlash(__('The category could not be saved. Please, try again.'), false);
//			}
//		} else {
//			$this->request->data = $this->Category->read(null, $id);
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
//		$this->Category->id = $id;
//		if (!$this->Category->exists()) {
//			throw new NotFoundException(__('Invalid category'));
//		}
//		if ($this->Category->delete()) {
//			$this->setFlash(__('Category deleted'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->setFlash(__('Category was not deleted'), false);
//		$this->redirect(array('action' => 'index'));
//	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('The category could not be saved. Please, try again.'), false);
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Category->save($this->request->data)) {
				$this->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('The category could not be saved. Please, try again.'), false);
			}
		} else {
			$this->request->data = $this->Category->read(null, $id);
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->Category->delete()) {
			$this->setFlash(__('Category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Category was not deleted'), false);
		$this->redirect(array('action' => 'index'));
	}
}
