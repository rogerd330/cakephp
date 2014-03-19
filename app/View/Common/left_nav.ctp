<?php

if ($this->fetch('page_title')) {
    $this->set('title_for_layout', $this->fetch('page_title'));
}
else {
    $this->set('title_for_layout', $this->fetch('title'));
}

?>

<div class="row">
    <div class="col-lg-2">
        <?php echo $this->element('ContentManagement.ChildNavList', array('class' => 'pages vertical')) ?>
    </div>
    <div class="col-lg-10">
        <?php echo $this->fetch('content') ?>
    </div>
</div>