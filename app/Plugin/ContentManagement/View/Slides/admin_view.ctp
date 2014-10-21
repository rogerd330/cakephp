<?php $this->set('title_for_layout', 'Slide') ?>
<div class="slides view">
<h2><?php  echo __('Slide');?></h2>

<div class="btn-group">
	<a class="btn btn-primary" href="#"><?php echo __('Actions'); ?></a>
	<a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li><?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit Slide'), array('action' => 'edit', $slide['Slide']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="icon-trash"></i> Delete Slide'), array('action' => 'delete', $slide['Slide']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $slide['Slide']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Slides'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Slide'), array('action' => 'add'), array('escape' => false)); ?> </li>
	</ul>
</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enabled'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['enabled']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placement'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['placement']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['title']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

