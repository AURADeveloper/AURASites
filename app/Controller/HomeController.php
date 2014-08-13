<?php

class HomeController extends AppController {

    public $layout = 'admin';
    //public $components = array('Security');

    public function admin_index() {
        $this->request->data = $this->Home->findById($this->client_id);
    }

    public function admin_edit() {
        if (!empty($this->request->data)) {
            if ($this->Home->saveAssociated($this->request->data, array('deep' => true))) {
                $this->Session->setFlash('Home Updated!');
            }
        }

        $this->request->data = $this->Home->findById($this->client_id);

        $bootstrap_form_options = $this->bootstrap_form_options;
        $this->set(compact('bootstrap_form_options'));
    }

}
