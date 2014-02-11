<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php printf("<?php \$this->set('title_for_layout', '%s %s') ?>\n", Inflector::humanize($action), $singularHumanName); ?>
<div class="<?php echo $pluralVar;?> form">
	<h2><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h2>

    <div class="btn-group">
    <?php echo "<?php echo \$this->Html->link(__('<span class=\"glyphicon glyphicon-list-alt\"></span> List " . $pluralHumanName . "'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));?>";?>
	<?php
			$done = array();
			foreach ($associations as $type => $data) {
				foreach ($data as $alias => $details) {
					if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
						echo "\t\t<?php echo \$this->Html->link(__('<span class=\"glyphicon glyphicon-list-alt\"></span> List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?>\n";
						echo "\t\t<?php echo \$this->Html->link(__('<span class=\"glyphicon glyphicon-plus\"></span> New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>\n";
						$done[] = $details['controller'];
					}
				}
			}
	?>
    <?php if (strpos($action, 'add') === false): ?>
        <?php echo "<?php echo \$this->Form->postLink(__('<span class=\"glyphicon glyphicon-trash\"></span> Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>";?>
    <?php endif;?>
	</div>
	
	<br />

<?php echo "<?php echo \$this->Form->create('{$modelClass}');?>\n";?>
	<fieldset>
		
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				if ($field == $primaryKey) {
					echo "\t\techo \$this->Form->input('{$field}');\n";
				}
				else {
					echo "\t\techo \$this->Form->input('{$field}', array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));\n";
				}
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
		<div class="form-group form-actions">
<?php		
	echo "\t<?php\n"; 
		echo "\t\techo \$this->Form->button(__('Save Changes'), array('type' => 'submit', 'class' => 'btn btn-primary'));\n";
		echo "\t\techo '&nbsp;';\n";
		echo "\t\techo \$this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'btn btn-default'));\n";
	echo "\t?>\n";
?>
		</div>	
<?php
	echo "<?php echo \$this->Form->end();?>\n";
?>
		</div>
