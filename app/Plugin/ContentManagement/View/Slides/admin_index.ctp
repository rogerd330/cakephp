<?php $this->set('title_for_layout', 'Slides') ?>
<div class="slides index">
	<h2><?php echo __('Slides');?></h2>
	
	<div class="btn-group">
    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span> New Slide'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>		</div>
	
	<br />
	
	<table class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('image');?></th>
            <th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('position');?></th>
            <th><?php echo $this->Paginator->sort('placement');?></th>
            <th><?php echo $this->Paginator->sort('enabled');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($slides as $slide): ?>
	<tr>
		<td><?php echo $this->Html->link($this->Html->image('/files/slides/' . $slide['Slide']['image'], array('width' => 200)), $slide['Slide']['link'], array('target' => '_blank', 'escape' => false)); ?>&nbsp;</td>
        <td><?php echo h($slide['Slide']['title']); ?>&nbsp;</td>
		<td class="text-center"><?php echo h($slide['Slide']['position']); ?>&nbsp;</td>
        <td><?php echo h($slide['Slide']['placement']); ?>&nbsp;</td>
        <td class="text-center"><?php echo $this->element('BootstrapBoolean', array('enabled' => $slide['Slide']['enabled'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i> View'), array('action' => 'view', $slide['Slide']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?>
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $slide['Slide']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?>
			<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash icon-white"></i> Delete'), array('action' => 'delete', $slide['Slide']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $slide['Slide']['id'])); ?>
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
		echo $this->Paginator->first('&lt;&lt;', array('tag' => 'li', 'class' => 'page-first', 'escape' => false));
		echo $this->Paginator->prev('&lt;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'disabled', 'disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('modulus' => 4, 'first' => 3, 'last' => 3, 'escape' => false, 'ellipsis' => '<li><a>&hellip;</a></li>', 'separator' => false, 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
		echo $this->Paginator->next('&gt;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'disabled', 'disabledTag' => 'a'));
		echo $this->Paginator->last('&gt;&gt;', array('tag' => 'li', 'class' => 'page-last', 'escape' => false));
	?>
    </ul>
</div>