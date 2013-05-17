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
<?php printf("<?php \$this->set('title_for_layout', 'View {$singularHumanName}') ?>\n") ?>

<div class="<?php echo $pluralVar; ?> view row">
    <div class="large-16 columns">
        <h2><?php echo "<?php  echo __('{$singularHumanName}'); ?>"; ?></h2>
    </div>

    <div class="actions">
        <a href="#" data-dropdown="drop-actions" class="small button dropdown"><?php echo "<?php echo __('Actions'); ?>"; ?></a>
        <ul id="drop-actions" class="f-dropdown">
            <?php
            echo "\t\t<li><?php echo \$this->Html->link(__('Edit " . $singularHumanName ."'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?> </li>\n";
            echo "\t\t<li><?php echo \$this->Form->postLink(__('Delete " . $singularHumanName . "'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), null, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?> </li>\n";
            echo "\t\t<li><?php echo \$this->Html->link(__('List " . $pluralHumanName . "'), array('action' => 'index')); ?> </li>\n";
            echo "\t\t<li><?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add')); ?> </li>\n";

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

    <dl>
        <?php
        foreach ($fields as $field) {
            $isKey = false;
            if (!empty($associations['belongsTo'])) {
                foreach ($associations['belongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                        $isKey = true;
                        echo "\t\t<dt><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></dt>\n";
                        echo "\t\t<dd>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t&nbsp;\n\t\t</dd>\n";
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                echo "\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n";
                echo "\t\t<dd>\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</dd>\n";
            }
        }
        ?>
    </dl>
</div>

<?php
if (!empty($associations['hasOne'])) :
    foreach ($associations['hasOne'] as $alias => $details): ?>
    <div class="related row">
        <h3><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?></h3>
        <div class="actions">
            <a href="#" data-dropdown="drop-actions-hasone" class="small button dropdown"><?php echo "<?php echo __('Actions'); ?>"; ?></a>
            <ul id="drop-actions-hasone" class="f-dropdown">
                <li><?php echo "<?php echo \$this->Html->link(__('Edit " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></li>\n"; ?>
            </ul>
        </div>
        <?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
        <dl>
            <?php
            foreach ($details['fields'] as $field) {
                echo "\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n";
                echo "\t\t<dd>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</dd>\n";
            }
            ?>
        </dl>
        <?php echo "<?php endif; ?>\n"; ?>
    </div>
    <?php
    endforeach;
endif;
if (empty($associations['hasMany'])) {
    $associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
    $associations['hasAndBelongsToMany'] = array();
}
$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
$i = 0;
foreach ($relations as $alias => $details):
	$otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize($details['controller']);
    ?>
<div class="related row">
	<h3><?php echo "<?php echo __('Related " . $otherPluralHumanName . "'); ?>"; ?></h3>
    <div class="actions">
        <a href="#" data-dropdown="drop-actions-hasmany" class="small button dropdown"><?php echo "<?php echo __('Actions'); ?>"; ?></a>
        <ul id="drop-actions-hasmany" class="f-dropdown">
            <li><?php echo "<?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?>"; ?> </li>
        </ul>
    </div>
    <?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
	<table>
    <thead>
    <tr>
        <?php
        foreach ($details['fields'] as $field) {
            echo "\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
        }
        ?>
        <th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
    </tr>
    </thead>
    <tbody>
<?php
    echo "\t<?php
		\$i = 0;
		foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
    echo "\t\t<tr>\n";
    foreach ($details['fields'] as $field) {
        echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
    }

    echo "\t\t\t<td class=\"actions\">\n";
    echo "\t\t\t<a href=\"#\" data-dropdown=\"drop-actions-hasmany-<?php echo \${$otherSingularVar}['{$details['primaryKey']}'] ?>\" class=\"small button dropdown\">Actions</a>\n";
    echo "\t\t<ul id=\"drop-actions-hasmany-<?php echo \${$otherSingularVar}['{$details['primaryKey']}'] ?>\" class=\"f-dropdown\">\n";
    echo "\t\t\t\t<li><?php echo \$this->Html->link(__('View'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}'])); ?></li>\n";
    echo "\t\t\t\t<li><?php echo \$this->Html->link(__('Edit'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}'])); ?></li>\n";
    echo "\t\t\t\t<li class=\"divider\"></li>";
    echo "\t\t\t\t<li><?php echo \$this->Form->postLink(__('Delete'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), null, __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?></li>\n";
    echo "\t\t</ul>";
    echo "\t\t\t</td>\n";
    echo "\t\t</tr>\n";

echo "\t<?php endforeach; ?>\n";
?>
    </tbody>
	</table>
<?php echo "<?php endif; ?>\n\n"; ?>
</div>
<?php endforeach; ?>
