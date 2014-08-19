<?php echo $this->Session->flash(); ?>
<div class="row">
    <div class="col-xs-12">
        <?php
        echo '<legend>Contact Settings</legend>';

        echo $this->Form->create($bootstrap_form_options);
        echo $this->Form->hidden('id');

        echo $this->Form->input('host');
        echo $this->Form->input('port');
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('transport');
        echo $this->Form->input('receiver_name');
        echo $this->Form->input('receiver_email');

        echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';
        echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-default'));
        echo '</div>';
        echo '</div>';

        echo $this->Form->end();
        ?>
    </div>
</div>
