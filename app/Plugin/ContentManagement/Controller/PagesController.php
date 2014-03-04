<?php
App::uses('ContentManagementAppController', 'ContentManagement.Controller');
/**
 * Pages Controller
 *
 * @property Post $Post
 */
class PagesController extends ContentManagementAppController {

    public $uses = array('ContentManagement.Post');

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->paginate = array(
            'conditions' => array(
                'Post.type' => CMS_PAGE,
            ),
        );

        $posts = $this->paginate('Post');
        $this->set('posts', $posts);
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid page'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
//	public function add() {
//		if ($this->request->is('post')) {
//			$this->Post->create();
//			if ($this->Post->save($this->request->data)) {
//				$this->setFlash(__('The page has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->setFlash(__('The page could not be saved. Please, try again.'), false);
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
//				$this->setFlash(__('The page has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->setFlash(__('The page could not be saved. Please, try again.'), false);
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
        $this->paginate = array(
            'conditions' => array(
                'Post.type' => CMS_PAGE,
            ),
        );

        $posts = $this->paginate('Post');
        $this->set('posts', $posts);
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
			throw new NotFoundException(__('Invalid page'));
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
				$this->setFlash(__('The page has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('The page could not be saved. Please, try again.'), false);
			}
		}

        $parents = $this->Post->generateTreeList(array('Post.type' => CMS_PAGE));
        $this->set(compact('parents'));
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
				$this->setFlash(__('The page has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('The page could not be saved. Please, try again.'), false);
			}
		} else {
			$this->request->data = $this->Post->read(null, $id);
		}

        $parents = $this->Post->generateTreeList(array('Post.type' => CMS_PAGE, 'Post.id !=' => $id));
        $this->set(compact('parents'));
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
			throw new NotFoundException(__('Invalid page'));
		}
		if ($this->Post->delete()) {
			$this->setFlash(__('Page deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Page was not deleted'), false);
		$this->redirect(array('action' => 'index'));
	}
}
