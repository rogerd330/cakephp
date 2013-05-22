<?php $this->set('title_for_layout', 'Post') ?>
<div class="posts view">
<h2><?php  echo __('Post');?></h2>

<div class="btn-group">
	<a class="btn btn-primary" href="#"><?php echo __('Actions'); ?></a>
	<a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown">
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li><?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit Post'), array('action' => 'edit', $post['Post']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="icon-trash"></i> Delete Post'), array('action' => 'delete', $post['Post']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Posts'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Post'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-list-alt"></i> List Categories'), array('controller' => 'categories', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="icon-plus"></i> New Category'), array('controller' => 'categories', 'action' => 'add'), array('escape' => false)); ?> </li>
	</ul>
</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($post['Post']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($post['Post']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($post['Category']['name'], array('controller' => 'categories', 'action' => 'view', $post['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Excerpt'); ?></dt>
		<dd>
			<?php echo h($post['Post']['excerpt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($post['Post']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enabled'); ?></dt>
		<dd>
			<?php echo h($post['Post']['enabled']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($post['Post']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($post['Post']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

