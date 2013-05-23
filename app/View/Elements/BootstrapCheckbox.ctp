<?php
if (!isset($checked)) {
    $checked = null;
}
?>
<div class="control-group">
    <div class="controls">
        <label class="checkbox">
            <?php echo $this->Form->input($field, array('type' => 'checkbox', 'checked' => $checked, 'label' => false, 'div' => false, 'after' => $label)) ?>
        </label>
    </div>
</div>