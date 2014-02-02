<?php

if (empty($icons)) {
        $icons = 'checks';
}

switch ($icons) {
        case 'checks':
                $icon_true = 'glyphicon-ok';
                $icon_false = 'glyphicon-remove';
                break;

        case 'eyes':
                $icon_true = 'glyphicon-eye-open';
                $icon_false = 'glyphicon-eye-close';
                break;
}

$icon = array('glyphicon');
$icon[] = $enabled ? $icon_true : $icon_false;

echo $this->Html->tag('span', "", array('class' => $icon));