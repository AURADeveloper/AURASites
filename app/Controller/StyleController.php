<?php

class StyleController extends AppController {

  public function admin_index() {
    $this->request->data = $this->Style->findById($this->client_id);
  }

  private function admin_edit() {
    // Check for request data
    if (!empty($this->request->data)) {
      // We assign the client pk to prevent exploitation
      $this->Style->id = $this->client_id;

      // Save the changes to the database
      if ($this->Style->save($this->request->data)) {
          // Assign the flash message
          $this->Session->setFlash('Style Updated!');
      }
    }

    // Fetch the latest style state
    $this->request->data = $this->Style->findById($this->client_id);
  }

  public function admin_logo() {
    $this->admin_edit();
  }

  public function admin_colour() {
    $background_options = $this->Style->bg_texture_opt;
    $this->set(compact('background_options'));
    $this->admin_edit();
  }

  public function admin_elements() {
    $this->admin_edit();
  }

}
