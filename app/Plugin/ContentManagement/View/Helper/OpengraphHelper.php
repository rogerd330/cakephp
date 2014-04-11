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

    public function header($options = array()) {
        $defaults = array(
            'og:title' => 'Another WhyteSpyder production',
            'og:site_name' => 'A CakeCMS Website',
            'og:description' => $this->description,
            'og:type' => 'website',
            'og:url' => Router::url(null, true),
            'og:image' => __('%simg/og-logo.jpg', Router::url('/', true)),
        );

        $metas = array_merge($defaults, $options);

        foreach ($metas as $k => $v) {
            if (!empty($v)) {
                echo $this->Html->tag('meta', null, array('property' => $k, 'content' => $v));
            }
        }
    }
}