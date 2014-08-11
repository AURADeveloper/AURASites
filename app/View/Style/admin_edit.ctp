<h1>Styles</h1>
<?php echo $this->Session->flash(); ?>
<?php
echo $this->Form->create(array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'div' => 'form-group',
        'class' => 'form-control')));
?>
<div class="control-group">
    <?php
    echo $this->Form->input('brand_primary', array('label' => 'Primary', 'class' => 'form-control color'));
    echo $this->Form->input('brand_success', array('label' => 'Success', 'class' => 'form-control color'));
    echo $this->Form->input('brand_info', array('label' => 'Info', 'class' => 'form-control color'));
    echo $this->Form->input('brand_warning', array('label' => 'Warning', 'class' => 'form-control color'));
    echo $this->Form->input('brand_danger', array('label' => 'Danger', 'class' => 'form-control color'));
    echo $this->Form->end('Submit');
    ?>
</div>
