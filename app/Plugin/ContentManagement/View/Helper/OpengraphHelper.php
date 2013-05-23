<?php
 /**
 * Created by Roger Dickey, Jr
 * rdickey@whytespyder.com
 * 4/30/13 4:35 PM
 */

App::uses('AppHelper', 'View/Helper');

class OpengraphHelper extends AppHelper {
    public $helpers = array('Html');

    public $description = null;

    public function meta($tag, $url, $options) {
        if (strcmp($tag, 'description') == 0) {
            $this->description = $url;
        }

        $this->Html->meta($tag, $url, $options);
    }
}