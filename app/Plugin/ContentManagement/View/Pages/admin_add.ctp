<?php $this->set('title_for_layout', 'Add Page') ?>
<div class="posts form">
	<h2><?php echo __('Add Page'); ?></h2>

    <div class="btn-group">
        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list-alt"></span> List Pages'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));?>
    </div>
	
	<br />

<?php echo $this->Form->create('Post');?>
    <?php echo $this->Form->input('type', array('type' => 'hidden', 'value' => CMS_PAGE)) ?>

    <fieldset>
        <div class="row">
            <div class="col-lg-9">
	<?php
		echo $this->Form->input('title', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
		echo $this->Form->input('excerpt', array('rows' => 2, 'div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
		echo $this->Form->input('body', array('required' => false, 'rows' => 5, 'div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control ckeditor', 'error' => array('attributes' => array('class' => 'help-block'))));
        echo $this->element('ContentManagement.MetaData');
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
        echo $this->Form->input('parent_id', array('empty' => '(Choose one)', 'div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
        echo $this->Form->input('slug', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
        echo $this->element('ContentManagement.PostPublish');
    ?>
            </div>
        </div>
	</fieldset>

<?php echo $this->Form->end();?>
		</div>
