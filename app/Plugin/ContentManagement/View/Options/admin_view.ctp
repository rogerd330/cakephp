<?php $this->set('title_for_layout', 'Option') ?>
<div class="options view">
<h2><?php  echo __('Option');?></h2>

<div class="btn-group">
	<a class="btn btn-primary" href="#"><?php echo __('Actions'); ?></a>
	<a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li><?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit Option'), array('action' => 'edit', $option['Option']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="icon-trash"></i> Delete Option'), array('action' => 'delete', $option['Option']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $option['Option']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Options'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Option'), array('action' => 'add'), array('escape' => false)); ?> </li>
	</ul>
</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($option['Option']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($option['Option']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($option['Option']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Autoload'); ?></dt>
		<dd>
			<?php echo h($option['Option']['autoload']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

