<section class="cover_image">
    <?php if (isset($this->params['admin'])): ?>
        <div style="position: relative">
            <?php
                echo $this->Html->link(
                    '<button class="btn btn-default" style="position: absolute; top: 0; right: 0;">Edit</button>',
                    array('controller' => 'home', 'action' => 'edit', 'admin' => 'true'),
                    array('escapeTitle' => false));
            ?>
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
</section>
