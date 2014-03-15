<?php $this->set('title_for_layout', 'Admin Add Post') ?>
<div class="posts form">
	<h2><?php echo __('Admin Add Post'); ?></h2>

    <div class="btn-group">
        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list-alt"></span> List Posts'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));?>
        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list-alt"></span> List Categories'), array('controller' => 'categories', 'action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New Category'), array('controller' => 'categories', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
    	</div>
	
	<br />

<?php echo $this->Form->create('Post');?>
    <?php echo $this->Form->input('type', array('type' => 'hidden', 'value' => CMS_POST)) ?>

    <fieldset>
        <div class="row">
            <div class="col-lg-9">
	<?php
		echo $this->Form->input('title', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
		echo $this->Form->input('excerpt', array('rows' => 2, 'div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
		echo $this->Form->input('body', array('required' => false, 'rows' => 5, 'div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control ckeditor', 'error' => array('attributes' => array('class' => 'help-block'))));
	?>
            </div>
            <div class="col-lg-3">
    <?php
        echo $this->Form->input('category_id', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
        echo $this->Form->input('slug', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
        echo $this->element('BootstrapCheckbox', array('field' => 'Post.enabled', 'label' => 'Enabled?', 'checked' => 'checked'));
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
