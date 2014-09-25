<?php

App::import('Helper', 'Form');

/**
 * A helper class used to generate controls that enable editing and previewing
 * of various CSS styling. The style picker controls produced are essentially
 * customized, form controls specially designed for style elements.
 *
 * Therefore, styles forms can be actioned - viewed, edited etc.
 */
class StylePickerHelper extends AppHelper {

  public $helpers = array('Form', 'Js', 'Html');

  public function __construct(View $view, $settings = array()) {
    parent::__construct($view, $settings);
    $this->Js->buffer('$.colours = ' . json_encode($this->settings['colour']) . ';');
  }

  public function create($model = null, $options = array()) {
    return $this->Form->create($model, $options);
  }

  public function end($options = null, $secureAttributes = array()) {
    return $this->Form->end($options, $secureAttributes);
  }

  public function startPalette() {
    return '<div class="row">';
  }

  public function endPalette() {
    return '</div>';
  }

  public function colorVariant($fieldName, $options = array(), $attributes = array()) {
    $options = $this->settings['select_bg_colours'];

    $attributes['class'] = 'form-control';

    $append  = '<div class="col-sm-2">';
    $append .= $this->Form->select($fieldName, $options, $attributes);
    $append .= '</div>';
    return $append;
  }

  public function colorVariantJoin($variant, $color) {
    $variant_id = '#' . $this->Form->domId($variant);
    $color_id = '#' . $this->Form->domId($color);
    $this->Js->get($variant_id)->event(
        'change',
        'previewColour("' . $variant_id . '", "' . $color_id . '");'
    );

    return $this->color($color, $variant);
  }

/**
 * Generates a form field designed to display colors.
 * @param $fieldName
 * @param $variant
 * @return string
 */
  public function color($fieldName, $variant = null) {
    $color_id = '#' . $this->Form->domId($fieldName);
    $variant_id = ($variant == null) ? null : '#' . $this->Form->domId($variant);

    $options = array();
    $options['class'] = "color";
    $options['label'] = false;
    $options['between'] = '<div class="box">';
    $options['after'] = '</div>';

    $labelOptions = array('between' => '<div class="desc">', 'after' => '</div>');

    $this->Js->buffer('initColorPicker("' . $color_id . '", "' . $variant_id . '");');

    $append  = '<div class="col-sm-2 color-picker">';
    $append .= $this->Form->input($fieldName, $options);
    $append .= $this->Form->label($fieldName, null, $labelOptions);
    $append .= '</div>';
    return $append;
  }

  public function textureVariant($fieldName) {
    $options = $this->settings['select_bg_texture'];

    $attributes['class'] = 'form-control';

    $append  = '<div class="col-sm-2">';
    $append .= $this->Form->select($fieldName, $options, $attributes);
    $append .= '</div>';
    return $append;
  }

  public function gradient($fieldName, $variant = null) {
    $fieldId = $this->Form->domId($fieldName);
    $fieldPrevId = $this->Form->domId($fieldName) . '-prev';
    $variantId = ($variant == null) ? null : $this->Form->domId($variant);

    $append = '<div class="col-sm-4">';
    // Create a element to render the gradient tool
    $append .= $this->Html->div("gradient", "", array('id' => $fieldPrevId));
    // Create a input that will house the POST data
    $append .= $this->Form->input($fieldName);
    $append .= '</div>';

    $this->Js->buffer('initGradient("#' . $fieldPrevId . '" ,"#' . $fieldId . '", "#' . $variantId . '");');

    return $append;
  }

}
