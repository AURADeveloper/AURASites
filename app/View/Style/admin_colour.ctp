<h1 class="page-header">
  Edit Colour
</h1>
<p class="help-block">
  Choose the colours that brand your business; we will do the rest and ensure that the rest of the site is consistently
  styled throughout.
</p>
<div class="row">
  <div class="col-sm-12">
    <?php
    echo '<legend class="col-sm-offset-2 col-sm-10">Brand Colours</legend>';
    echo $this->Form->create(array(
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'div' => 'form-group',
            'class' => 'form-control color',
            'between' => '<div class="col-sm-10">',
            'after' => '</div>',
            'label' => array(
                'class' => 'col-sm-2 control-label'))));

    echo $this->Form->input('brand_primary');
//    echo $this->Form->input('brand_success');
//    echo $this->Form->input('brand_info');
//    echo $this->Form->input('brand_warning');
//    echo $this->Form->input('brand_danger');

    echo '<legend class="col-sm-offset-2 col-sm-10">Background Colour</legend>';
    echo $this->Form->input('background_color');
    echo $this->Form->input('background_style', array('type' => 'select', 'options' => $background_options));

    echo '<div class="form-group">';
    echo '<div class="col-sm-offset-2 col-sm-10">';
    echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-primary'));
    echo '</div>';
    echo '</div>';

    echo $this->Form->end();
    ?>
  </div>
</div>
