<h1 class="page-header">Edit Contact Settings</h1>
<p class="help-block">
  The following settings defines the behavior of the contact form. Here you can specify who the contact form submissions
  are emailed to and the email protocol settings (advanced).
</p>
<div class="row">
  <div class="col-xs-12">
    <legend class="col-sm-offset-2 col-sm-10">Contact Person</legend>
    <?php
    echo $this->Form->create($bootstrap_form_options);
    echo $this->Form->hidden('id');
    echo $this->Form->input('receiver_name');
    echo $this->Form->input('receiver_email');
    echo '<div class="form-group">';
    echo '<div class="col-sm-offset-2 col-sm-10">';
    echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-primary'));
    echo '</div>';
    echo '</div>';
    echo $this->Form->end(); ?>

    <legend class="col-sm-offset-2 col-sm-10">Advanced Settings</legend>
    <?php
    echo $this->Form->create($bootstrap_form_options);
    echo $this->Form->input('host');
    echo $this->Form->input('port');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->input('transport'); ?>
    <p class="col-sm-offset-2 help-block">
      The following settings are for advanced usage only and should only be changed if you are know what to do.
      Otherwise, you can inadvertently break the contact form and you will not receive emails from potential
      customers.
    </p>

    <?php
    echo '<div class="form-group">';
    echo '<div class="col-sm-offset-2 col-sm-10">';
    echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-primary'));
    echo '</div>';
    echo '</div>';
    echo $this->Form->end(); ?>
  </div>
</div>
