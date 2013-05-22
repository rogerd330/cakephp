<?php $this->set('title_for_layout', 'Event') ?>
<div class="events view">
<h2><?php  echo __('Event');?></h2>

<div class="btn-group">
	<a class="btn btn-primary" href="#"><?php echo __('Actions'); ?></a>
	<a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li><?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit Event'), array('action' => 'edit', $event['Event']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="icon-trash"></i> Delete Event'), array('action' => 'delete', $event['Event']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Events'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Event'), array('action' => 'add'), array('escape' => false)); ?> </li>
	</ul>
</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($event['Event']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($event['Event']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Starts'); ?></dt>
		<dd>
			<?php echo h($event['Event']['starts']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ends'); ?></dt>
		<dd>
			<?php echo h($event['Event']['ends']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($event['Event']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enabled'); ?></dt>
		<dd>
			<?php echo h($event['Event']['enabled']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($event['Event']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($event['Event']['body']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

