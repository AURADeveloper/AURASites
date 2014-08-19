<?php

class Business extends AppModel {
    public $hasOne = array(
        'Style' => array('foreignKey' => 'id'),
        'About' => array('foreignKey' => 'id'),
        'Contact' => array('foreignKey' => 'id'),
        'Home' => array('foreignKey' => 'id'));
    public $hasMany = array('Widget', 'Sample', 'Service');
}
