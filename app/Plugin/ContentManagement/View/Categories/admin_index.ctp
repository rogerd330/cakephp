<?php $this->set('title_for_layout', 'Categories') ?>
<div class="categories index">
	<h2><?php echo __('Categories');?></h2>
	
	<div class="btn-group">
    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New Category'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list-alt"></span> List Posts'), array('controller' => 'posts', 'action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New Post'), array('controller' => 'posts', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
	</div>
	
	<br />
	
	<table class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
        <th><?php echo $this->Paginator->sort('name');?></th>
        <th><?php echo $this->Paginator->sort('parent_id');?></th>
        <th class="actions"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($categories as $category): ?>
	<tr>
        <td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
		<td><?php echo h($category['ParentCategory']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i> View'), array('action' => 'view', $category['Category']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?>
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $category['Category']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?>
			<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash icon-white"></i> Delete'), array('action' => 'delete', $category['Category']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
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

    <ul class="pagination">
	<?php
		echo $this->Paginator->prev('&larr;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'disabled', 'disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
		echo $this->Paginator->next('&rarr;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'disabled', 'disabledTag' => 'a'));
	?>
    </ul>
</div>