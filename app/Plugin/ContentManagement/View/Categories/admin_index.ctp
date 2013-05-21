<?php $this->set('title_for_layout', 'Categories') ?>
<div class="categories index">
	<h2><?php echo __('Categories');?></h2>
	
	<div class="btn-group">
		<a class="btn btn-primary" href="#"><?php echo __('Actions'); ?></a>
		<a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">
			<span class="caret"></span>
		</a>		
		<ul class="dropdown-menu">
			<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Category'), array('action' => 'add'), array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Posts'), array('controller' => 'posts', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Post'), array('controller' => 'posts', 'action' => 'add'), array('escape' => false)); ?> </li>
		</ul>
	</div>	
	
	<br />
	
	<table class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="icon-eye-open"></i> View'), array('action' => 'view', $category['Category']['id']), array('escape' => false, 'class' => 'btn')); ?>
			<?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit'), array('action' => 'edit', $category['Category']['id']), array('escape' => false, 'class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('<i class="icon-trash icon-white"></i> Delete'), array('action' => 'delete', $category['Category']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
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