<?php $this->extend('/Common/fullwidth') ?>
<?php $this->assign('title', 'Search Results') ?>

<div class="search index">

    <?php
    foreach ($posts as $post): ?>
        <article>
            <h3><?php echo $this->Html->link($post['Post']['title'], array('controller' => 'Posts', 'action' => 'view', $post['Post']['id'], 'plugin' => 'content_management')) ?></h3>
            <p class="excerpt">
                <?php echo $post['Post']['excerpt']; ?>
            </p>

            <?php echo $this->Html->link('Read more', array('controller' => 'Posts', 'action' => 'view', $post['Post']['id'], 'plugin' => 'content_management'), array('class' => 'btn btn-default')) ?>
        </article>
    <?php endforeach; ?>

    <?php if ($this->params['paging']['Post']['pageCount'] > 1) : ?>
        <ul class="pagination">
            <?php
            echo $this->Paginator->first('&lt;&lt;', array('tag' => 'li', 'class' => 'page-first', 'escape' => false));
            echo $this->Paginator->prev('&lt;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'disabled', 'disabledTag' => 'a'));
            echo $this->Paginator->numbers(array('modulus' => 4, 'first' => 3, 'last' => 3, 'escape' => false, 'ellipsis' => '<li><a>&hellip;</a></li>', 'separator' => false, 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
            echo $this->Paginator->next('&gt;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'disabled', 'disabledTag' => 'a'));
            echo $this->Paginator->last('&gt;&gt;', array('tag' => 'li', 'class' => 'page-last', 'escape' => false));
            ?>
        </ul>
    <?php endif ?>
</div>