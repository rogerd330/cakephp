<h3>Submit a Comment</h3>
<hr/>
<?php echo $this->Form->create('Form', array('url' => '/form/comments')) ?>
<?php echo $this->Form->input('fullname', array('div' => 'form-group', 'label' => array('text' => 'Name', 'class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block')))) ?>
<?php echo $this->Form->input('email', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block')))) ?>
<?php echo $this->Form->input('url', array('div' => 'form-group', 'label' => array('text' => 'Website', 'class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block')))) ?>
<?php echo $this->Form->input('message', array('type' => 'textarea','div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block')))) ?>
<?php echo $this->Form->button('Submit Comment', array('class' => 'btn btn-primary')) ?>
<?php echo $this->Form->end() ?>