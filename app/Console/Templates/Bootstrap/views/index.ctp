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
<?php printf("<?php \$this->set('title_for_layout', '{$pluralHumanName}') ?>\n") ?>
<div class="<?php echo $pluralVar;?> index">
	<h2><?php echo "<?php echo __('{$pluralHumanName}');?>";?></h2>
	
	<div class="btn-group">
    <?php echo "<?php echo \$this->Html->link(__('<span class=\"glyphicon glyphicon-plus\"></span> New " . $singularHumanName . "'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>";?>
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
	</div>
	
	<br />
	
	<table class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
	<?php  foreach ($fields as $field):?>
		<th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>";?></th>
	<?php endforeach;?>
		<th class="actions"><?php echo "<?php echo __('Actions');?>";?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	echo "<?php
	foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t<tr>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
			}
		}

		echo "\t\t<td class=\"actions\">\n";
		echo "\t\t\t<?php echo \$this->Html->link(__('<i class=\"glyphicon glyphicon-eye-open\"></i> View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false, 'class' => 'btn btn-default')); ?>\n";
	 	echo "\t\t\t<?php echo \$this->Html->link(__('<i class=\"glyphicon glyphicon-pencil\"></i> Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false, 'class' => 'btn btn-default')); ?>\n";
	 	echo "\t\t\t<?php echo \$this->Form->postLink(__('<i class=\"glyphicon glyphicon-trash icon-white\"></i> Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false, 'class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "<?php endforeach; ?>\n";
	?>
	</tbody>
	</table>
	<p>
	<?php echo "<?php
	echo \$this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>";?>
	</p>

    <ul class="pagination">
	<?php
		echo "<?php\n";
        echo "\t\techo \$this->Paginator->first('&lt;&lt;', array('tag' => 'li', 'class' => 'page-first', 'escape' => false));\n";
        echo "\t\techo \$this->Paginator->prev('&lt;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'disabled', 'disabledTag' => 'a'));\n";
        echo "\t\techo \$this->Paginator->numbers(array('modulus' => 4, 'first' => 3, 'last' => 3, 'escape' => false, 'ellipsis' => '<li><a>&hellip;</a></li>', 'separator' => false, 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));\n";
        echo "\t\techo \$this->Paginator->next('&gt;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'disabled', 'disabledTag' => 'a'));\n";
        echo "\t\techo \$this->Paginator->last('&gt;&gt;', array('tag' => 'li', 'class' => 'page-last', 'escape' => false));\n";
		echo "\t?>\n";
	?>
    </ul>
</div>