<?php echo $this->Session->flash(); ?>
<div class="row">
    <div class="col-xs-12">
        <?php
        if(count($this->data) == 0) echo '<legend>New Service</legend>';
        if(count($this->data) == 1) echo '<legend>Service #' . $this->data['Service']['id'] . '</legend>';

        echo $this->Form->create($bootstrap_form_options);

        if(count($this->data) == 1) {
            echo $this->Form->hidden('id');
            echo $this->Form->hidden('business_id');
        }

        echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';
        $imageSrc = (count($this->data) == 1) ? $this->request->data['Service']['image'] : null;
        if (empty($imageSrc)) $imageSrc = 'blank.gif';
        echo $this->Html->image($imageSrc, array('id' => 'ServiceImagePreview', 'class' => 'img-responsive'));
        echo '</div>';
        echo '</div>';

        echo $this->Form->input('image', array('type' => 'file'));
        echo $this->Form->input('heading');
        echo $this->Form->input('description', array('type' => 'textarea'));
        echo $this->Form->input('button');

        echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';
        echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-default'));
        echo '</div>';
        echo '</div>';

        echo $this->Form->end();
        ?>
    </div>
</div>
<script>
    $("#ServiceImage").change(function(){
        previewImage(this, "#ServiceImagePreview");
    });
</script>
