<?php $this->set('title_for_layout', 'Category') ?>
<div class="categories view">
<h2><?php  echo __('Category');?></h2>

<div class="btn-group">
	<a class="btn btn-primary" href="#"><?php echo __('Actions'); ?></a>
	<a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li><?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit Category'), array('action' => 'edit', $category['Category']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="icon-trash"></i> Delete Category'), array('action' => 'delete', $category['Category']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Categories'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Category'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Posts'), array('controller' => 'posts', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Post'), array('controller' => 'posts', 'action' => 'add'), array('escape' => false)); ?> </li>
	</ul>
</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($category['Category']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Posts');?></h3>
	<?php if (!empty($category['Post'])):?>
	<table class="table table-striped table-bordered table-condensed">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Excerpt'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Enabled'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id'];?></td>
			<td><?php echo $post['created'];?></td>
			<td><?php echo $post['modified'];?></td>
			<td><?php echo $post['category_id'];?></td>
			<td><?php echo $post['title'];?></td>
			<td><?php echo $post['excerpt'];?></td>
			<td><?php echo $post['body'];?></td>
			<td><?php echo $post['enabled'];?></td>
			<td><?php echo $post['slug'];?></td>
			<td><?php echo $post['type'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<i class="icon-eye-open"></i> View'), array('controller' => 'posts', 'action' => 'view', $post['id']), array('escape' => false, 'class' => 'btn')); ?>
				<?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id']), array('escape' => false, 'class' => 'btn')); ?>
				<?php echo $this->Form->postLink(__('<i class="icon-trash icon-white"></i> Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
