<?php $this->set('title_for_layout', 'Admin Edit Category') ?>
<div class="categories form">
	<h2><?php echo __('Admin Edit Category'); ?></h2>
	
	<div class="btn-group">
		<a class="btn btn-primary" href="#">Actions</a>
		<a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">
			<span class="caret"></span>
		</a>		
		<ul class="dropdown-menu">
	
				<li><?php echo $this->Form->postLink(__('<i class="icon-trash"></i> Delete'), array('action' => 'delete', $this->Form->value('Category.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Category.id'))); ?></li>
				<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Categories'), array('action' => 'index'), array('escape' => false));?></li>
			<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Posts'), array('controller' => 'posts', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Post'), array('controller' => 'posts', 'action' => 'add'), array('escape' => false)); ?> </li>
		</ul>
	</div>	
	
	<br />
	


<?php echo $this->Form->create('Category');?>
	<fieldset>
		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
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
