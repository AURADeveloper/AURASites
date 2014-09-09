<?php

class BusinessController extends AppController {

    public $layout = 'admin';

    public function admin_index() {
        $this->request->data = $this->Business->findById($this->client_id);
    }

    public function admin_edit() {
        if (!empty($this->request->data)) {
            $this->Business->id = $this->client_id;
            if ($this->Business->save($this->request->data)) {
                $this->Session->setFlash('Business Updated!');
            }
        }

        $this->request->data = $this->Business->findById($this->client_id);
    }

}
