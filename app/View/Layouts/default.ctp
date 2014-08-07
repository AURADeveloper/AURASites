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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo Configure::read("Client.LegalName"); ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

        // use these in production
        //echo $this->Html->css('bootstrap');
        //echo $this->Html->css('aura');

        // use these in development
        echo $this->Html->tag('link', null, array('rel' => 'stylesheet/less', 'text' => 'text/css', 'href' => 'less/aura.less'));
        echo $this->Html->tag('link', null, array('rel' => 'stylesheet/less', 'text' => 'text/css', 'href' => 'less/bootstrap.less'));
        echo $this->Html->script('bower_components/less/dist/less-1.7.3');

        echo $this->Html->script('bower_components/jquery/dist/jquery');
        echo $this->Html->script('bower_components/bootstrap/dist/js/bootstrap');
        echo $this->Html->script('holder');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

<header role="banner">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <?php
                if ($has_logo_image)
                    echo $this->HTML->image('logo.png');
                else
                    echo $this->HTML->tag('h1', Configure::read('Client.LegalName'));
                ?>
            </div>
            <div class="col-xs-6 hidden-xs">
                <div class="pull-right">
                    <h3><?php echo Configure::read("Client.Phone"); ?></h3>
                </div>
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="header-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="samples">Samples</a></li>
                <li><a href="services">Services</a></li>
                <li><a href="about">About</a></li>
                <li><a href="location">Location</a></li>
                <li><a href="contact">Contact</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->

    </div>
</nav>

<?php echo $this->fetch('content'); ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
<!--                <div class="col-sm-4">-->
<!--                    --><?php //include $page_components["FOOTER"][$layout["footer"][0]] ?>
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    --><?php //include $page_components["FOOTER"][$layout["footer"][1]] ?>
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    --><?php //include $page_components["FOOTER"][$layout["footer"][2]] ?>
<!--                </div>-->
            </div>
        </div>
    </div>
</footer>
<div class="sitemap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-xs-9">
                    &copy; 2014 <?php echo Configure::read("Client.LegalName"); ?>. All rights reserved.</br>
                    <a href="#">Terms of Service</a> |
                    <a href="#">Privacy &amp; Security</a> |
                    <a href="#">Sitemap</a>
                </div>
                <div class="col-xs-3">
                    <!-- Translate Plugin  ================================================== -->
                    <div class="muted pull-right" id="google_translate_element"></div>
                    <script type="text/javascript">
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({pageLanguage: 'en', gaTrack: true, gaId: 'UA-46169315-1'}, 'google_translate_element');
                        }
                    </script>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
