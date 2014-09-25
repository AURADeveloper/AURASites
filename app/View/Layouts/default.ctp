<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $business['trading_name'] . ' : ' . $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

    if (Configure::read('debug')) {
        echo $this->Html->css('../less/bootstrap-client.less?', array('rel' => 'stylesheet/less'));
        echo $this->Html->css('../less/client.less?', array('rel' => 'stylesheet/less'));
        echo $this->Html->script('../bower_components/less/dist/less-1.7.3');
    } else {
        echo $this->Html->css('bootstrap-client');
        echo $this->Html->css('client');
    }

    echo $this->Html->css('../bower_components/font-awesome/css/font-awesome');

    echo $this->Html->script('../bower_components/jquery/dist/jquery');
    echo $this->Html->script('../bower_components/bootstrap/dist/js/bootstrap');
    echo $this->Html->script('holder');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
  <!-- TODO switch this -->
  <link href='http://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>

</head>
<body>

<header role="banner"<?php if(!$style['full_span']) echo ' class="container"';?>>
  <div<?php if($style['full_span']) echo ' class="container"';?>>
    <?php echo $this->element($layout['header']['element'], array('widgets' => $layout['header']['widgets'])); ?>
  </div>
</header>

<nav class="navbar navbar-inverse clearfix <?php if(!$style['full_span']) echo ' container';?>" role="navigation">
  <div>
    <div<?php if($style['full_span']) echo ' class="container"';?>>
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
                <li <?php if ($page == 'sample') echo ' class="active"'?>>
                    <?php echo $this->Html->link('Samples', array('controller' => 'sample')); ?>
                </li>
                <li <?php if ($page == 'service') echo ' class="active"'?>>
                    <?php echo $this->Html->link('Services', array('controller' => 'service')); ?>
                </li>
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
  </div>
</nav>

<main>
  <?php echo $this->fetch('content'); ?>
</main>

<section class="quick_links<?php if(!$style['full_span']) echo ' container';?>">
    <div<?php if($style['full_span']) echo ' class="container"';?>>
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

<footer<?php if($style['full_span']) echo ' class="container"';?>>
    <div<?php if(!$style['full_span']) echo ' class="container"';?>>
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
