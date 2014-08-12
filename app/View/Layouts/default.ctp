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
            echo $this->Html->tag('link', null, array('rel' => 'stylesheet/less', 'text' => 'text/css', 'href' => 'less/aura.less'));
            echo $this->Html->tag('link', null, array('rel' => 'stylesheet/less', 'text' => 'text/css', 'href' => 'less/bootstrap.less'));
            echo $this->Html->script('../bower_components/less/dist/less-1.7.3');
        } else {
            echo $this->Html->css('bootstrap');
            echo $this->Html->css('aura');
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

<header role="banner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <?php
                if (!empty($style['img_logo'])) {
                    echo $this->Html->image($style['img_logo'], array('alt' => $business['trading_name'], 'class' => 'img-responsive'));
                } else {
                    echo $this->Html->tag('h1', $business['trading_name']);
                }
                ?>
            </div>
            <div class="hidden-xs col-sm-6">
                <?php
                if (!empty($style['img_logo_bang'])) {
                    echo $this->Html->image($style['img_logo_bang'], array('alt' => $business['trading_name'], 'class' => 'img-responsive pull-right'));
                }
                ?>
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-inverse clearfix" role="navigation">
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
                <li <?php if ($page == 'home') echo ' class="active"'?>><a href="/">Home</a></li>
                <li <?php if ($page == 'samples') echo ' class="active"'?>><a href="samples">Samples</a></li>
                <li <?php if ($page == 'services') echo ' class="active"'?>><a href="services">Services</a></li>
                <li <?php if ($page == 'about') echo ' class="active"'?>><a href="about">About</a></li>
                <li <?php if ($page == 'location') echo ' class="active"'?>><a href="location">Location</a></li>
                <li <?php if ($page == 'contact') echo ' class="active"'?>><a href="contact">Contact</a></li>
            </ul>
            <?php if (Configure::read('debug')) { ?>
              <ul class="nav navbar-nav navbar-right">
                <li><a class="pull-right" href="admin">Admin</a></li>
              </ul>
            <?php } ?>
        </div>
        <!-- /.navbar-collapse -->

    </div>
</nav>

<?php echo $this->fetch('content'); ?>

<section class="quick_links">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <address>
                    <strong><?php echo $business['trading_name']; ?></strong><br>
                    <?php echo $business['address_street1']; ?><br>
                    <?php echo $business['address_suburb'] . ', ' .
                        $business['address_state'] . ' ' .
                        $business['address_postcode']; ?><br>
                    <abbr title="Phone">P:</abbr> <?php echo $business['phone']; ?>
                </address>
            </div>

            <div class="col-xs-6 text-right">
                <strong>Offers + Updates</strong>
                <ul class="list-unstyled">
                    <?php if (!empty($business['social_plus'])) { ?>
                    <li>
                        <i class="fa fa-google-plus"></i>
                        <a href="http://plus.google.com/+<?php echo $business['social_plus']; ?>/">
                            +<?php echo $business['social_plus']; ?>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (!empty($business['social_facebook'])) { ?>
                    <li>
                        <i class="fa fa-facebook"></i>
                        <a href="http://www.facebook.com/<?php echo $business['social_facebook']; ?>/">
                            <?php echo $business['social_facebook']; ?>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (!empty($business['social_twitter'])) { ?>
                    <li>
                        <i class="fa fa-twitter"></i>
                        <a href="http://www.twitter.com/<?php echo $business['social_twitter']; ?>/">
                            @<?php echo $business['social_twitter']; ?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
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
</footer>

</body>
</html>
