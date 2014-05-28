<?php $this->extend('/Common/right_nav') ?>
<?php $this->assign('title', $post['Post']['title']) ?>
<?php $this->OpenGraph->assign($post) ?>

<div class="posts view">
    <h2><?php echo $post['Post']['title'] ?></h2>
    <div class="meta">
        Posted on <span class="timestamp"><?php echo $this->Time->format('F jS, Y', $post['Post']['created']) ?></span> in <span class="category"><?php echo $post['Category']['name'] ?></span>
    </div>

    <div class="body">
        <?php echo $post['Post']['body']; ?>
    </div>

    <?php echo $this->element('ContentManagement.BlogComment') ?>
</div>

