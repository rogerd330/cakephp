<?php $this->extend('/Common/right_nav') ?>
<?php $this->assign('title', $post['Post']['title']) ?>

<div class="posts view">
    <div class="meta">
        Posted on <span class="timestamp"><?php echo $this->Time->format('F jS, Y', $post['Post']['created']) ?></span> in <span class="category"><?php echo $post['Category']['name'] ?></span>
    </div>

    <div class="body">
        <?php echo $post['Post']['body']; ?>
    </div>
</div>

