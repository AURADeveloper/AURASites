<?php

class DashboardController extends AppController {

  public $uses = array('business');

  public function admin_index() {
    $business = $this->Business->findById($this->client_id);
    $this->data = $business;
  }

}
