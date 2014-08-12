<?php
/**
 * Created by IntelliJ IDEA.
 * User: samedge
 * Date: 11/08/2014
 * Time: 12:10 PM
 */

class StyleController extends AppController {

    public $layout = 'admin';

    public function admin_index() {
        $this->request->data = $this->Style->findById($this->client_id);
    }

    public function admin_edit() {
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

}
