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
    echo '<legend>Brand Colours</legend>';
    echo $this->StylePicker->create();
    echo $this->StylePicker->startPalette();
    echo $this->StylePicker->color('brand_primary');
    echo $this->StylePicker->color('brand_success');
    echo $this->StylePicker->color('brand_info');
    echo $this->StylePicker->color('brand_warning');
    echo $this->StylePicker->color('brand_danger');
    echo $this->StylePicker->endPalette();
    echo $this->StylePicker->end();
//    echo '<legend class="col-sm-offset-2 col-sm-10">Background Colour</legend>';
//    echo $this->Form->input('background_color');
//    echo $this->Form->input('background_style', array('type' => 'select', 'options' => $background_options));
//
//    echo '<div class="form-group">';
//    echo '<div class="col-sm-offset-2 col-sm-10">';
//    echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-primary'));
//    echo '</div>';
//    echo '</div>';


    ?>
  </div>
</div>
