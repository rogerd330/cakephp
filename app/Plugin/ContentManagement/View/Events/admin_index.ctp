<?php $this->set('title_for_layout', 'Events') ?>
<div class="events index">
	<h2><?php echo __('Events');?></h2>
	
	<div class="btn-group">
		<a class="btn btn-primary" href="#"><?php echo __('Actions'); ?></a>
		<a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">
			<span class="caret"></span>
		</a>		
		<ul class="dropdown-menu">
			<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Event'), array('action' => 'add'), array('escape' => false)); ?></li>
			</ul>
	</div>	
	
	<br />
	
	<table class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('starts');?></th>
			<th><?php echo $this->Paginator->sort('ends');?></th>
			<th><?php echo $this->Paginator->sort('location');?></th>
			<th><?php echo $this->Paginator->sort('enabled');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($events as $event): ?>
	<tr>
		<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['created']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['modified']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['starts']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['ends']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['location']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['enabled']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['title']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['body']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="icon-eye-open"></i> View'), array('action' => 'view', $event['Event']['id']), array('escape' => false, 'class' => 'btn')); ?>
			<?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit'), array('action' => 'edit', $event['Event']['id']), array('escape' => false, 'class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('<i class="icon-trash icon-white"></i> Delete'), array('action' => 'delete', $event['Event']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="pagination">
        <ul>
	<?php
		echo $this->Paginator->prev('&larr;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'disabled'));
		echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));
		echo $this->Paginator->next('&rarr;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'disabled'));
	?>
        </ul>
	</div>
</div>