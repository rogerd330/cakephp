<?php

$the_post = $this->requestAction(array(
    'controller' => 'posts',
    'action' => 'widget_post',
    $slug,
    'plugin' => 'content_management'
));

$show_title = isset($show_title) ? $show_title : true;
$show_excerpt = isset($show_excerpt) ? $show_excerpt : true;
$show_body = isset($show_body) ? $show_body : true;
$set_page_title = isset($set_page_title) ? $set_page_title : false;

if ($set_page_title) {
    $this->set('title_for_layout', $the_post['Post']['title']);
}

echo $this->Html->div(array('post-widget', "post-widget-{$slug}"));

if ($show_title) {
    echo $this->Html->div('title', $this->Html->tag('h2', $the_post['Post']['title']));
}

if ($show_excerpt) {
    if (!isset($excerpt_tag)) {
        echo $this->Html->div('excerpt', $the_post['Post']['excerpt']);
    }
    else {
        echo $this->Html->div('excerpt', $this->Html->tag($excerpt_tag, $the_post['Post']['excerpt']));
    }
}

if ($show_body) {
    echo $this->Html->div('body', $the_post['Post']['body']);
}

echo '</div>';

