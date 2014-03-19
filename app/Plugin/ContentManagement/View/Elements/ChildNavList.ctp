<?php
    $class = !empty($class) ? $class : null;
?>
<ul class="nav-list <?php echo $class ?>">
<?php foreach ($child_nav as $nav) : ?>
    <?php $active_class = $this->here === $nav['link'] ? 'active' : null ?>
    <li><?php echo $this->Html->link($nav['anchor'], $nav['link'], array('class' => $active_class)) ?></li>
<?php endforeach ?>
</ul>