<?php

class Sample extends AppModel {

    function beforeSave($options = Array()) {
        $this->handleImageUpload($this->data['Sample'], 'image', 'sample');
    }

}
