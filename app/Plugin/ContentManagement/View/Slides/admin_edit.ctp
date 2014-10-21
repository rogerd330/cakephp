<?php $this->set('title_for_layout', 'Edit Slide') ?>
<div class="slides form">
	<h2><?php echo __('Edit Slide'); ?></h2>

    <div class="btn-group">
    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list-alt"></span> List Slides'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));?>	            <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span> Delete'), array('action' => 'delete', $this->Form->value('Slide.id')), array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Slide.id'))); ?>    	</div>
	
	<br />

<?php echo $this->Form->create('Slide', array('type' => 'file'));?>
	<fieldset>

        <div class="row">
            <div class="col-lg-9">
            <?php
                echo $this->Form->input('id');
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
                echo $this->Form->input('position', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
                if ($this->Form->value('Slide.image') != null) {
                    echo $this->Html->tag('h3', 'Current Image');
                    echo $this->Html->link($this->Html->image(__('/files/slides/%s', $this->Form->value('Slide.image'))), __('/files/slides/%s', $this->Form->value('Slide.image')), array('class' => 'thumbnail', 'escape' => false, 'target' => '_blank'));
                }
            ?>
            </div>
        </div>

	</fieldset>
<?php echo $this->Form->end();?>
</div>
