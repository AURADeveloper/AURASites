<?php

class ServiceController extends AppController {

    public $uses = array('Service', 'ServiceStyle');
    public $components = array('RequestHandler');

    /**
     * Lists the client facing services page.
     */
    public function index() {
        $this->data = $this->Service->findAllByBusinessId($this->client_id);
    }

    /**
     * Lists the admin overview of the services page.
     */
    public function admin_index() {
        if ($this->request->is('put')) {
            if ($this->ServiceStyle->save($this->request->data)) {
                $this->Session->setFlash("Service style has been updated.", 'notify_success');
            } else {
                $this->Session->setFlash("There was an error saving the service style.", 'notify_warn');
            }
        }

        $this->data = $this->ServiceStyle->findById($this->client_id);

        $services = $this->Service->findAllByBusinessId($this->client_id);
        $this->set(compact('services'));
    }

    /**
     * Creates a new service record.
     */
    public function admin_new() {
        if ($this->request->is('post')) {
            $this->Service->create();
            $this->request->data['Service']['business_id'] = $this->client_id;
            if ($this->Service->save($this->request->data)) {
                $this->Session->setFlash("New service has been created.", 'notify_success');
                $this->redirect(array('controller' => 'service', 'action' => 'index'));
            } else {
                $this->Session->setFlash("There was an error saving the new service.", 'notify_warn');
            }
        }

        $this->render('admin_edit');
    }

    /**
     * Deletes a service record.
     * @param int $id The id of the record to delete
     */
    public function admin_delete($id) {
        if (!isset($id)) {
            $this->Session->setFlash("No id was provided.", 'notify_warn');
        } else if ($this->Service->delete($id)) {
            $this->Session->setFlash(sprintf("Service #%s has been deleted.", $id), 'notify_success');
        } else {
            $this->Session->setFlash(sprintf("There was an error deleting service #%s.", $id), 'notify_warn');
        }

        $this->redirect(array('controller' => 'service', 'action' => 'index'));
    }

    /**
     * Edits a service record.
     * @param int $id The id of the record to edit
     */
    public function admin_edit($id = 1) {
        // Assign page title
        $this->set('title_for_layout', sprintf('Edit Service #%s', $id));

        // If the HTTP request it PUT, update existing record
        if ($this->request->is('put')) {
            if ($this->Service->save($this->request->data)) {
                $this->Session->setFlash(sprintf("Service #%s has been updated.", $this->request->data['Service']['id']), 'notify_success');
                $this->redirect(array('controller' => 'service', 'action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf("There was an error saving changes made to Service #%s.", $this->request->data['Service']['id']), 'notify_success');
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