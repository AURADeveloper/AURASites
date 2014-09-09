<?php

class About extends AppModel {

    function beforeSave($options = Array()) {
        $this->handleImageUpload($this->data['About'], 'image', 'about');
    }

}
