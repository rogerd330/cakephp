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

    public function assign($data) {
        if (array_key_exists('Meta', $data)) {
            if (!empty($data['Meta']['title'])) {
                $this->_View->assign('page_title', $data['Meta']['title']);
            }

            if (!empty($data['Meta']['description'])) {
                $this->description = $data['Meta']['description'];
                $this->Html->meta('description', $this->description, array('inline' => false));
                $this->Html->meta(array('name' => 'og:description', 'content' => $this->description), null, array('inline' => false));
            }

            if (!empty($data['Meta']['keywords'])) {
                $this->Html->meta('keywords', $data['Meta']['keywords'], array('inline' => false));
            }
        }
    }

    public function meta($options = array()) {
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
                $this->Html->meta(array('name' => $k, 'content' => $v), null, array('inline' => false));
            }
        }
    }
}