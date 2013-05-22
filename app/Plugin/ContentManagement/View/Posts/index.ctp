<?php $this->set('title_for_layout', 'Posts') ?>
<div class="posts index">
	<h2><?php echo __('Posts');?></h2>
	
	<div class="btn-group">
		<a class="btn btn-primary" href="#"><?php echo __('Actions'); ?></a>
		<a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">
			<span class="caret"></span>
		</a>		
		<ul class="dropdown-menu">
			<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Post'), array('action' => 'add'), array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Categories'), array('controller' => 'categories', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Category'), array('controller' => 'categories', 'action' => 'add'), array('escape' => false)); ?> </li>
		</ul>
	</div>	
	
	<br />
	
	<table class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('excerpt');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('enabled');?></th>
			<th><?php echo $this->Paginator->sort('slug');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($posts as $post): ?>
	<tr>
		<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($post['Category']['name'], array('controller' => 'categories', 'action' => 'view', $post['Category']['id'])); ?>
		</td>
		<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['excerpt']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['body']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['enabled']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['slug']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="icon-eye-open"></i> View'), array('action' => 'view', $post['Post']['id']), array('escape' => false, 'class' => 'btn')); ?>
			<?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit'), array('action' => 'edit', $post['Post']['id']), array('escape' => false, 'class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('<i class="icon-trash icon-white"></i> Delete'), array('action' => 'delete', $post['Post']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
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