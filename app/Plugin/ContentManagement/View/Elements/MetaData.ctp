<?php

echo $this->Html->tag('h3', 'Meta Data');
echo $this->Form->input('Meta.id');
echo $this->Form->input('Meta.title', array('type' => 'text', 'div' => 'form-group', 'label' => array('class' => 'control-label','text' => 'Page Title'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
echo $this->Form->input('Meta.description', array('rows' => 3, 'div' => 'form-group', 'label' => array('class' => 'control-label', 'text' => 'Meta Description'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
echo $this->Form->input('Meta.keywords', array('type' => 'text', 'div' => 'form-group', 'label' => array('class' => 'control-label', 'text' => 'Meta Keywords'), 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'help-block'))));
