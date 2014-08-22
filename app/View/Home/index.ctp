<!--<section class="cover_image">-->
<!--    --><?php //if(!empty($home['cover'])): ?>
<!--    <div class="container">-->
<!--        <div class="well">-->
<!--            <div class="row">-->
<!--                <div class="col-lg-12">-->
<!--                    --><?php //echo $home['cover']; ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    --><?php //endif; ?>
<!--</section>-->
<!---->
<!--<section class="slogan">-->
<!--    <div class="container">-->
<!--        --><?php //echo $home['slogan']; ?>
<!--    </div>-->
<!--</section>-->
<!---->
<!--<section class="portal">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            --><?php //foreach($widgets as $widget): ?>
<!--            <div class="col-sm-4">-->
<!--                <div class="well">-->
<!--                    <p>--><?php //echo $this->Html->image($widget['image'], array('alt' => $widget['caption'], 'class' => 'img-responsive center-block')); ?><!--</p>-->
<!--                    <p class="text-center"><strong>--><?php //echo $widget['caption']; ?><!--</strong></p>-->
<!--                    <p class="text-center"><em>--><?php //echo $widget['text']; ?><!--</em></p>-->
<!--                    --><?php //echo $this->Html->link($widget['button'], '/' . $widget['link'], array('class' => 'btn btn-primary btn-lg btn-block')); ?>
<!--                </div>-->
<!--            </div>-->
<!--            --><?php //endforeach; ?>
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<div class="container">
    <?php echo $this->element('home/cover'); ?>
</div>
<div class="container">
    <?php echo $this->element('home/slogan');?>
</div>
<div class="container">
    <div class="row">
    <?php foreach($portals as $context):
        $portal = $context['Widget'];
        $this->set(compact('portal')); ?>
        <div class="col-sm-4">
            <?php echo $this->element('home/portal'); ?>
        </div>
    <?php endforeach; ?>
    </div>
</div>
