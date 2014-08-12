<?php

class Style extends AppModel {

    function beforeSave($options = Array()) {
        $this->handleImageUpload('img_logo');
        $this->handleImageUpload('img_logo_bang');
    }

    function afterSave($created, $options = Array()) {
        $this->handleStyleChange();
    }

    /**
     * Handles a image upload.
     *
     * If the field has been set, its checks that the file was uploaded
     * without error. If there was, the field is unset and silently fails.
     *
     * Otherwise, the image is moved to its home under the provided filename
     * (WEBROOT_DIR/img/FILE_NAME) and assigns the filename to the model field.
     *
     * @param $field string The model attribute containing the file meta
     */
    function handleImageUpload($field) {
        // Check if the a logo field has been assigned
        if (empty($this->data['Style'][$field])) return;

        // If the remove flag has been set, null the field
        if ($this->data['Style'][$field . '_remove']) {
            $this->data['Style'][$field] = null;
            unset($this->data['Style'][$field . '_remove']);
            return;
        }

        // It has, next check its not empty or has error
        $meta = $this->data['Style'][$field];
        if ($meta['size'] && !$meta['error']) {

            // Concat the destination filename
            $dest = WWW_ROOT . 'img' . DS . $meta['name'];

            // Move the temp upload to its home
            move_uploaded_file($meta['tmp_name'], $dest);

            // Update the model with the filename
            $this->data['Style'][$field] = $meta['name'];
        } else {
            // The entry is a dud, remove it
            unset($this->data['Style'][$field]);
        }
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

        $custom = sprintf('@brand-primary: #%s;' . "\n",  $this->data['Style']['brand_primary']);
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

        $less = new Less_Parser();
        $less->parseFile(WWW_ROOT . 'less' . DS . "bootstrap.less", WWW_ROOT . 'css' . DS . "bootstrap.css");
        $less->parseFile(WWW_ROOT . 'less' . DS . "aura.less",      WWW_ROOT . 'css' . DS . "aura.css");
    }

}
