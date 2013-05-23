<?php

if (empty($icons)) {
        $icons = 'checks';
}

switch ($icons) {
        case 'checks':
                $icon_true = 'icon-ok';
                $icon_false = 'icon-remove';
                break;

        case 'eyes':
                $icon_true = 'icon-eye-open';
                $icon_false = 'icon-eye-close';
                break;
}

$icon = $enabled ? $icon_true : $icon_false;

echo $this->Html->tag('i', "", array('class' => $icon));
