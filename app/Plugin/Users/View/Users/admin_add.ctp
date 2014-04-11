<?php $this->set('title_for_layout', 'Admin Add User') ?>
<div class="users form">
	<h2><?php echo __('Admin Add User'); ?></h2>

    <div class="btn-group">
    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list-alt"></span> List Users'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));?>	    	</div>
	
	<br />

<?php echo $this->Form->create('User');?>
	<fieldset>
		
	<?php
		echo $this->Form->input('enabled', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
		echo $this->Form->input('group_id', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
		echo $this->Form->input('login', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
		echo $this->Form->input('password', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
	?>
	</fieldset>
		<div class="form-group form-actions">
	<?php
		echo $this->Form->button(__('Save Changes'), array('type' => 'submit', 'class' => 'btn btn-primary'));
		echo '&nbsp;';
		echo $this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'btn btn-default'));
	?>
		</div>	
<?php echo $this->Form->end();?>
		</div>
