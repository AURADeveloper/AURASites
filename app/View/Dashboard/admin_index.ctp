<h1 class="page-header">
  Dashboard
</h1>
<!--<h2>Your Business</h2>-->
<div class="row">
  <div class="col-sm-12 col-lg-4 dashboard-overview">
    <?php echo $this->Html->image($this->data['Style']['img_logo'], array('class' => 'img-responsive')); ?>
    <dl class="dl-horizontal">
      <dt>Trading Name</dt>
      <dd><?php echo $this->data['Business']['trading_name']; ?></dd>
      <dt>ABN</dt>
      <dd><?php echo $this->data['Business']['abn']; ?></dd>
      <dt>Street</dt>
      <dd><?php echo $this->data['Business']['address_street1']; ?></dd>
      <dt>Suburb</dt>
      <dd><?php echo $this->data['Business']['address_suburb']; ?></dd>
      <dt>State</dt>
      <dd><?php echo $this->data['Business']['address_state']; ?></dd>
      <dt>Postcode</dt>
      <dd><?php echo $this->data['Business']['address_postcode']; ?></dd>
      <dt>Phone</dt>
      <dd><?php echo $this->data['Business']['phone']; ?></dd>
      <dt>Fax</dt>
      <dd><?php echo $this->data['Business']['fax']; ?></dd>
    </dl>
  </div>
  <div class="col-sm-12 col-lg-8">
    <h2>
      Google Analytics
    </h2>
    <p class="help-block">Install Analytics here</p>
  </div>
</div>
