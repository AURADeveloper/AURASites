<h1 class="page-header">
  Edit your Business Logo
</h1>
<p class="help-block">
  Upload your business logo, this will appear in the header on every page.
</p>
<div class="row">
  <div class="col-lg-12">
    <legend class="col-sm-offset-2 col-sm-10">Business Logo</legend>
    <?php
    echo $this->Form->create($bootstrap_form_options);

    echo '<div class="form-group">';
    echo '<div class="col-sm-offset-2 col-sm-10">';
    $logoSrc = $this->request->data['Style']['img_logo'];
    if (empty($logoSrc)) $logoSrc = 'blank.gif';
    echo $this->Html->image($logoSrc, array('id' => 'logo-preview', 'class' => 'img-responsive'));
    echo '</div>';
    echo '</div>';

    echo $this->Form->input('img_logo', array('class' => 'form-control', 'type' => 'file',
        'label' => array('text' => 'Logo', 'class' => 'col-sm-2 control-label')));

    echo '<div class="form-group">';
    echo '<div class="col-sm-offset-2 col-sm-10">';
    echo '<div class="checkbox">';
    echo '<label>';
    echo $this->Form->input('img_logo_remove', array('type' => 'checkbox', 'div' => null, 'class' => null, 'between' => null, 'after' => null, 'label' => false));
    echo ' Remove';
    echo '</label>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    ?>
    <legend class="col-sm-offset-2 col-sm-10">Secondary Logo</legend>
    <p class="col-sm-offset-2 col-sm-10 help-block">
      If you have a second logo, upload it here. It will appear on the right hand side of the header.
    </p>
    <?php
    echo '<div class="form-group">';
    echo '<div class="col-sm-offset-2 col-sm-10">';
    $logoBangSrc = $this->request->data['Style']['img_logo_bang'];
    if (empty($logoBangSrc)) $logoBangSrc = 'blank.gif';
    echo $this->Html->image($logoBangSrc, array('id' => 'logo-bang-preview', 'class' => 'img-responsive'));
    echo '</div>';
    echo '</div>';

    echo $this->Form->input('img_logo_bang', array('class' => 'form-control', 'type' => 'file',
        'label' => array('text' => 'Logo Bang', 'class' => 'col-sm-2 control-label')));

    echo '<div class="form-group">';
    echo '<div class="col-sm-offset-2 col-sm-10">';
    echo '<div class="checkbox">';
    echo '<label>';
    echo $this->Form->input('img_logo_bang_remove', array('type' => 'checkbox', 'div' => null, 'class' => null, 'between' => null, 'after' => null, 'label' => false));
    echo ' Remove';
    echo '</label>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<div class="col-sm-offset-2 col-sm-10">';
    echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-primary'));
    echo '</div>';
    echo '</div>';

    echo $this->Form->end();
    ?>
  </div>
</div>
<script>
  // Preview the logo image
  $("#StyleImgLogo").change(function(){
    previewImage(this, "#logo-preview");
  });

  // Preview the logo bang image
  $("#StyleImgLogoBang").change(function(){
    previewImage(this, "#logo-bang-preview");
  });
</script>
