<?php

class Style extends AppModel {

  public $bg_texture_opt = array(
    'solid',
    'gradient',
    'pattern'
  );

  /* Defines Header Styles */
  public $header_style = array(
    'no_bg' => 'No Background',
    'solid_bg' => 'Solid Background',
    'gradient_bg' => 'Gradient Background'
  );

  /* Defines Navigation Styles */
  public $nav_style = array(
    'standard' => 'Standard',
    'smooth' => 'Smooth',
    'industrial' => 'Industrial'
  );

  /* Defines Button Styles */
  public $button_style = array(
    'flat' => 'Flat',
    'rounded' => 'Rounded'
  );

  /* Defines Available Fonts */
  public $fonts = array(
    'arial' => 'Arial',
    'cabin' => 'Cabin',
    'droid_serif' => 'Droid Serif',
    'francois_one' => 'Francois One'
  );

  function beforeSave($options = Array()) {
    $this->handleImageUpload($this->data['Style'], 'img_logo');
    $this->handleImageUpload($this->data['Style'], 'img_logo_bang');
  }

  function afterSave($created, $options = Array()) {
    $this->handleStyleChange();
  }

  /**
   * Handles a CSS style change.
   *
   * If any of the less variables were changed, the site bootstrap and brand
   * less files are recompiled and served from every new request.
   */
  function handleStyleChange() {
    $this->data = $this->findById(Configure::read('Client.id'));

    // Target output buffer - custom variables
    $custom_vars = "@import '../bower_components/bootstrap/less/mixins.less';\n";

    // Output the primary brand variables
    $custom_vars .= sprintf("@brand-primary: #%s;\n", $this->data['Style']['brand_primary']);
    $custom_vars .= sprintf("@brand-success: #%s;\n", $this->data['Style']['brand_success']);
    $custom_vars .= sprintf("@brand-info: #%s;\n",    $this->data['Style']['brand_info']);
    $custom_vars .= sprintf("@brand-warning: #%s;\n", $this->data['Style']['brand_warning']);
    $custom_vars .= sprintf("@brand-danger: #%s;\n",  $this->data['Style']['brand_danger']);

    // Output the background colors
    $custom_vars .= sprintf("@background-color: #%s;\n", $this->data['Style']['background_color']);

    // Output the body style
    $custom_vars .= 'body { ';
    $custom_vars .= sprintf("background-color: @background-color; ");
    switch($this->data['Style']['background_style']) {
      case 'solid':
        // do nothing. bg color applied above
        break;
      case 'gradient':
        $custom_vars .= "#gradient.vertical(darken(@background-color, 10%), @background-color, 5%, 50%); ";
        break;
      case 'pattern':
        // todo: apply patterns
        break;
    }

    switch($this->data['Style']['custom_font']) {
      case 'cabin':
        $custom_vars .= "font-family: 'Cabin', sans-serif; ";
        break;
      case 'droid_serif':
        $custom_vars .= "font-family: 'Droid Serif', serif; ";
        break;
      case 'francois_one':
        $custom_vars .= "font-family: 'Francois One', serif; ";
        break;
    }
    $custom_vars .= "}\n";

    // Target output buffer - custom layout
    $custom_layout  = "@import '../bower_components/bootstrap/less/mixins.less';\n";
    $custom_layout .= "@import 'client-custom-variables.less';\n";

    // Output the header style
    $custom_layout .= 'header { ';
    switch ($this->data['Style']['header_style']) {
      case 'no_bg':
        $custom_layout .= 'background-color: transparent; ';
        break;
      case 'solid_bg':
        $custom_layout .= 'background-color: @brand-primary; ';
        break;
      case 'gradient_bg':
        $custom_layout .= "#gradient.vertical(@brand-primary, darken(@brand-primary, 10%), 5%, 100%); ";
        break;
    }
    $custom_layout .= "}\n";



    //$custom .= "@import \"client-default-variables.less\";\n";
    //$custom .= sprintf("@body-bg: #%s;\n", $this->data['Style']['background']);
    //$custom .= sprintf("body { #body%s; }\n", $this->data['Style']['background_texture']);

    file_put_contents(WWW_ROOT . 'less' . DS . "client-custom-variables.less", $custom_vars);
    file_put_contents(WWW_ROOT . 'less' . DS . "client-custom-layout.less", $custom_layout);

    $this->recompileCustomStyles();
  }

}
