<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo 'AURA Site Builder : ' . $title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->meta('icon');

    if (Configure::read('debug')) {
        echo $this->Html->css('../less/bootstrap-admin.less?', array('rel' => 'stylesheet/less'));
        echo $this->Html->css('../less/admin.less?', array('rel' => 'stylesheet/less'));
        echo $this->Html->script('../bower_components/less/dist/less-1.7.3');
    } else {
        echo $this->Html->css('bootstrap-admin');
        echo $this->Html->css('admin');
    }

    echo $this->Html->css('../bower_components/font-awesome/css/font-awesome');

    echo $this->Html->script('../bower_components/jquery/dist/jquery');
    echo $this->Html->script('../bower_components/bootstrap/dist/js/bootstrap');
    echo $this->Html->script('../bower_components/JSColor/jscolor');
    echo $this->Html->script('../bower_components/notifyjs/dist/notify');
    echo $this->Html->script('../bower_components/notifyjs/dist/styles/bootstrap/notify-bootstrap');
    echo $this->Html->script('holder');
    echo $this->Html->script('admin');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<header id="header">
    <?php echo $this->Html->image('logo-black.png', array('class', 'inline-image')); ?>
    <h1>Site Builder</h1>
</header>
<div id="wrapper">
    <div id="sidebar-wrapper">
        <nav id="nav">
            <h1>General</h1>
            <ul>
                <li><?php echo $this->Html->link('Details', array('admin' => true, 'controller' => 'business', 'action' => 'edit')); ?></li>
                <li><?php echo $this->Html->link('Branding', array('admin' => true, 'controller' => 'style', 'action' => 'edit')); ?></li>
            </ul>
            <h1>Content</h1>
            <ul>
                <li><?php echo $this->Html->link('Home', array('admin' => true, 'controller' => 'home', 'action' => 'edit')); ?></li>
                <li><?php echo $this->Html->link('Sample', array('admin' => true, 'controller' => 'sample', 'action' => 'edit')); ?></li>
                <li><?php echo $this->Html->link('Service', array('admin' => true, 'controller' => 'service', 'action' => 'edit')); ?></li>
                <li><?php echo $this->Html->link('About', array('admin' => true, 'controller' => 'about', 'action' => 'edit')); ?></li>
            </ul>
        </nav>
    </div>
    <div id="content-wrapper">
        <main id="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
