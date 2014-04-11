<?php $this->set('title_for_layout', 'Please Log In') ?>

<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <h2 class="text-center">Please Log In</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="well">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
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
    </div>
</div>