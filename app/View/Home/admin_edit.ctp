<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create($bootstrap_form_options); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="">
            <legend>Basic Info</legend>
            <div class="control-group">
                <?php
                echo $this->Form->hidden('id');

                echo '<div class="form-group">';
                echo '<div class="col-sm-offset-2 col-sm-10">';
                $coverImgSrc = $this->request->data['Home']['cover_image'];
                if (empty($coverImgSrc)) $coverImgSrc = 'blank.gif';
                echo $this->Html->image($coverImgSrc, array('id' => 'cover-image', 'class' => 'img-responsive'));
                echo '</div>';
                echo '</div>';
                echo $this->Form->input('cover_image', array('type' => 'file'));
                echo $this->Form->input('cover', array('type' => 'textarea'));
                echo $this->Form->input('cover_bg', array('options' => $well_bg_options));
                echo $this->Form->input('slogan', array('type' => 'textarea'));
                echo '<div class="form-group">';
                echo '<div class="col-sm-offset-2 col-sm-10">';
                echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-default'));
                echo '</div>';
                echo '</div>'; ?>
            </div>
            <script>
                $("#HomeCoverImage").change(function(){
                    previewImage(this, "#cover-image");
                });
            </script>
        </div>
    </div>
</div>
<?php $this->Form->end(); ?>
