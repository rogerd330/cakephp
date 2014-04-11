<?php $this->set('title_for_layout', 'Please Log In') ?>

<div class="row">
    <div class="col-lg-4 col-lg-offset-2">
        <h2>Please Log In</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-lg-offset-2">
        <div class="well">
            <?php echo $this->Form->create('User', array('class' => 'form-horizontal')) ?>
            <?php echo $this->Form->input('login', array('div' => 'form-group', 'label' => array('class' => 'control-label','text' => 'Username'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block')))); ?>
            <?php echo $this->Form->input('password', array('div' => 'form-group', 'label' => array('class' => 'control-label','text' => 'Password'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block')))); ?>
            <div class="form-group">
            <?php echo $this->Form->button('Log In', array('class' => 'btn btn-primary btn-block')) ?>
            </div>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
</div>