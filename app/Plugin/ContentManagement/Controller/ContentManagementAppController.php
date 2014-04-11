<?php

App::uses('AppController', 'Controller');

class ContentManagementAppController extends AppController {
    function getAdminNav() {
        $nav = array(
            'left' => array(
                array('anchor' => 'Pages', 'link' => array('controller' => 'Pages', 'action' => 'index')),
                array('anchor' => 'Posts', 'link' => array('controller' => 'Posts', 'action' => 'index')),
                array('anchor' => 'Events', 'link' => array('controller' => 'Events', 'action' => 'index')),
                array('anchor' => 'Categories', 'link' => array('controller' => 'Categories', 'action' => 'index')),
            ),
            'right' => array(
                array('anchor' => 'Settings', 'dropdown' => true, 'links' => array(
                   array('anchor' => 'Options', 'link' => array('controller' => 'Options', 'action' => 'index')),
                )),
            )
        );
        return $nav;
    }
}
