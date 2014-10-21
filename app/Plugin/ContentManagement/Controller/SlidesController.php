<?php
App::uses('ContentManagementAppController', 'ContentManagement.Controller');
/**
 * Slides Controller
 *
 * @property Slide $Slide
 * @property PaginatorComponent $Paginator
 */
class SlidesController extends ContentManagementAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Slide->recursive = 0;
		$this->set('slides', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Slide->id = $id;
		if (!$this->Slide->exists()) {
			throw new NotFoundException(__('Invalid slide'));
		}
		$this->set('slide', $this->Slide->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Slide->create();

            $this->request->data['Slide']['image'] = $this->Upload->store($this->request->data['Slide']['image'], $this->Slide->image_path);

            if ($this->Slide->save($this->request->data)) {
				$this->setFlash(__('The slide has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('The slide could not be saved. Please, try again.'), false);
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
		$this->Slide->id = $id;
		if (!$this->Slide->exists()) {
			throw new NotFoundException(__('Invalid slide'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

            $this->request->data['Slide']['image'] = $this->Upload->store($this->request->data['Slide']['image'], $this->Slide->image_path);
            if ($this->request->data['Slide']['image'] === false) {
                $this->Slide->validator()->getField('image')->getRule('notempty')->required = true;
                $this->Slide->validator()->getField('image')->getRule('notempty')->message = 'Choose a smaller product image';
            }
            if ($this->request->data['Slide']['image'] == null) {
                unset($this->request->data['Slide']['image']);
            }

			if ($this->Slide->save($this->request->data)) {
				$this->setFlash(__('The slide has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('The slide could not be saved. Please, try again.'), false);
			}
		} else {
			$this->request->data = $this->Slide->read(null, $id);
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
		$this->Slide->id = $id;
		if (!$this->Slide->exists()) {
			throw new NotFoundException(__('Invalid slide'));
		}
		if ($this->Slide->delete()) {
			$this->setFlash(__('Slide deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Slide was not deleted'), false);
		$this->redirect(array('action' => 'index'));
	}
}
