<h1>Samples</h1>
<?php echo $this->Session->flash(); ?>
<div class="row">
    <div class="col-xs-12">
        <?php
        if(count($this->data) == 0) echo '<legend>New Sample</legend>';
        if(count($this->data) == 1) echo '<legend>Sample #' . $this->data['Sample']['id'] . '</legend>';

        echo $this->Form->create($bootstrap_form_options);
        echo $this->Form->hidden('id');
        echo $this->Form->hidden('business_id');

        echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';
        $imageSrc = $this->request->data['Sample']['image'];
        if (empty($imageSrc)) $imageSrc = 'blank.gif';
        echo $this->Html->image($imageSrc, array('id' => 'SampleImagePreview', 'class' => 'img-responsive'));
        echo '</div>';
        echo '</div>';

        echo $this->Form->input('image', array('type' => 'file'));
        echo $this->Form->input('title');
        echo $this->Form->input('caption', array('type' => 'textarea'));

        echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';
        echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-default'));
        echo '</div>';
        echo '</div>';

        echo $this->Form->end();
        ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="pull-right">

        </div>
    </div>
</div>

<script>
    $("#SampleImage").change(function(){
        previewImage(this, "#SampleImagePreview");
    });
</script>
