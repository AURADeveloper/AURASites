<?php

class ServiceController extends AppController {

    public function index() {
        $this->data = $this->Service->findAllByBusinessId($this->client_id);
    }

    public function admin_edit($id = 1) {
        // Assign page title
        $this->set('title_for_layout', sprintf('Edit Service #%s', $id));

        // If the HTTP request it PUT, update existing record
        if ($this->request->is('put')) {
            if ($this->Service->save($this->request->data)) {
                $this->Session->setFlash(sprintf("Service #%s Updated!", $this->request->data['Service']['id']), 'notify_success');
            }
        }

        // Fetch current record from the database
        $result = $this->Service->findByIdAndBusinessId($id, $this->client_id);

        // Check if any results were found
        if (count($result) == 0) {
            $this->Session->setFlash(sprintf("No service with id #%s was located!", $id), 'notify_warn');

            // Redirect to new sample action - perhaps redirect to index list instead
            $this->redirect(array('controller' => 'service', 'action' => 'new', 'admin' => true));
        }

        // All good, pass result to client
        $this->data = $result;
    }

} 