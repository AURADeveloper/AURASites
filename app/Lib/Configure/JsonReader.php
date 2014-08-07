<?php
App::uses('ConfigReaderInterface', 'Configure');

class JsonReader implements ConfigReaderInterface {

    public function __construct($path = null) {
        if (!$path) {
            $path = APP . 'Config' . DS;
        }
        $this->_path = $path;
    }

    public function read($key) {
        $jsonArray = json_decode(file_get_contents($this->_path . $key . '.json'), TRUE);
        return $jsonArray;
    }

    // As of 2.3 a dump() method is also required
    public function dump($key, $data) {
        // code to dump data to file
    }

}
