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
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < count($this->data); $i++): ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>"<?php if($i == 0) echo ' class="active"'?>></li>
            <?php endfor; ?>
        </ol>

        <!-- Wrapper for slides -->
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

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
