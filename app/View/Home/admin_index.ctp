<?php echo $this->Session->flash(); ?>

<h1>Home Page</h1>
<p class="help-block">
    You may customize your businesses home.
</p>

<h2>Cover</h2>
<?php
echo $this->element('home/cover');
echo $this->element('home/slogan');
echo $this->Form->create($bootstrap_form_options);
echo $this->Form->end();
?>
<h2>Portals</h2>
<div class="row">
<?php foreach($portals as $context):
    $portal = $context['Widget'];
    $this->set(compact('portal')); ?>
    <div class="col-sm-4">
        <?php echo $this->element('home/portal'); ?>
    </div>
<?php endforeach; ?>
</div>
