<?php
 /**
 * Created by Roger Dickey, Jr
 * rdickey@whytespyder.com
 * 4/11/14 11:22 AM
 */

Router::connect('/login', array('controller' => 'users', 'action' => 'login', 'plugin' => 'users'));
Router::connect('/logout', array('controller' => 'users', 'action' => 'logout', 'plugin' => 'users', 'admin' => true));