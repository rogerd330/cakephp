<?php
 /**
 * Created by Roger Dickey, Jr
 * rdickey@whytespyder.com
 * 3/6/14 9:48 PM
 */

App::uses('Post', 'ContentManagement.Model');
$posts = new Post();
$slugs = $posts->find('list', array(
    'fields' => array(
        'Post.slug',
    ),
    'condition' => array(
        'Post.enabled' => true,
    ),
));
foreach ($slugs as $k => $v) {
    if (!empty($v)) {
        Router::connect(__('/%s', $v), array('controller' => 'Posts', 'action' => 'view', $k, 'plugin' => 'ContentManagement'));
    }
}