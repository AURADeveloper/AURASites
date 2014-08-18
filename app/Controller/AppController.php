<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $uses = array('Business');

    public function beforeFilter() {
        // Read the client id from the application global config
        $this->client_id = Configure::read('Client.id');

        // Bootstrap
        $bootstrap_form_options = array(
            'enctype' => 'multipart/form-data', // needed for uploading images
            'class' => 'form-horizontal', // bootstrap horizontal form
            'inputDefaults' => array(
                'div' => 'form-group', // wrap all inputs (including labels) in a div.form-group
                'class' => 'form-control', // the class to assign the input
                'between' => '<div class="col-sm-10">', // wraps the input - use a column
                'after' => '</div>', // wraps the input
                'label' => array(
                    'class' => 'col-sm-2 control-label'))); // label class

        $this->set(compact('bootstrap_form_options'));

        // Set admin controller state
        if (isset($this->params['admin'])) {
            $this->layout = 'admin';
        }

        // Set client controller state
        if (!isset($this->params['admin'])) {
            // Read the business details
            $result = $this->Business->findById($this->client_id);
            $business = $result['Business'];
            $style = $result['Style'];

            // Assign the page variable for use with the navigation menu
            $path = func_get_args();
            if (!empty($path[0])) {
                $page = $path[0];
            }

            $this->set(compact('business', 'style', 'page'));
        }
    }

}
