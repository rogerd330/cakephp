<?php $this->set('title_for_layout', 'Add Slide') ?>
<div class="slides form">
	<h2><?php echo __('Add Slide'); ?></h2>

    <div class="btn-group">
    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list-alt"></span> List Slides'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));?>	    	</div>
	
	<br />

<?php echo $this->Form->create('Slide', array('type' => 'file'));?>
	<fieldset>
        <div class="row">
            <div class="col-lg-9">
	<?php
		echo $this->Form->input('image', array('type' => 'file', 'div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
        echo $this->Form->input('title', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
		echo $this->Form->input('link', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
	?>
            </div>
            <div class="col-lg-3">
                <div class="form-group form-actions">
                    <?php
                    echo $this->Form->button(__('Save Changes'), array('type' => 'submit', 'class' => 'btn btn-primary'));
                    echo '&nbsp;';
                    echo $this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'btn btn-default'));
                    ?>
                </div>
    <?php
        echo $this->element('BootstrapCheckbox', array('field' => 'Slide.enabled', 'label' => 'Enabled?', 'checked' => 'checked'));
        echo $this->Form->input('placement', array('value' => 'home', 'div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
        echo $this->Form->input('position', array('value' => 1, 'div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
    ?>
            </div>
        </div>
	</fieldset>

<?php echo $this->Form->end();?>
		</div>
