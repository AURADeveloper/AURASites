<?php echo $this->Session->flash(); ?>

<h1 class="page-header">Home Page</h1>
<p class="help-block">
    The homepage may be the most important page on your website as it provides visitors their first impression. Be sure
    to include relevant information about your business that entices visitors to explore your website.
</p>

<h2>Cover</h2>
<p class="help-block">
    The cover is sits directly below the website navigational and is designed to be the first thing that catches your
    visitors eye. We recommend including a high resolution photograph or clip-art for the background. Over the top of
    this image is an overlay where you may introduce your business and summarize what you have to offer.
</p>
<?php echo $this->element('home/cover'); ?>

<!--<h2>Slogan</h2>-->
<!--<p class="help-block">-->
<!--    Below the cover is a strip that breaks up the homepage content. Inside, you may optionally include a-->
<!--    slogan that is relevant to your business.-->
<!--</p>-->
<? echo $this->element('home/slogan'); ?>

<h2>Portals</h2>
<p class="help-block">
    The homepage contains 3 portal widgets that act as a window to the other sections of your website. Each portal
    should contain a quality photo and description to the area of your website that you wish to draw attention to.
</p>
<div class="row">
<?php foreach($portals as $portal):
    $this->set(compact('portal')); ?>
    <div class="col-md-4">
        <?php echo $this->element('home/portal'); ?>
    </div>
<?php endforeach; ?>
</div>
