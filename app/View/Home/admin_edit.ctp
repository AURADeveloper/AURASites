<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create(array(
    'enctype' => 'multipart/form-data',
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'div' => 'form-group',
        'class' => 'form-control',
        'between' => '<div class="col-sm-10">',
        'after' => '</div>',
        'label' => array(
            'class' => 'col-sm-2 control-label')))); ?>
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
                echo $this->Form->input('cover_bg', array(
                    'options' => array(
                        'none' => 'No Background',
                        'opaque' => 'Opaque',
                        'themed' => 'Themed')
                ));
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
