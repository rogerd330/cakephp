<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?> | <?php echo $option_site_title ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap.min.css', 'app.css'));

        echo $this->Opengraph->meta(array(
            'og:title' => $title_for_layout,
            'og:site_name' => $option_site_title,
        ));
        echo $this->fetch('meta');
        echo $this->fetch('css');
	?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
    if (!empty($body_classes)) {
        echo $this->Html->tag('body', null, array('class' => $body_classes));
    }
    else {
        echo $this->Html->tag('body', null);
    }
?>
	<div class="container">
		<div class="header">
			<h1><?php echo $this->Html->link($option_site_title, '/'); ?></h1>
		</div>
		<div class="main">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div class="footer">

		</div>
	</div>

    <?php
        echo $this->Html->script(array('http://code.jquery.com/jquery-1.10.1.min.js', 'http://code.jquery.com/jquery-migrate-1.2.1.min.js', 'bootstrap.min.js', 'plugins.js', 'app.js'));
        echo $this->fetch('script');
    ?>
</body>
</html>
