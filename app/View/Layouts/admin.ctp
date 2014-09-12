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
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,400italic' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
    <?php echo $this->Html->image('logo.png', array('class', 'inline-image')); ?>
    <h1>Site Builder</h1>
    <div class="user-widget pull-right">
      <?php echo $this->Html->image($user['User']['picture']); ?>
      <div class="user-meta">
        <div class="user-name"><?php echo $user['User']['name']; ?></div>
        <div class="user-email"><?php echo $user['User']['email']; ?></div>
        <div class="logout">
          <?php echo $this->Html->link('Logout',
              array('controller' => 'user', 'action' => 'logout', 'admin' => false)); ?>
        </div>
      </div>
    </div>
</header>
<nav>
  <ul>
    <li><i class="fa fa-bars"></i> Dashboard
      <ul>
        <li><i class="fa"></i> <?php echo $this->Html->link('Overview', array('admin' => true, 'controller' => 'dashboard')); ?></li>
      </ul>
    </li>
    <li><i class="fa fa-briefcase"></i> Your Business
      <ul>
        <li><i class="fa"></i> <?php echo $this->Html->link('Details', array('admin' => true, 'controller' => 'business', 'action' => 'edit')); ?></li>
        <li><i class="fa"></i> <?php echo $this->Html->link('Branding', array('admin' => true, 'controller' => 'style', 'action' => 'edit')); ?></li>
        <li><i class="fa"></i> <?php echo $this->Html->link('Contact', array('admin' => true, 'controller' => 'contact', 'action' => 'edit')); ?></li>
      </ul>
    </li>
    <li><i class="fa fa-paint-brush"></i> Style
      <ul>
        <li><i class="fa"></i> <a href="">Logos</a></li>
        <li><i class="fa"></i> <a href="">Colours</a></li>
        <li><i class="fa"></i> <a href="">Elements</a></li>
      </ul>
    </li>
    <li><i class="fa fa-sitemap"></i> Site Content
      <ul>
        <li><i class="fa"></i> <?php echo $this->Html->link('Home', array('admin' => true, 'controller' => 'home', 'action' => 'index')); ?></li>
        <li><i class="fa"></i> <?php echo $this->Html->link('Sample', array('admin' => true, 'controller' => 'sample', 'action' => 'edit')); ?></li>
        <li><i class="fa"></i> <?php echo $this->Html->link('Service', array('admin' => true, 'controller' => 'service', 'action' => 'index')); ?></li>
        <li><i class="fa"></i> <?php echo $this->Html->link('About', array('admin' => true, 'controller' => 'about', 'action' => 'edit')); ?></li>
      </ul>
    </li>
  </ul>
</nav>
<main>
  <div>
    <?php echo $this->fetch('content'); ?>
  </div>
</main>
</body>
</html>
