<h1>About</h1>
<?php echo $this->Session->flash(); ?>
<div class="row">
    <div class="col-xs-12">
        <?php
        echo '<legend>About</legend>';

        echo $this->Form->create($bootstrap_form_options);
        echo $this->Form->hidden('id');

        echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';
        $imageSrc = $this->request->data['About']['image'];
        if (empty($imageSrc)) $imageSrc = 'blank.gif';
        echo $this->Html->image($imageSrc, array('id' => 'AboutImagePreview', 'class' => 'img-responsive'));
        echo '</div>';
        echo '</div>';

        echo $this->Form->input('image', array('type' => 'file'));
        echo $this->Form->input('text', array('type' => 'textarea'));

        echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';
        echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-default'));
        echo '</div>';
        echo '</div>';

        echo $this->Form->end();
        ?>
    </div>
</div>
