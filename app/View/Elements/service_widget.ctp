<div class="panel panel-primary service">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $service['heading']; ?></h3>
        <?php if (isset($this->params['admin'])):?>
        <div class="toolbar">
        <?php
            echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array(
                    'controller' => 'service',
                    'action' => 'edit',
                    $service['id']),
                array('class' => 'bg-info', 'escapeTitle' => false));
            echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span>', array(
                    'controller' => 'service',
                    'action' => 'delete',
                    $service['id']),
                array('class' => 'bg-info', 'escapeTitle' => false));
            echo $this->Html->link('<span class="glyphicon glyphicon-chevron-up"></span>', array(
                    'controller' => 'service',
                    'action' => 'shift',
                    $service['id'], 'up'),
                array('class' => 'bg-info', 'escapeTitle' => false));
            echo $this->Html->link('<span class="glyphicon glyphicon-chevron-down"></span>', array(
                    'controller' => 'service',
                    'action' => 'shift',
                    $service['id'], 'down'),
                array('class' => 'bg-info', 'escapeTitle' => false));
        ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <?php if (!empty($service['image'])) echo $this->Html->image($service['image'], array('class' => 'img-responsive center-block')); ?>
                <button type="button" class="btn btn-lg btn-primary btn-block"><?php echo $service['button']; ?></button>
            </div>
            <div class="col-sm-6 col-md-8">
                <?php echo $service['description']; ?>
            </div>
        </div>
    </div>
</div>
