<?php $this->set('title_for_layout', 'Admin Edit Category') ?>
<div class="categories form">
	<h2><?php echo __('Admin Edit Category'); ?></h2>

    <div class="btn-group">
    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list-alt"></span> List Categories'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));?>			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list-alt"></span> List Posts'), array('controller' => 'posts', 'action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New Post'), array('controller' => 'posts', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
            <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span> Delete'), array('action' => 'delete', $this->Form->value('Category.id')), array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Category.id'))); ?>    	</div>
	
	<br />

<?php echo $this->Form->create('Category');?>
	<fieldset>
		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id', array('empty' => '(Choose one)', 'div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
		echo $this->Form->input('name', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
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
