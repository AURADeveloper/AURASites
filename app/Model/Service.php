<?php

class Service extends AppModel {

    function beforeSave($options = Array()) {
        $this->handleImageUpload($this->data['Service'], 'image', 'service');
    }

}
