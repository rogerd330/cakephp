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
App::uses('Strings', 'Lib');

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
//        'DebugKit.Toolbar',
        'Session',
        'Auth' => array(
            'loginAction' => array('controller' => 'users', 'action' => 'login', 'plugin' => 'users', 'admin' => false),
            'loginRedirect' => array('controller' => 'pages', 'action' => 'index', 'plugin' => 'content_management', 'admin' => true),
            'authError' => 'You must login first!',
            'flash' => array('element' => 'flash_message', 'key' => 'auth', 'params' => array()),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish',
                    'fields' => array(
                        'username' => 'login',
                    ),
                    'scope' => array(
                        'enabled' => true,
                    )
                ),
            ),
        ),
    );

    public $helpers = array(
        'BootstrapNavbar',
        'Time',
        'ContentManagement.Opengraph',
    );

    public $uses = array(
        'ContentManagement.Option',
        'ContentManagement.Meta'
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

        $this->_loadOptions();
    }

    function setFlash($msg, $isSuccess = true, $key = 'flash', $params = array()) {
        //$element = $isSuccess ? "FlashMessageGood" : "FlashMessageBad";
        $params['class'] = $isSuccess ? 'success' : 'danger';

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

    protected function saveMeta($model, $model_id, $data = array()) {
        $meta_data = array(
            'model' => $model,
            'model_id' => $model_id,
            'title' => $data['Meta']['title'],
            'description' => $data['Meta']['description'],
            'keywords' => $data['Meta']['keywords'],
        );

        if (array_key_exists('id', $data['Meta'])) {
            $meta_data['id'] = $data['Meta']['id'];
        }

        return $this->Meta->save($meta_data);
    }

    protected function getMeta($model, $model_id) {
        $meta_data = $this->Meta->find('first', array(
            'conditions' => array(
                'Meta.model' => $model,
                'Meta.model_id' => $model_id,
            ),
        ));
        return $meta_data;
    }

    protected function taxonomize($classes = null) {
        if ($classes != null) {
            $this->set('body_classes', $classes);
        }
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
                        if (array_key_exists('link', $nav) && is_array($nav['link'])) {
                            $nav['link']['plugin'] = Inflector::underscore($plugin);
                            $nav['link']['admin'] = true;
                        }

                        if (array_key_exists('links', $nav) && is_array($nav['links'])) {
                            for ($i = 0; $i < count($nav['links']); $i++) {
                                $nav['links'][$i]['link']['plugin'] = Inflector::underscore($plugin);
                                $nav['links'][$i]['link']['admin'] = true;
                            }
                        }
                        $admin_left_nav[] = $nav;
                    }

                    foreach ($plugin_nav['right'] as $nav) {
                        if (array_key_exists('link', $nav) && is_array($nav['link'])) {
                            $nav['link']['plugin'] = Inflector::underscore($plugin);
                            $nav['link']['admin'] = true;
                        }

                        if (array_key_exists('links', $nav) && is_array($nav['links'])) {
                            for ($i = 0; $i < count($nav['links']); $i++) {
                                $nav['links'][$i]['link']['plugin'] = Inflector::underscore($plugin);
                                $nav['links'][$i]['link']['admin'] = true;
                            }
                        }
                        $admin_right_nav[] = $nav;
                    }
                }
                else {
                    foreach ($plugin_nav as $nav) {
                        $nav['link']['plugin'] = Inflector::underscore($plugin);
                        $nav['link']['admin'] = true;

                        if (array_key_exists('links', $nav) && is_array($nav['links'])) {
                            for ($i = 0; $i < count($nav['links']); $i++) {
                                $nav['links'][$i]['link']['plugin'] = Inflector::underscore($plugin);
                                $nav['links'][$i]['link']['admin'] = true;
                            }
                        }

                        $admin_left_nav[] = $nav;
                    }
                }
            }
        }

        $this->set(compact('admin_left_nav', 'admin_right_nav'));
    }

    private function _loadOptions() {
        $options = $this->Option->find('all', array(
            'conditions' => array(
                'autoload' => true,
            ),
        ));

        foreach ($options as $option) {
            $name = $option['Option']['name'];
            $value = $option['Option']['value'];
            $this->set("option_{$name}", $value);
        }
    }
}
