<div class="portal">
    <?php if (isset($this->params['admin'])): ?>
    <div class="options">
        <div>
            <?php echo $this->Html->link(
                    '<button class="btn btn-default">Edit</button>',
                    array('controller' => 'home', 'action' => 'edit', 'portal', $portal['id']),
                    array('escapeTitle' => false)); ?>
        </div>
    </div>
    <?php endif; ?>
    <p><?php echo $this->Html->image($portal['image'], array('alt' => $portal['caption'], 'class' => 'img-responsive center-block')); ?></p>
    <p class="text-center"><strong><?php echo $portal['caption']; ?></strong></p>
    <p class="text-center"><em><?php echo $portal['text']; ?></em></p>
    <?php echo $this->Html->link($portal['button'], '/' . $portal['link'], array('class' => 'btn btn-primary btn-lg btn-block')); ?>
</div>
