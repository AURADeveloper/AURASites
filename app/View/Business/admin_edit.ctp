<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create($bootstrap_form_options); ?>
<div class="row">
    <div class="col-xs-12">
        <?php
        echo '<legend>Basic Info</legend>';
        echo $this->Form->input('trading_name');
        echo $this->Form->input('abn');
        echo $this->Form->input('phone');
        echo $this->Form->input('fax');

        echo '<legend>Address</legend>';
        echo $this->Form->input('address_street1');
        echo $this->Form->input('address_suburb');
        echo $this->Form->input('address_state');
        echo $this->Form->input('address_postcode');

        echo '<legend>Social</legend>';
        echo $this->Form->input('social_plus');
        echo $this->Form->input('social_facebook');
        echo $this->Form->input('social_twitter');
        echo $this->Form->input('map_url');

        echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';
        echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-default'));
        echo '</div>';
        echo '</div>';

        echo $this->Form->end();
        ?>
    </div>
</div>
