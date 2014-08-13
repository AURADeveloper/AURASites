<?php

class Widget extends AppModel {

    function beforeSave($options = Array()) {
        $this->handleImageUpload($this->data['Widget'], 'image');
    }

}
