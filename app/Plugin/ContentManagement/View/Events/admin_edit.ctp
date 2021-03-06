<?php $this->set('title_for_layout', 'Edit Event') ?>
<div class="events form">
	<h2><?php echo __('Edit Event'); ?></h2>
	
	<div class="btn-group">
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-list-alt"></i> List Events'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));?>
        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i> Delete'), array('action' => 'delete', $this->Form->value('Event.id')), array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Event.id'))); ?>
    </div>
	
	<br />
	


<?php echo $this->Form->create('Event');?>
	<fieldset>
		<div class="row">
            <div class="col-lg-9">
	<?php
		echo $this->Form->input('id');
        echo $this->Form->input('title', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
        echo $this->Form->input('body', array('required' => false, 'rows' => 5, 'div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control ckeditor', 'error' => array('attributes' => array('class' => 'help-block'))));
        echo $this->Form->input('location', array('rows' => 2, 'div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
	?>
            </div>
            <div class="col-lg-3">
                <div class="form-actions">
                    <?php
                    echo $this->Form->button(__('Save Changes'), array('type' => 'submit', 'class' => 'btn btn-primary'));
                    echo '&nbsp;';
                    echo $this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'btn btn-default'));
                    ?>
                </div>
    <?php
        echo $this->element('BootstrapCheckbox', array('field' => 'Event.enabled', 'label' => 'Enabled?'));

        echo $this->Form->input('starts', array(
            'type' => 'datetime',
            'label' => 'Starts',
            'empty' => false,
            'class' => 'form-control input-sm',
            'div' => 'published-controls form-group',
            'minYear' => date('Y') - 5,
            'maxYear' => date('Y') + 5
        ));

        echo $this->Form->input('ends', array(
            'type' => 'datetime',
            'label' => 'Ends',
            'empty' => false,
            'class' => 'form-control input-sm',
            'div' => 'published-controls form-group',
            'minYear' => date('Y') - 5,
            'maxYear' => date('Y') + 5
        ));
    ?>
            </div>
        </div>
	</fieldset>

<?php echo $this->Form->end();?>
		</div>
