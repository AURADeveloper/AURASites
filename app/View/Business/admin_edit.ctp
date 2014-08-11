<h1>Business Details</h1>
<?php echo $this->Session->flash(); ?>
<?php
# Initialize a form, using bootstrap styles
echo $this->Form->create(array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'div' => 'form-group',
        'class' => 'form-control')));
?>
<div class="row">
    <div class="col-sm-6">
        <legend>Basic Info</legend>
        <div class="control-group">
            <?php
            # Declare the business form inputs
            echo $this->Form->input('trading_name', array('label' => 'Trading Name'));
            echo $this->Form->input('abn', array('label' => 'ABN'));
            echo $this->Form->input('phone', array('label' => 'Phone'));
            echo $this->Form->input('fax', array('label' => 'Fax'));
            ?>
        </div>

        <legend>Address</legend>
        <div class="control-group">
            <?php
            echo $this->Form->input('address_street1', array('label' => 'Street'));
            echo $this->Form->input('address_suburb', array('label' => 'Suburb'));
            echo $this->Form->input('address_state', array('label' => 'State'));
            echo $this->Form->input('address_postcode', array('label' => 'Postcode'));
            ?>
        </div>
    </div>
    <div class="col-sm-6">
        <legend>Social</legend>
        <div class="control-group">
            <?php
            echo $this->Form->input('social_plus', array('label' => 'Plus'));
            echo $this->Form->input('social_facebook', array('label' => 'Facebook'));
            echo $this->Form->input('social_twitter', array('label' => 'Twitter'));
            ?>
        </div>
    </div>
</div>
<?php
# Close the form, naming the submit button
echo $this->Form->end('Submit');
?>
