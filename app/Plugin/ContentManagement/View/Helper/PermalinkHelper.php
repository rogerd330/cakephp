<?php
 /**
 * Created by Roger Dickey, Jr
 * rdickey@whytespyder.com
 * 4/24/13 8:04 PM
 */

App::uses('AppHelper', 'View/Helper');

class PermalinkHelper extends AppHelper {
    public $helpers = array('Html');

    public function link($title, $url, $options, $raw_slug) {
        $strings = new Strings();
        $slug = $strings->sanitize($raw_slug);

        if (is_array($url)) {
            $url[] = $slug;
        }

        return $this->Html->link($title, $url, $options);
    }
}