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
     * @param $subdir string The destination directory (relative to WWW_ROOT) to write to
     */
    function handleImageUpload(&$source = Array(), $field, $subdir = null) {
        // Check if the a logo field has been assigned
        if (empty($source[$field])) return;

        // If the remove flag has been set, null the field
        if (in_array($field . '_remove', $source)) {
            $source[$field] = null;
            unset($source[$field . '_remove']);
            return;
        }

        // It has, next check its not empty or has error
        $meta = $source[$field];
        if ($meta['size'] && !$meta['error']) {
            // Set the file path, including the subdir if one was defined
            $file_path = is_null($subdir) ? $meta['name'] : $subdir . DS . $meta['name'];

            // Concat the destination filename - use the temp name hash to keep the image name unique
            $move_dir = WWW_ROOT . 'img' . DS . $file_path;

            // Move the temp upload to its home
            move_uploaded_file($meta['tmp_name'], $move_dir);

            // Update the model with the filename
            $source[$field] = $file_path;
        } else {
            // The entry is a dud, remove it
            unset($source[$field]);
        }
    }

    /**
     * Recompiles the businesses custom CSS styles.
     *
     * @throws InternalErrorException
     * @throws Exception
     */
    function recompileCustomStyles() {
        $less = new Less_Parser();

        try {
            $less->parseFile(WWW_ROOT . 'less' . DS . "bootstrap-client.less", WWW_ROOT . 'css' . DS . "bootstrap-client.css");
            $less->parseFile(WWW_ROOT . 'less' . DS . "bootstrap-admin.less",  WWW_ROOT . 'css' . DS . "bootstrap-admin.css");
            $less->parseFile(WWW_ROOT . 'less' . DS . "client.less", WWW_ROOT . 'css' . DS . "client.css");
            $less->parseFile(WWW_ROOT . 'less' . DS . "admin.less",  WWW_ROOT . 'css' . DS . "admin.css");
        } catch (Exception $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new InternalErrorException();
        }
    }

}
