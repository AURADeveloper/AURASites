<section class="cover_image<?php if(!$style['full_span'] && !isset($this->params['admin'])) echo ' container';?>">
    <div<?php if($style['full_span'] && !isset($this->params['admin'])) echo ' class="container"';?>>
    <?php if (isset($this->params['admin'])): ?>
        <div class="options">
            <div>
                <?php echo $this->Html->link(
                        '<button class="btn btn-default">Edit</button>',
                        array('controller' => 'home', 'action' => 'edit', 'admin' => 'true'),
                        array('escapeTitle' => false)); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if(!empty($home['cover'])): ?>
    <div class="well">
        <div class="row">
            <div class="col-lg-12">
                <?php echo $home['cover']; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    </div>
</section>
