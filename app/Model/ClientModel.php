<?php
App::uses('AppModel', 'Model');

class ClientModel extends AppModel {

    public function __construction(Array $properties=array()) {
        foreach($properties as $key => $value) {
            $this->{$key} = $value;
        }
    }

}
