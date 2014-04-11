<?php $this->extend('/Common/right_nav') ?>
<?php $this->assign('title', $post['Post']['title']) ?>
<?php
if (array_key_exists('Meta', $post)) {
    $this->assign('page_title', $post['Meta']['title']);
    $this->Opengraph->meta('description', $post['Meta']['description'], array('inline' => false));
    $this->Opengraph->meta('keywords', $post['Meta']['keywords'], array('inline' => false));
}
?>

<div class="posts view">
    <h2><?php echo $post['Post']['title'] ?></h2>
    <div class="meta">
        Posted on <span class="timestamp"><?php echo $this->Time->format('F jS, Y', $post['Post']['created']) ?></span> in <span class="category"><?php echo $post['Category']['name'] ?></span>
    </div>

    <div class="body">
        <?php echo $post['Post']['body']; ?>
    </div>
</div>

