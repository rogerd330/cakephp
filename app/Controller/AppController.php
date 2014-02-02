<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $theme = 'Site';
    public $layout = 'default';

    public $components = array(
        'DebugKit.Toolbar',
    );

    public $helpers = array(
        'BootstrapNavbar'
    );

    function beforeRender() {
        $isAdminAction = false;
//        $isAdminUser = $this->Auth->user('group_id') == 1;

        if (isset($this->params['admin']) && $this->params['admin']) {
            $this->theme = 'Admin';
            $this->layout = 'admin';
            $isAdminAction = true;

            $this->_loadAdminNav();
        }
    }

    function setFlash($msg, $isSuccess = true, $key = 'flash', $params = array()) {
        //$element = $isSuccess ? "FlashMessageGood" : "FlashMessageBad";
        $params['class'] = $isSuccess ? 'success' : 'alert';

//        if (is_array($msg)) {
//            $message = $this->Message->findBySlug($msg['slug']);
//            $msg = $message['Message']['body'];
//            //$element = "ModalFlashMessageBad";
//            $params['title'] = $message['Message']['title'];
//        }

        $this->Session->setFlash($msg, 'flash_message', $params, $key);

        //if (!$isSuccess) {
        //	$this->log('An error occurred', $msg, 3);
        //}
    }

    private function _loadAdminNav() {
        $admin_left_nav = array();
        $admin_right_nav = array();
        $plugins = App::objects('plugins');

        $callback_name = 'getAdminNav';

        foreach ($plugins as $plugin) {
            if (CakePlugin::loaded($plugin)) {
                $controller = "{$plugin}AppController";

                App::uses($controller, "{$plugin}.Controller");
                $instance = new $controller;

                if (!method_exists($instance, $callback_name)) {
                    continue;
                }

                $plugin_nav = call_user_func(array($instance, $callback_name));
                $instance = null;

                if (array_key_exists('left', $plugin_nav) && array_key_exists('right', $plugin_nav)) {
                    foreach ($plugin_nav['left'] as $nav) {
                        $nav['link']['plugin'] = Inflector::underscore($plugin);
                        $nav['link']['admin'] = true;
                        $admin_left_nav[] = $nav;
                    }

                    foreach ($plugin_nav['right'] as $nav) {
                        $nav['link']['plugin'] = Inflector::underscore($plugin);
                        $nav['link']['admin'] = true;
                        $admin_right_nav[] = $nav;
                    }
                }
                else {
                    foreach ($plugin_nav as $nav) {
                        $nav['link']['plugin'] = Inflector::underscore($plugin);
                        $nav['link']['admin'] = true;
                        $admin_left_nav[] = $nav;
                    }
                }
            }
        }

        $this->set(compact('admin_left_nav', 'admin_right_nav'));
    }
}
