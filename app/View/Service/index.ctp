<div class="container">
    <div class="page-header">
        <h1>Services</h1>
    </div>
</div>
<div class="container">
    <?php foreach($this->data as $data): ?>
    <div class="panel panel-primary service">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $data['Service']['heading']; ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <?php echo $this->Html->image($data['Service']['image'], array('class' => 'img-responsive center-block')); ?>
                    <button type="button" class="btn btn-lg btn-primary btn-block"><?php echo $data['Service']['button']; ?></button>
                </div>
                <div class="col-sm-6 col-md-8">
                    <?php echo $data['Service']['description']; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
