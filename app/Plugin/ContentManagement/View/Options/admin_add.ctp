<?php $this->set('title_for_layout', 'Admin Add Option') ?>
<div class="options form">
	<h2><?php echo __('Admin Add Option'); ?></h2>
	
	<div class="btn-group">
		<a class="btn btn-primary" href="#">Actions</a>
		<a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">
			<span class="caret"></span>
		</a>		
		<ul class="dropdown-menu">
	
				<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Options'), array('action' => 'index'), array('escape' => false));?></li>
			</ul>
	</div>	
	
	<br />
	


<?php echo $this->Form->create('Option');?>
	<fieldset>
		<div class="row">
            <div class="span7">
	<?php
		echo $this->Form->input('name', array('class' => 'input-xxlarge', 'div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
		echo $this->Form->input('value', array('rows' => 6, 'class' => 'input-xxlarge', 'div' => 'control-group', 'label' => array('class' => 'control-label'), 'between' => '<div class="controls">', 'after' => '</div>', 'error' => array('attributes' => array('class' => 'help-inline'))));
	?>
            </div>
            <div class="span5">
    <?php
        echo $this->element('BootstrapCheckbox', array('checked' => 'checked', 'field' => 'Option.autoload', 'label' => 'Auto load?'));
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