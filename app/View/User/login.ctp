<div class="row">
  <div class="col-sm-offset-4 col-sm-4">
    <div class="well" style="margin-top: 120px">
      <div class="text-center">
        <?php echo $this->Html->image('logo.png', array('class' => '')); ?>
      </div>
      <div class="text-center">
        Please sign in with your Google account.
      </div>
      <div class="text-center">
        <?php echo $this->Html->link(
            $this->Html->image('sign-in-with-google.png', array('class' => 'img-responsive')),
            $authUrl,
            array('escape' => false)); ?>
      </div>
    </div>
  </div>
</div>
