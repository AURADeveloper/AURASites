<?php echo $this->Session->flash(); ?>
<?php foreach($this->data as $result):
    $service = $result['Service'];
    $this->set(compact('service')); ?>
<div class="row">
    <div class="col-xs-12">
        <?php echo $this->element('service_widget'); ?>
    </div>
</div>
<?php endforeach; ?>
