<?php

App::uses('AppController', 'Controller');

class UsersAppController extends AppController {
    function getAdminNav() {
        $nav = array(
            'left' => array(
            ),
            'right' => array(
                array('anchor' => 'Log Out', 'link' => array('controller' => 'users', 'action' => 'logout')),
            )
        );
        return $nav;
    }
}
