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
<div class="row">
<?php for($i = 0; $i < count($this->request->data['Widget']); $i++) : ?>

    <div class="col-lg-12">
        <div class="">
            <legend>Portal Widget #<?php echo $i + 1;?></legend>
            <?php echo '<div class="form-group">';
            echo '<div class="col-sm-offset-2 col-sm-10">';
            $portalImgSrc = $this->request->data['Widget'][$i]['image'];
            if (empty($portalImgSrc)) $portalImgSrc = 'blank.gif';
            echo $this->Html->image($portalImgSrc, array('id' => 'portal-img-' . $i, 'class' => 'img-responsive'));
            echo '</div>';
            echo '</div>';

            echo $this->Form->hidden('Widget.' . $i . '.business_id');
            echo $this->Form->hidden('Widget.' . $i . '.id');
            echo $this->Form->input('Widget.' . $i . '.image', array('type' => 'file'));

            echo '<div class="form-group">';
            echo '<div class="col-sm-offset-2 col-sm-10">';
            echo '<div class="checkbox">';
            echo '<label>';
            echo $this->Form->input('Widget.' . $i . '.image_remove', array('type' => 'checkbox', 'div' => null, 'class' => null, 'between' => null, 'after' => null, 'label' => false));
            echo ' Remove Image';
            echo '</label>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo $this->Form->input('Widget.' . $i . '.caption');
            echo $this->Form->input('Widget.' . $i . '.text', array('type' => 'textarea'));
            echo $this->Form->input('Widget.' . $i . '.button');
            echo $this->Form->input('Widget.' . $i . '.link', array(
                'options' => array(
                    'about' => 'About',
                    'contact' => 'Contact',
                    'location' => 'Location',
                    'samples' => 'Samples',
                    'services' => 'Services')
            ));

            echo '<div class="form-group">';
            echo '<div class="col-sm-offset-2 col-sm-10">';
            echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-default'));
            echo '</div>';
            echo '</div>'; ?>
        </div>
        <script>
            $("#Widget<?php echo $i; ?>Image").change(function(){
                previewImage(this, "#portal-img-<?php echo $i; ?>");
            });
        </script>

<!--    <div class="col-lg-6 hidden-md hidden-sm hidden-xs">-->
<!--        <div class="well">-->
<!--            <legend>Preview</legend>-->
<!--        </div>-->
<!--    </div>-->
</div>
<?php endfor; ?>
</div>
<?php $this->Form->end(); ?>
<script>
//    CKEDITOR.replace( 'HomeSlogan' );
//    CKEDITOR.replace( 'HomeCover' );
//tinymce.init({
//    selector: "#HomeCover",
//    menubar : false,
//    plugins: "code",
//    toolbar: [
//        "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code"
//    ]
//});
</script>
