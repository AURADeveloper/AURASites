<?php

App::uses('CakeEmail', 'Network/Email');

class ContactController extends AppController {

    /**
     * When the controller is posted to on the index, it means the user is
     * attempting to send an email via the contact form. Otherwise, the form
     * is simply being loaded.
     */
    public function index() {
        if ($this->request->is('post')) {
            $result = $this->Contact->findById($this->client_id);
            $config = $result['Contact'];

            $Email = new CakeEmail($config);
            $Email->from(array($this->data['Contact']['email'] => $this->data['Contact']['name']))
                ->to(array($config['receiver_email'] => $config['receiver_name']))
                ->subject($this->data['Contact']['subject'])
                ->send($this->data['Contact']['message']);


        }
    }

    /**
     * Edits the contact settings.
     */
    public function admin_edit() {
        if ($this->request->is('put')) {
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash('The contact settings have been updated.', 'notify_success');
            } else {
                $this->Session->setFlash('There was an error saving the contact settings.', 'notify_warn');
            }
        }

        $this->data = $this->Contact->findById($this->client_id);
    }

}
