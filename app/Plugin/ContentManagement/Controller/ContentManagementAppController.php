<?php

App::uses('AppController', 'Controller');

class ContentManagementAppController extends AppController {
    function getAdminNav() {
        $nav = array(
            array('anchor' => 'Posts', 'link' => array('controller' => 'Posts', 'action' => 'index')),
            array('anchor' => 'Categories', 'link' => array('controller' => 'Categories', 'action' => 'index')),
        );
        return $nav;
    }
}
