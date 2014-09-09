<div class="container">
    <div class="page-header">
        <h1>About Us</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?php echo $this->data['About']['text']; ?>
        </div>

        <hr class="featurette-divider hidden-lg">

        <div class="col-lg-6">
            <?php echo $this->Html->image($this->data['About']['image'], array('class' => 'img-responsive center-block')); ?>
        </div>
    </div>
</div>
