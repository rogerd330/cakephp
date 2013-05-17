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
<div class="<?php echo $pluralVar; ?> index row">
    <div class="large-16 columns">
        <h2><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
    </div>

    <div class="actions">
        <a href="#" data-dropdown="drop-actions" class="small button dropdown"><?php echo "<?php echo __('Actions'); ?>"; ?></a>
        <ul id="drop-actions" class="f-dropdown">
            <li><?php echo "<?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add')); ?>"; ?></li>
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

	<table class="large-16 columns">
    <thead>
	<tr>
	<?php foreach ($fields as $field): ?>
		<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
	<?php endforeach; ?>
		<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
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
        echo "<a href=\"#\" data-dropdown=\"drop-actions-<?php echo \${$singularVar}['{$modelClass}']['{$primaryKey}'] ?>\" class=\"small button dropdown\">Actions</a>\n";
        echo "\t\t<ul id=\"drop-actions-<?php echo \${$singularVar}['{$modelClass}']['{$primaryKey}'] ?>\" class=\"f-dropdown\">\n";
		echo "\t\t\t<li><?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?></li>\n";
		echo "\t\t\t<li><?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?></li>\n";
        echo "\t\t\t<li class=\"divider\"></li>\n";
		echo "\t\t\t<li><?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), null, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?></li>\n";
        echo "\t\t</ul>\n";
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
	?>"; ?>
	</p>
	<ul class="pagination">
	<?php
		echo "<?php\n";
		echo "\t\techo \$this->Paginator->prev('&laquo;', array('class' => 'arrow', 'escape' => false, 'tag' => 'li'), null, array('class' => 'arrow unavailable', 'escape' => false, 'tag' => 'li'));\n";
		echo "\t\techo \$this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'a', 'separator' => ''));\n";
		echo "\t\techo \$this->Paginator->next('&raquo;', array('class' => 'arrow', 'escape' => false, 'tag' => 'li'), null, array('class' => 'arrow unavailable', 'escape' => false, 'tag' => 'li'));\n";
		echo "\t?>\n";
	?>
	</ul>
</div>
