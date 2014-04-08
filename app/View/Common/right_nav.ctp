<?php

if ($this->fetch('page_title')) {
    $this->set('title_for_layout', $this->fetch('page_title'));
}
else {
    $this->set('title_for_layout', $this->fetch('title'));
}

?>

<div class="row">
    <div class="col-lg-8">
        <?php echo $this->fetch('content') ?>
    </div>
    <div class="col-lg-3 col-lg-offset-1">
        <div class="sidebar">
            <h3>Recent Posts</h3>
            <ul class="side-nav">
                <?php foreach ($recent as $id => $name) : ?>
                    <li><?php echo $this->Html->link($name, array('action' => 'view', $id, 'plugin' => 'content_management')) ?></li>
                <?php endforeach ?>
            </ul>

            <h3>Categories</h3>
            <ul class="side-nav">
                <?php foreach ($categories as $id => $name) : ?>
                    <li><?php echo $this->Html->link($name, array('action' => 'index', 'category' => $id, 'plugin' => 'ContentManagement')) ?></li>
                <?php endforeach ?>
            </ul>

            <h3>Archive</h3>
            <ul class="side-nav">
                <?php foreach ($archives as $archive) : ?>
                    <li><?php echo $this->Html->link($this->Time->format('F Y', $archive['Post']['published']), array('action' => 'index', 'archive' => $this->Time->format('Y-m', $archive['Post']['published']), 'plugin' => 'ContentManagement')) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>