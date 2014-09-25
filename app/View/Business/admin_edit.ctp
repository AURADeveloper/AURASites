<h1 class="page-header">Edit Your Business Details</h1>
<p class="help-block">
  Keep your business details up to date. Updating them here with automatically update your website without having
  to do any further.
</p>
<div class="row">
  <div class="col-sm-12">
    <?php
    echo $this->Form->create($bootstrap_form_options);
    echo '<legend class="col-sm-offset-2 col-sm-10">Basic Info</legend>';
    echo $this->Form->input('trading_name');
    echo $this->Form->input('abn');
    echo $this->Form->input('phone');
    echo $this->Form->input('fax');

    echo '<legend class="col-sm-offset-2 col-sm-10">Address</legend>';
    echo $this->Form->input('address_street1');
    echo $this->Form->input('address_suburb');
    echo $this->Form->input('address_state');
    echo $this->Form->input('address_postcode');

    echo '<legend class="col-sm-offset-2 col-sm-10">Social</legend>';
    echo $this->Form->input('social_plus');
    echo $this->Form->input('social_facebook');
    echo $this->Form->input('social_twitter');
    echo $this->Form->input('map_url');

    echo '<div class="form-group">';
    echo '<div class="col-sm-offset-2 col-sm-10">';
    echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-primary'));
    echo '</div>';
    echo '</div>';

    echo $this->Form->end();
    ?>
  </div>
</div>
