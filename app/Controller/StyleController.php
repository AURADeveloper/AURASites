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
        if (empty($this->request->data)) {
            $this->request->data = $this->Style->findById($this->client_id);
        } else {
            $this->Style->id = $this->client_id;
            if ($this->Style->save($this->request->data)) {
                $this->Session->setFlash('Style Updated!');
            }
        }
    }

}
