<?php
/**
 * Created by IntelliJ IDEA.
 * User: samedge
 * Date: 15/08/2014
 * Time: 8:33 AM
 */

class AboutController extends AppController {

    public function index() {
        $this->data = $this->About->findById($this->client_id);
    }

    public function admin_edit() {
        // Assign page title
        $this->set('title_for_layout', 'Edit About');

        // If the HTTP request it PUT, update existing record
        if ($this->request->is('put')) {
            if ($this->About->save($this->request->data)) {
                $this->Session->setFlash("About Updated!", 'notify_success');
            }
        }

        // Fetch current record from the database
        $result = $this->About->findById($this->client_id);

        // Check if any results were found
        if (count($result) == 0) {
            $this->Session->setFlash(sprintf("No service with id #%s was located!", $this->client_id), 'notify_warn');
        }

        // All good, pass result to client
        $this->data = $result;
    }

}
