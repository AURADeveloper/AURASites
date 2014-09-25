<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#global" role="tab" data-toggle="tab">Global Style</a></li>
  <li><a href="#header" role="tab" data-toggle="tab">Header</a></li>
  <li><a href="#nav" role="tab" data-toggle="tab">Navigation</a></li>
  <li><a href="#content" role="tab" data-toggle="tab">Content</a></li>
  <li><a href="#footer" role="tab" data-toggle="tab">Footer</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="global">
    <?php echo $this->Form->create($bootstrap_form_options); ?>
    <div class="row">
      <div class="col-sm-4">
        <?php echo $this->Form->input('element', array('type' => 'select', 'size' => '4', 'options' => array($layout_options))); ?>
      </div>
    </div>
    <?php echo $this->Form->end(); ?>
  </div>

  <!-- Define the Background Header content -->
  <div class="tab-pane" id="header">
    <h2>Background Colour</h2>
    <?php
    echo $this->StylePicker->create();
    echo $this->StylePicker->startPalette();
    echo $this->StylePicker->colorVariant('Header.bg_select');
    echo $this->StylePicker->colorVariantJoin('Header.bg_select', 'Header.bg_color');
    echo $this->StylePicker->endPalette();
    ?>
    <h2>Background Texture</h2>
    <?php
    echo $this->StylePicker->startPalette();
    echo $this->StylePicker->textureVariant('Header.bg_tex_var');
    echo $this->StylePicker->gradient('Header.bg_grad', 'Header.bg_tex_var');
    echo $this->StylePicker->endPalette();
    echo $this->StylePicker->end();
    ?>
  </div>

  <div class="tab-pane" id="nav">...</div>
  <div class="tab-pane" id="content">...</div>
  <div class="tab-pane" id="footer">...</div>
</div>
