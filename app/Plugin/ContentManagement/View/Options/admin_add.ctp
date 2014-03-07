<?php $this->set('title_for_layout', 'Add Option') ?>
<div class="options form">
	<h2><?php echo __('Add Option'); ?></h2>

    <div class="btn-group">
    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list-alt"></span> List Options'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));?>	    	</div>
	
	<br />

<?php echo $this->Form->create('Option');?>
	<fieldset>
        <div class="row">
            <div class="col-lg-7">
	<?php
		echo $this->Form->input('name', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
		echo $this->Form->input('value', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
	?>
            </div>
            <div class="col-lg-5">
    <?php
        echo $this->element('BootstrapCheckbox', array('checked' => 'checked', 'field' => 'Option.autoload', 'label' => 'Auto load?'));
    ?>
            </div>
        </div>
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
