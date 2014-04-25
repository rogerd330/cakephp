<?php $this->set('title_for_layout', 'Events') ?>
<div class="events index">
	<h2><?php echo __('Events');?></h2>

	<?php foreach ($events as $event): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="event">
                <h3 class="title"><?php echo h($event['Event']['title']); ?></h3>

                <div class="timestamp">
                    <?php echo h($event['Event']['timestamp']); ?>
                </div>

                <p class="body">
                    <?php echo $event['Event']['body']; ?>
                </p>

                <div class="location">
                    <?php echo $event['Event']['location']; ?>
                </div>

                </div>

                <hr/>
            </div>
        </div>
    <?php endforeach; ?>

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