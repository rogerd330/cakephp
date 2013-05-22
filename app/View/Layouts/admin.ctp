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

    echo $this->Html->css(array('bootstrap.min.css', 'bootstrap-responsive.min.css'));

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
                    <li class="active"><a href="#">Home</a></li>
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
