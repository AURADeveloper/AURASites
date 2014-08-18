<?php

class SampleController extends AppController {

    public $components = array('RequestHandler');

    /**
     * Lists all existing samples.
     */
    public function index() {
        $this->data = $this->Sample->findAllByBusinessId($this->client_id);
    }

    /**
     * Lists all existing samples.
     */
    public function admin_index() {
        $this->data = $this->Sample->findAllByBusinessId($this->client_id);
    }

    /**
     * Creates a new sample.
     */
    public function admin_new() {
        // Assign page title
        $this->set('title_for_layout', 'New Sample');

        // If the HTTP request is POST, create a new sample record
        if ($this->request->is('post')) {
            $this->Sample->create();
            if ($this->Sample->save($this->request->data)) {
                $this->Session->setFlash("New Sample Created!");
                $this->redirect(array('controller' => 'sample', 'action' => 'edit', 'admin' => true));
            }
        }

        // The New and Edit actions share the same view
        $this->render('admin_edit');
    }

    /**
     * Edits an existing sample.
     * @param int $id Id of the sample to edit. Defaults to 1.
     */
    public function admin_edit($id = 1) {
        // Assign page title
        $this->set('title_for_layout', sprintf('Edit Sample #%s', $id));

        // If the HTTP request it PUT, update existing record
        if ($this->request->is('put')) {
            if ($this->Sample->save($this->request->data)) {
                $this->Session->setFlash(sprintf("Sample #%s Updated!", $this->request->data['Sample']['id']), 'notify_success');
            }
        }

        // Fetch current record from the database
        $result = $this->Sample->findByIdAndBusinessId($id, $this->client_id);

        // Check if any results were found
        if (count($result) == 0) {
            $this->Session->setFlash(sprintf("No sample with id #%s was located!", $id), 'notify_warn');

            // Redirect to new sample action - perhaps redirect to index list instead
            $this->redirect(array('controller' => 'sample', 'action' => 'new', 'admin' => true));
        }

        // All good, pass result to client
        $this->data = $result;
    }

}
