<?php

App::uses('CakeEmail', 'Network/Email');

class ContactController extends AppController {

    public $components = array('RequestHandler');

    public function index() {
        if ($this->request->is('post')) {
            $result = $this->Contact->findById($this->client_id);
            $config = $result['Contact'];

            $Email = new CakeEmail($config);
            $Email->from(array($this->data['Contact']['email'] => $this->data['Contact']['name']))
                ->to($config['receiver_email'])
                ->subject($this->data['Contact']['subject'])
                ->send($this->data['Contact']['message']);
        }
    }

}
