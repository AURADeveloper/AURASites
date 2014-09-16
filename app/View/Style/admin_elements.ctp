<?php

echo $this->Form->create($bootstrap_form_options);

echo '<div class="form-group">';
echo '<label class="col-sm-2 control-label">Full Page Span</label>';
echo '<div class="col-sm-10">';
echo '<div class="checkbox">';
echo '<label>';
echo $this->Form->input('full_span', array('type' => 'checkbox', 'div' => null, 'class' => null, 'between' => null, 'after' => null, 'label' => false));
echo '</label>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<div class="col-sm-offset-2 col-sm-10">';
echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-default'));
echo '</div>';
echo '</div>';

echo $this->Form->end();

?>
