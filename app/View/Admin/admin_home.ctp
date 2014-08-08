<h1>Business Details</h1>
<div class="container-fluid">
    <div class="well">
        <?php
        # Initialize a form, using bootstrap styles
        echo $this->Form->create('Business', array(
            'class' => 'form-horizontal',
            'inputDefaults' => array(
                'div' => 'form-group',
                'class' => 'form-control')));

        # Declare the business form inputs
        echo $this->Form->input('trading_name', array('label' => 'Trading Name'));
        echo $this->Form->input('abn', array('label' => 'ABN'));

        # Close the form, naming the submit button
        echo $this->Form->end('Submit');
        ?>
    </div>
</div>
