<?php $this->set('title_for_layout', 'Edit Page') ?>
<div class="posts form">
	<h2><?php echo __('Edit Page'); ?></h2>

    <div class="btn-group">
        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list-alt"></span> List Pages'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));?>
        <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span> Delete'), array('action' => 'delete', $this->Form->value('Post.id')), array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Post.id'))); ?>
    </div>
	
	<br />

<?php echo $this->Form->create('Post');?>
	<fieldset>
        <div class="row">
            <div class="col-lg-9">
	<?php
		echo $this->Form->input('id');
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
