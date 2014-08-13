<?php

class Home extends AppModel {

    public $hasMany = array(
        'Widget' => array (
            'className' => 'Widget',
            'foreignKey' => 'business_id'
        )
    );

}
