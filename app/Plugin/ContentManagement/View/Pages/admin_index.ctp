<?php $this->set('title_for_layout', 'Pages') ?>
<div class="posts index">
	<h2><?php echo __('Pages');?></h2>
	
	<div class="btn-group">
        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New Page'), array('action' => 'add', 'plugin' => 'content_management', 'admin' => true), array('class' => 'btn btn-primary', 'escape' => false)); ?>
	</div>
	
	<br />
	
	<table class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('created');?></th>
            <th>
                <?php echo $this->Paginator->sort('title');?>
                &nbsp;/&nbsp;
			    <?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('enabled');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($posts as $post): ?>
	<tr>
		<td><?php echo $this->Time->format('M d, Y g:ia', $post['Post']['created']); ?>&nbsp;</td>
        <td>
            <?php if (!empty($post['ParentPost']['title'])) : ?>
            <?php echo $this->Html->link($post['ParentPost']['title'], array('action' => 'view', $post['ParentPost']['id'], 'plugin' => 'content_management', 'admin' => false)); ?> &gt;
            <?php endif ?>
            <?php echo h($post['Post']['title']); ?>&nbsp;</td>
		<td class="text-center"><?php echo $this->element('BootstrapBoolean', array('enabled' => $post['Post']['enabled'])) ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i> View'), array('action' => 'view', $post['Post']['id'], 'plugin' => 'content_management',  'admin' => false), array('escape' => false, 'class' => 'btn btn-default', 'target' => '_blank')); ?>
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $post['Post']['id'], 'plugin' => 'content_management', 'admin' => true), array('escape' => false, 'class' => 'btn btn-default')); ?>
			<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash icon-white"></i> Delete'), array('action' => 'delete', $post['Post']['id'], 'plugin' => 'content_management', 'admin' => true), array('escape' => false, 'class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
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