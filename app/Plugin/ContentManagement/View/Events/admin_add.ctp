<?php $this->set('title_for_layout', 'Admin Add Event') ?>
<div class="events form">
	<h2><?php echo __('Admin Add Event'); ?></h2>
	
	<div class="btn-group">
		<a class="btn btn-primary" href="#">Actions</a>
		<a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">
			<span class="caret"></span>
		</a>		
		<ul class="dropdown-menu">
	
				<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Events'), array('action' => 'index'), array('escape' => false));?></li>
			</ul>
	</div>	
	
	<br />
	


<?php echo $this->Form->create('Event');?>
	<fieldset>
		
	<?php
		echo $this->Form->input('starts', array('div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
		echo $this->Form->input('ends', array('div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
		echo $this->Form->input('location', array('div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
		echo $this->Form->input('enabled', array('div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
		echo $this->Form->input('title', array('div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
		echo $this->Form->input('body', array('div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
	?>
	</fieldset>
		<div class="form-actions">
	<?php
		echo $this->Form->button(__('Save Changes'), array('type' => 'submit', 'class' => 'btn btn-primary'));
		echo '&nbsp;';
		echo $this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'btn'));
	?>
		</div>	
<?php echo $this->Form->end();?>
		</div>
