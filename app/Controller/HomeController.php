<?php

class HomeController extends AppController {

    public $uses = array('Home', 'Widget');
    public $components = array('RequestHandler');

    public function index() {
        $homes = $this->Home->findById($this->client_id);
        $home = $homes['Home'];

        $portals = $this->Widget->findAllByBusinessId($this->client_id);
        $this->set(compact('portals', 'home'));
    }

    public function admin_index() {
        $homes = $this->Home->findById($this->client_id);
        $home = $homes['Home'];

        $portals = $this->Widget->findAllByBusinessId($this->client_id);
        $this->set(compact('portals', 'home'));
    }

    public function admin_edit($section, $id) {
        if (isset($section) && $section == 'portal') {
            $this->data = $this->Widget->findById($id);
            if (count($this->data == 0)) {
                $this->Session->setFlash(sprintf('Unable to locate portal with id #%s.', $id), 'notify_warn');
                $this->redirect(array('controller' => 'Home', 'action' => 'index'));
            } else {
                $this->render('admin_edit_portal');
            }
        }

        $this->data = $this->Home->findById($this->client_id);
    }

}
