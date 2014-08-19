<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $service['heading']; ?>
            <?php if (isset($this->params['admin'])):
                echo $this->Html->link('<button class="btn btn-danger btn-xs pull-right">Delete</button>',
                    array(
                        'controller' => 'service',
                        'action' => 'delete',
                        $service['id']),
                    array(
                        'escapeTitle' => false));
                echo $this->Html->link('<button class="btn btn-success btn-xs pull-right">Edit</button>',
                    array(
                        'controller' => 'service',
                        'action' => 'edit',
                        $service['id']),
                    array(
                        'escapeTitle' => false));
                endif; ?>
        </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <?php echo $this->Html->image($service['image'], array('class' => 'img-responsive center-block')); ?>
                <button type="button" class="btn btn-lg btn-primary btn-block"><?php echo $service['button']; ?></button>
            </div>
            <div class="col-sm-6 col-md-8">
                <?php echo $service['description']; ?>
            </div>
        </div>
    </div>
</div>
