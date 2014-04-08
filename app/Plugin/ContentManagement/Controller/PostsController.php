<?php
App::uses('ContentManagementAppController', 'ContentManagement.Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends ContentManagementAppController {

    public $uses = array('ContentManagement.Post', 'ContentManagement.Category');
/**
 * index method
 *
 * @return void
 */
	public function index() {
        $params = array_merge($this->request->params['pass'], $this->request->params['named']);

        $conditions = array(
            'Post.type' => CMS_POST,
            'Post.enabled' => true,
        );

        if (isset($params['category'])) {
            $conditions[] = array('Post.category_id' => $params['category']);
        }

        if (isset($params['archive'])) {
            list($year, $month) = explode('-', $params['archive']);
            $conditions[] = array(
                'YEAR(Post.published)' => $year,
                'MONTH(Post.published)' => $month,
            );
        }

        $this->Post->recursive = 0;
        $this->paginate = array(
            'conditions' => $conditions,
            'order' => array(
                'Post.published' => 'DESC',
            ),
            'limit' => 3,
        );
        $this->set('posts', $this->paginate());
        $this->taxonomize(array('post', 'index'));
        $this->set_sidenav();
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
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('post', $this->Post->read(null, $id));
        $this->taxonomize(array('post', __('post-%d', $id)));
        $this->set_sidenav();

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
        $this->paginate = array(
            'conditions' => array(
                'Post.type' => CMS_POST,
            )
        );
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
		$categories = $this->Category->generateTreeList();
        $parents = $this->Post->generateTreeList(array('Post.type' => CMS_POST));
		$this->set(compact('categories', 'parents'));
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

        $categories = $this->Category->generateTreeList();

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
        $parents = $this->Post->generateTreeList(array('Post.type' => CMS_POST, 'Post.id !=' => $id));
        $this->set(compact('categories', 'parents'));
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


    private function set_sidenav() {
        $recent = $this->Post->find('list', array(
            'conditions' => array(
                'Post.type' => CMS_POST,
                'Post.enabled' => true,
            ),
            'limit' => 5,
        ));

        $categories = $this->Category->find('list');

        $archives = $this->Post->find('all', array(
            'conditions' => array(
                'Post.type' => CMS_POST,
                'Post.enabled' => true,
            ),
            'fields' => 'Post.published',
            'group' => array('DATE_FORMAT(Post.published, "%Y-%m")'),
            'order' => array('Post.published' => 'DESC'),
        ));

        $this->set(compact('recent', 'categories', 'archives'));
    }
}
