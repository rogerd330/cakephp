<?php
 /**
 * Created by Roger Dickey, Jr
 * rdickey@whytespyder.com
 * 3/6/14 9:48 PM
 */

App::uses('Post', 'ContentManagement.Model');

$use_custom_home = false;

$posts = new Post();
$posts = $posts->find('all', array(
    'fields' => array(
        'Post.id',
        'Post.slug',
        'Post.type',
        'ParentPost.slug',
    ),
    'conditions' => array(
        'Post.enabled' => true,
    ),
));
foreach ($posts as $post) {
    if (!empty($post['Post']['slug'])) {
        if ($post['Post']['type'] == CMS_PAGE) {
            if (array_key_exists('ParentPost', $post) && !empty($post['ParentPost']['slug'])) {
                Router::connect(__('/%s/%s', $post['ParentPost']['slug'], $post['Post']['slug']), array('controller' => 'Pages', 'action' => 'view', $post['Post']['id'], 'plugin' => 'content_management'));
            }
            else {
                $url = '/%s';
                if ($post['Post']['slug'] === 'home') {
                    $url = '/';
                    $use_custom_home = true;
                }

                Router::connect(__($url, $post['Post']['slug']), array('controller' => 'Pages', 'action' => 'view', $post['Post']['id'], 'plugin' => 'content_management'));
            }
        }
        else {
            Router::connect(__('/blog/%s', $post['Post']['slug']), array('controller' => 'Posts', 'action' => 'view', $post['Post']['id'], 'plugin' => 'content_management'));
        }
    }
}

Router::connect('/blog/*', array('controller' => 'Posts', 'action' => 'index', 'plugin' => 'ContentManagement'));

// Uncomment the Events route below if the site needs that functionality.
//Router::connect('/events', array('controller' => 'Events', 'action' => 'index', 'plugin' => 'ContentManagement'));

if (!$use_custom_home) {
    Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
}

Router::connect('/form/comments', array('controller' => 'forms', 'action' => 'comments', 'plugin' => 'ContentManagement'));