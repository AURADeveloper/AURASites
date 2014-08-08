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
        <?php echo $business['trading_name'] . ' : ' . $title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->meta('icon');

    if (Configure::read('debug')) {
        echo $this->Html->tag('link', null, array('rel' => 'stylesheet/less', 'text' => 'text/css', 'href' => 'less/admin.less'));
        echo $this->Html->tag('link', null, array('rel' => 'stylesheet/less', 'text' => 'text/css', 'href' => 'less/bootstrap.less'));
        echo $this->Html->script('../bower_components/less/dist/less-1.7.3');
    } else {
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('admin');
    }

    echo $this->Html->css('../bower_components/font-awesome/css/font-awesome');

    echo $this->Html->script('../bower_components/jquery/dist/jquery');
    echo $this->Html->script('../bower_components/bootstrap/dist/js/bootstrap');
    echo $this->Html->script('holder');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<header>
    <?php echo $this->Html->image('logo-black.png', array('class', 'inline-image')); ?>
    <h1>Site Builder</h1>
</header>
<nav>
    <h1>General</h1>
    <ul>
        <li>Business Details</li>
        <li>Images & Style</li>
    </ul>
    <h1>Content</h1>
    <ul>
        <li>Home</li>
        <li>Services</li>
        <li>About</li>
    </ul>
</nav>
<main>
    <?php echo $this->fetch('content'); ?>
</main>

</body>
</html>
