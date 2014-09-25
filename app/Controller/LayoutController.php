<?php

class LayoutController extends AppController {

  public $helpers = array('StylePicker');

  public function admin_index() {
    $layout_options = $this->Layout->layouts;
    $this->set(compact('layout_options'));
  }

  public function beforeRender() {
    parent::beforeRender();
    $this->helpers['StylePicker'] = $this->getStylePickerSettings();
  }

}
