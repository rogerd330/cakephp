<div class="well">
    <h4>Publish</h4>
<?php
    $checkbox_attribs = array(
        'field' => 'Post.enabled',
        'label' => 'Enabled?',
    );

    if ($this->request->params['action'] === 'admin_add') {
      $checkbox_attribs['checked'] = 'checked';
    }

    echo $this->element('BootstrapCheckbox', $checkbox_attribs);
    echo $this->Form->input('published', array(
        'type' => 'datetime',
        'label' => 'Publish on',
        'empty' => false,
        'class' => 'form-control',
        'div' => 'form-group',
        'minYear' => date('Y') - 5,
        'maxYear' => date('Y') + 5
    ));
?>
</div>