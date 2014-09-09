<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Samples</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div id="sample-gallery" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < count($this->data); $i++): ?>
            <li data-target="#sample-gallery" data-slide-to="<?php echo $i; ?>"<?php if($i == 0) echo ' class="active"'?>></li>
            <?php endfor; ?>
        </ol>

        <div class="carousel-inner">
            <?php for ($i = 0; $i < count($this->data); $i++): ?>
            <div class="item<?php if ($i == 0) echo ' active'; ?>">
                <?php echo $this->Html->image($this->data[$i]['Sample']['image']); ?>
                <div class="carousel-caption">
                    <h3><?php echo $this->data[$i]['Sample']['title']; ?></h3>
                    <p><?php echo $this->data[$i]['Sample']['caption']; ?></p>
                </div>
            </div>
            <?php endfor; ?>
        </div>

        <a class="left carousel-control" href="#sample-gallery" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#sample-gallery" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
