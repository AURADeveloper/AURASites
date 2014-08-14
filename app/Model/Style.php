<?php

class Style extends AppModel {

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
        if (empty($this->data['Style']['brand_primary']) ||
            empty($this->data['Style']['brand_success']) ||
            empty($this->data['Style']['brand_info']) ||
            empty($this->data['Style']['brand_warning']) ||
            empty($this->data['Style']['brand_danger'])) return;

        $custom = sprintf('@brand-primary: #%s;',  $this->data['Style']['brand_primary']);
        $custom .= "\n";
        $custom .= sprintf('@brand-success: #%s;', $this->data['Style']['brand_success']);
        $custom .= "\n";
        $custom .= sprintf('@brand-info: #%s;',    $this->data['Style']['brand_info']);
        $custom .= "\n";
        $custom .= sprintf('@brand-warning: #%s;', $this->data['Style']['brand_warning']);
        $custom .= "\n";
        $custom .= sprintf('@brand-danger: #%s;',  $this->data['Style']['brand_danger']);
        $custom .= "\n";

        file_put_contents(WWW_ROOT . 'less' . DS . "custom-variables.less", $custom);

        $this->recompileCustomStyles();
    }

}
