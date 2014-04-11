<?php

App::uses('AppController', 'Controller');

class UsersAppController extends AppController {
    public $components = array(
        'Session',
        'Auth' => array(
            'loginAction' => array('controller' => 'users', 'action' => 'login', 'plugin' => 'users', 'admin' => false),
            'loginRedirect' => array('controller' => 'pages', 'action' => 'index', 'plugin' => 'content_management', 'admin' => true),
            'authError' => 'You must login first!',
            'flash' => array('element' => 'flash_message', 'key' => 'auth', 'params' => array()),
            'authenticate' => array(
                'Blowfish' => array(
                    'fields' => array(
                        'username' => 'login',
                    ),
                    'scope' => array(
                        'enabled' => true,
                    )
                )
            ),
        ),
    );

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
