<?php
/**
 * Created by Roger Dickey, Jr
 * rdickey@whytespyder.com
 * 7/16/13 4:06 PM
 */

App::uses('AppHelper', 'View/Helper');

class BootstrapNavbarHelper extends AppHelper {
    public $helpers = array(
        'Html',
    );

    public function create($title, $left_items, $right_items) {
        $brand = $this->Html->div('navbar-header', $this->Html->tag('a', $title, array('class' => 'navbar-brand')), array());

        $left_nav = $this->_makeNavMenu($left_items);
        $right_nav = $this->_makeNavMenu($right_items, true);

        $nav = $this->Html->div('navbar navbar-inverse navbar-fixed-top',
                $this->Html->div('container',
                    $brand . $left_nav . $right_nav,
                array()),
            array('role' => 'navigation')
        );

        return $nav;
    }

    private function _makeNavMenu($items, $pull_right = false) {
        $nav_list = null;

        foreach ($items as $item) {
            if (array_key_exists('dropdown', $item) && $item['dropdown'] === true) {
                $anchor_toggle = $this->Html->link(
                    sprintf("%s %s", $item['anchor'], $this->Html->tag('b', '', array('class' => 'caret'))),
                    '#',
                    array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'escape' => false)
                );

                $sub_items = null;
                foreach ($item['links'] as $sub_item) {
                    $link_options = array();
                    if (!empty($sub_item['options'])) {
                        $link_options = $sub_item['options'];
                    }
                    $sub_items .= $this->Html->tag('li', $this->Html->link($sub_item['anchor'], $sub_item['link'], $link_options));
                }

                $sub_item_list = $this->Html->tag('ul', $sub_items, array('class' => 'dropdown-menu'));

                $nav_list .= $this->Html->tag('li',
                    $anchor_toggle . $sub_item_list,
                    array('class' => 'dropdown')
                );
            }
            else {
                $link_options = array();
                if (!empty($item['options'])) {
                    $link_options = $item['options'];
                }
                $nav_list .= $this->Html->tag('li', $this->Html->link($item['anchor'], $item['link'], $link_options));
            }
        }

        $nav_class = $pull_right ? 'nav navbar-nav navbar-right' : 'nav navbar-nav';

        $nav = $this->Html->tag('ul',
            $nav_list,
            array('class' => $nav_class)
        );

        return $nav;
    }
}

