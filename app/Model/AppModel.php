<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    /**
     * Handles a image upload.
     *
     * If the field has been set, its checks that the file was uploaded
     * without error. If there was, the field is unset and silently fails.
     *
     * Otherwise, the image is moved to its home under the provided filename
     * (WEBROOT_DIR/img/FILE_NAME) and assigns the filename to the model field.
     *
     * @param $source array The model containing the image attribute
     * @param $field string The model attribute containing the file meta
     */
    function handleImageUpload(&$source = Array(), $field) {
        // Check if the a logo field has been assigned
        if (empty($source[$field])) return;

        // If the remove flag has been set, null the field
        if ($source[$field . '_remove']) {
            $source[$field] = null;
            unset($source[$field . '_remove']);
            return;
        }

        // It has, next check its not empty or has error
        $meta = $source[$field];
        if ($meta['size'] && !$meta['error']) {

            // Concat the destination filename
            $dest = WWW_ROOT . 'img' . DS . $meta['name'];

            // Move the temp upload to its home
            move_uploaded_file($meta['tmp_name'], $dest);

            // Update the model with the filename
            $source[$field] = $meta['name'];
        } else {
            // The entry is a dud, remove it
            unset($source[$field]);
        }
    }

    function recompileCustomStyles() {
        $less = new Less_Parser();

        try {
            $less->parseFile(WWW_ROOT . 'less' . DS . "bootstrap.less", WWW_ROOT . 'css' . DS . "bootstrap.css");
            $less->parseFile(WWW_ROOT . 'less' . DS . "aura.less",      WWW_ROOT . 'css' . DS . "aura.css");
        } catch (exception $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new InternalErrorException();
        }
    }

}
