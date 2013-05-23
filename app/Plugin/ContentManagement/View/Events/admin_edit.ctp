<?php $this->set('title_for_layout', 'Admin Edit Event') ?>
<div class="events form">
	<h2><?php echo __('Admin Edit Event'); ?></h2>
	
	<div class="btn-group">
		<a class="btn btn-primary" href="#">Actions</a>
		<a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">
			<span class="caret"></span>
		</a>		
		<ul class="dropdown-menu">
	
				<li><?php echo $this->Form->postLink(__('<i class="icon-trash"></i> Delete'), array('action' => 'delete', $this->Form->value('Event.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Event.id'))); ?></li>
				<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Events'), array('action' => 'index'), array('escape' => false));?></li>
			</ul>
	</div>	
	
	<br />
	


<?php echo $this->Form->create('Event');?>
	<fieldset>
		<div class="row">
            <div class="span6">
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('class' => 'input-xxlarge', 'div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
		echo $this->Form->input('body', array('rows' => 6, 'class' => 'input-xxlarge', 'div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
        echo $this->Form->input('location', array('rows' => 3, 'class' => 'input-xxlarge', 'div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
	?>
            </div>
            <div class="span6">
    <?php
        echo $this->Form->input('starts', array('minYear' => date('Y'), 'maxYear' => date('Y') + 5, 'class' => 'input-mini', 'div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
        echo $this->Form->input('ends', array('minYear' => date('Y'), 'maxYear' => date('Y') + 5, 'class' => 'input-mini', 'div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
        echo $this->Form->input('enabled', array('div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
    ?>
            </div>
        </div>
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
