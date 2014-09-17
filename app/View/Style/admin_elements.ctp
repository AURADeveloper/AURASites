<h1 class="page-header">
  Edit Site Elements
</h1>
<?php echo $this->Form->create($bootstrap_form_options); ?>

<legend class="col-sm-offset-2 col-sm-10">Page Header</legend>
<?php echo $this->Form->input('header_style', array(
    'type' => 'select',
    'options' => $header_styles)); ?>

<legend class="col-sm-offset-2 col-sm-10">Navigation</legend>
<?php echo $this->Form->input('nav_style', array(
    'type' => 'select',
    'options' => $nav_styles)); ?>

<legend class="col-sm-offset-2 col-sm-10">Footer</legend>


<legend class="col-sm-offset-2 col-sm-10">Misc</legend>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <div class="checkbox">
      <label>
      <?php echo $this->Form->input('full_span',
          array('type' => 'checkbox',
                'div' => null,
                'class' => null,
                'between' => null,
                'after' => null,
                'label' => false)); ?>
        Full Page Span
      </label>
    </div>
  </div>
</div>
<?php echo $this->Form->input('custom_font', array(
    'type' => 'select',
    'options' => $custom_fonts)); ?>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <?php echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
  </div>
</div>

<?php echo $this->Form->end(); ?>
