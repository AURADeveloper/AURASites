<?php echo $this->element('home/cover'); ?>
<?php echo $this->element('home/slogan');?>
<div class="container">
    <div class="row">
    <?php foreach($portals as $portal):
        $this->set(compact('portal')); ?>
        <div class="col-sm-4">
            <?php echo $this->element('home/portal'); ?>
        </div>
    <?php endforeach; ?>
    </div>
</div>
