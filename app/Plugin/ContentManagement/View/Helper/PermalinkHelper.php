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

        // Based on WordPress function
        // http://wpseek.com/sanitize_title_with_dashes/
        $slug = strtolower($raw_slug);
        $slug = str_replace('.', '-', $slug);
        $slug = preg_replace('/[^%a-z0-9 _-]/', '', $slug);
        $slug = preg_replace('/\s+/', '-', $slug);
        $slug = preg_replace('|-+|', '-', $slug);
        $slug = trim($slug, '-');

        if (is_array($url)) {
            $url[] = $slug;
        }

        return $this->Html->link($title, $url, $options);
    }
}