<?php

class AdminController extends AppController {

    public $uses = array('Business');

    public function display() {
        $this->layout = 'admin';

        $businesses = $this->Business->find('first', array(
            'conditions' => array('Business.id' => 1)
        ));

        $business = $businesses['Business'];

        $this->set(compact('business'));

        $this->render('admin_home');
    }

}
