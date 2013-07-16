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
    <?php echo $this->BootstrapNavbar->create($admin_name, $admin_nav) ?>

    <div class="container main">

        <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>
    </div>

    <?php echo $this->Html->script(array('//code.jquery.com/jquery-1.9.1.min.js', 'bootstrap.min.js')) ?>

    <?php //echo $this->element('sql_dump'); ?>
</body>
</html>
