<?php
    $admin_name = 'Site Admin';
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php printf("%s | %s", $title_for_layout, $admin_name) ?>
    </title>
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css(array('bootstrap.min.css', 'bootstrap-responsive.min.css', 'admin'));

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="#"><?php echo $admin_name ?></a>
                <ul class="nav">
                <?php foreach ($admin_nav as $nav) : ?>
                    <?php echo $this->Html->tag('li', $this->Html->link($nav['anchor'], $nav['link'])) ?>
                <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="container main">

        <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>
    </div>

    <?php echo $this->Html->script(array('bootstrap.min.js')) ?>

    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
