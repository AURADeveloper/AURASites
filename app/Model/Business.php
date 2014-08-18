<?php

class Business extends AppModel {
    public $hasOne = array(
        'Style' => array(
            'foreignKey' => 'id'));
    public $hasMany = 'Widget';
}
