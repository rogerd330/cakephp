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

    public function create($title, $items) {
        $brand = $this->Html->tag('a', $title, array('class' => 'brand'));
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
                    $sub_items .= $this->Html->tag('li', $this->Html->link($sub_item['anchor'], $sub_item['link']));
                }

                $sub_item_list = $this->Html->tag('ul', $sub_items, array('class' => 'dropdown-menu'));

                $nav_list .= $this->Html->tag('li',
                    $anchor_toggle . $sub_item_list,
                    array('class' => 'dropdown')
                );
            }
            else {
                $nav_list .= $this->Html->tag('li', $this->Html->link($item['anchor'], $item['link']));
            }
        }

        $nav = $this->Html->tag('ul',
            $nav_list,
            array('class' => 'nav')
        );

        $nav = $this->Html->div('navbar navbar-inverse navbar-fixed-top',
                $this->Html->div('navbar-inner',
                    $this->Html->div('container',
                        $brand . $nav,
                    array()),
                array()),
            array()
        );

        return $nav;
    }
}

