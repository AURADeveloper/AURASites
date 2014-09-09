<?php echo $this->Session->flash(); ?>

<h1>Service Listing</h1>
<p class="help-block">
    List the various services that your business offers. We recommend for each service to display a relevant
    image at least 320x240 pixels in diameter. The button below the image will redirect potential customers
    to your contact form to make further enquires. You may adjust also the button text to suit your business
    need. ie: "Request a Quote", "Make a Booking", "Make an Enquiry"...
</p>

<h2>Style & Layout</h2>
<?php
echo $this->Form->create('ServiceStyle', $bootstrap_form_options);
echo $this->Form->hidden('id');
echo $this->Form->input('per_row',
 array('type' => 'select', 'options' => array(
     1 => 'One',
     2 => 'Two',
     3 => 'Three'
 )));

echo '<div class="form-group">';
echo '<div class="col-sm-offset-2 col-sm-10">';
echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-success'));
echo '</div>';
echo '</div>';

echo $this->Form->end();
?>

<h2>Current Services</h2>
<?php foreach($services as $result):
    $service = $result['Service'];
    $this->set(compact('service')); ?>
<div class="row">
    <div class="col-sm-2 text-right">
        <label>Service #<?php echo $service['id']; ?></label>
    </div>
    <div class="col-sm-10">
        <?php echo $this->element('service_widget'); ?>
    </div>
</div>
<?php endforeach; ?>

<div class="row">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->Html->link(
            'New Service',
            array('controller' => 'service', 'action' => 'new'),
            array('class' => 'btn btn-success')); ?>
    </div>
</div>
