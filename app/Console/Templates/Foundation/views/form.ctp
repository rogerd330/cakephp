<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php printf("<?php \$this->set('title_for_layout', '%s %s') ?>\n", Inflector::humanize($action), $singularHumanName); ?>

<div class="<?php echo $pluralVar; ?> form row">
    <div class="large-16 columns">

    </div>

    <div class="actions">
        <a href="#" data-dropdown="drop-actions" class="small button dropdown"><?php echo "<?php echo __('Actions'); ?>"; ?></a>
        <ul id="drop-actions" class="f-dropdown">

            <?php if (strpos($action, 'add') === false): ?>
            <li><?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>"; ?></li>
            <li class="divider"></li>
            <?php endif; ?>
            <li><?php echo "<?php echo \$this->Html->link(__('List " . $pluralHumanName . "'), array('action' => 'index')); ?>"; ?></li>
            <?php
            $done = array();
            foreach ($associations as $type => $data) {
                foreach ($data as $alias => $details) {
                    if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
                        echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
                        echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
                        $done[] = $details['controller'];
                    }
                }
            }
            ?>
        </ul>
    </div>

<?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; ?>
	<fieldset>
		<legend><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></legend>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				echo "\t\techo \$this->Form->input('{$field}');\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
?>
	</fieldset>
<?php
	echo "<?php echo \$this->Form->button(__('Save Changes'), array('type' => 'submit', 'class' => 'small button')); ?>\n";
    echo "&nbsp;";
    echo "<?php echo \$this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'small secondary button')) ?>";

    echo "<?php echo \$this->Form->end(); ?>\n"
?>
</div>
