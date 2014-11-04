<?php
 /**
 * Created by Roger Dickey, Jr
 * rdickey@whytespyder.com
 * 9/14/14 12:00 AM
 */

App::uses('ContentManagementAppController', 'ContentManagement.Controller');
/**
 * Searches Controller
 *
 * @property Post $Post
 */
class SearchesController extends ContentManagementAppController {

    public $uses = array(
        'ContentManagement.Post',
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Prg->commonProcess();

        $conditions = array();

        $params = array_merge($this->Prg->parsedParams(), array('enabled' => true));

        $conditions = array_merge($conditions, $this->Post->parseCriteria($params));

        $this->Paginator->settings['conditions'] = $conditions;

        $this->set('posts', $this->Paginator->paginate());
    }

}