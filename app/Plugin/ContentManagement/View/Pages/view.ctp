<?php
    $page_template = '/Common/left_nav';

    if (!empty($post['ParentPost']['slug']) && file_exists(APP . 'View' . DS . 'Common' . DS . $post['ParentPost']['slug'] . '.ctp')) {
        $page_template = '/Common' . DS . $post['ParentPost']['slug'];
    }

    if (file_exists(APP . 'View' . DS . 'Common' . DS . $post['Post']['slug'] . '.ctp')) {
        $page_template = '/Common' . DS . $post['Post']['slug'];
    }

    $this->extend($page_template);
?>
<?php $this->assign('title', $post['Post']['title']) ?>
<?php $this->OpenGraph->assign($post) ?>

<div class="posts view">
    <h2><?php echo h($post['Post']['title']); ?></h2>

    <dl>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($post['Post']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Parent Page'); ?></dt>
        <dd>
            <?php echo $this->Html->link($post['ParentPost']['title'], array('controller' => 'Pages', 'action' => 'view', $post['ParentPost']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Body'); ?></dt>
        <dd>
            <?php echo $post['Post']['body']; ?>
            &nbsp;
        </dd>
    </dl>
</div>

