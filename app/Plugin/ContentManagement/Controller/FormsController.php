<?php
 /**
 * Created by Roger Dickey, Jr
 * rdickey@whytespyder.com
 * 3/19/14 11:34 PM
 */

App::uses('AppController', 'Controller');

class FormsController extends ContentManagementAppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }

//    public function newsletter() {
//        $this->postback(array(
//            'event_name' => 'newsletter',
//            'success' => 'Thank you! You have been subscribed to our newsletter.',
//            'redirect' => '/',
//        ));
//    }

    private function postback($params = null) {
        if ($params == null) {
            throw new InvalidArgumentException();
        }
        if ($this->request->is('post')) {
            $this->getEventManager()->dispatch(new CakeEvent($params['event_name'], $this, array('request' => $this->request->data)));
            $this->setFlash(__($params['success']));
        }
        $this->redirect($params['redirect']);
    }
}