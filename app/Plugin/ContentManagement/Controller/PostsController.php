<?php
App::uses('ContentManagementAppController', 'ContentManagement.Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends ContentManagementAppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
//	public function view($id = null) {
//		$this->Post->id = $id;
//		if (!$this->Post->exists()) {
//			throw new NotFoundException(__('Invalid post'));
//		}
//		$this->set('post', $this->Post->read(null, $id));
//	}

/**
 * add method
 *
 * @return void
 */
//	public function add() {
//		if ($this->request->is('post')) {
//			$this->Post->create();
//			if ($this->Post->save($this->request->data)) {
//				$this->setFlash(__('The post has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->setFlash(__('The post could not be saved. Please, try again.'), false);
//			}
//		}
//		$categories = $this->Post->Category->find('list');
//		$this->set(compact('categories'));
//	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
//	public function edit($id = null) {
//		$this->Post->id = $id;
//		if (!$this->Post->exists()) {
//			throw new NotFoundException(__('Invalid post'));
//		}
//		if ($this->request->is('post') || $this->request->is('put')) {
//			if ($this->Post->save($this->request->data)) {
//				$this->setFlash(__('The post has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->setFlash(__('The post could not be saved. Please, try again.'), false);
//			}
//		} else {
//			$this->request->data = $this->Post->read(null, $id);
//		}
//		$categories = $this->Post->Category->find('list');
//		$this->set(compact('categories'));
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
//		$this->Post->id = $id;
//		if (!$this->Post->exists()) {
//			throw new NotFoundException(__('Invalid post'));
//		}
//		if ($this->Post->delete()) {
//			$this->setFlash(__('Post deleted'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->setFlash(__('Post was not deleted'), false);
//		$this->redirect(array('action' => 'index'));
//	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('The post could not be saved. Please, try again.'), false);
			}
		}
		$categories = $this->Post->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('The post could not be saved. Please, try again.'), false);
			}
		} else {
			$this->request->data = $this->Post->read(null, $id);
		}
		$categories = $this->Post->Category->find('list');
		$this->set(compact('categories'));
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
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->Post->delete()) {
			$this->setFlash(__('Post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Post was not deleted'), false);
		$this->redirect(array('action' => 'index'));
	}
}
