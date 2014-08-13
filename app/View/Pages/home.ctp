<section class="cover_image">
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-sm-6">
                    <h2>What we can do for you:</h2>
                    <ul>
                        <li>Establish web presence for your business</li>
                        <li>Build a website fast, tailored to your market</li>
                        <li>Reach out to new customers through AdWords campaigns</li>
                        <li>Customized, e-commerce and business solutions</li>
                        <li>Long term, future proof and cost effective</li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    We build on..
                    <div class="center-block google-logo">
                        <?php echo $this->HTML->image('google-logo.png', array('class' => 'img-responsive')); ?>
                    </div>
                    <span class="pull-right">
                        Aura Access is a
                        <a href="http://www.google.com.au/partners" target="_blank">Google Partner</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="slogan">
    <div class="container">
        <?php echo $home['slogan']; ?>
    </div>
</section>

<section class="portal">
    <div class="container">
        <div class="row">
            <?php foreach($widgets as $widget): ?>
            <div class="col-sm-6 col-md-4">
                <div class="well">
                    <p><?php echo $this->Html->image($widget['image'], array('alt' => $widget['caption'], 'class' => 'img-responsive center-block')); ?></p>
                    <p class="text-center"><strong><?php echo $widget['caption']; ?></strong></p>
                    <p class="text-center"><em><?php echo $widget['text']; ?></em></p>
                    <?php echo $this->Html->link($widget['button'], '/' . $widget['link'], array('class' => 'btn btn-primary btn-lg btn-block')); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
