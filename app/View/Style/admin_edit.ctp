<h1>Styles</h1>
<?php //echo $this->Session->flash(); ?>
<div class="row">
    <div class="col-lg-6">
        <div class="well">
            <legend>Primary Colours</legend>
            <?php
            echo $this->Form->create(array(
                'class' => 'form-horizontal',
                'inputDefaults' => array(
                    'div' => 'form-group',
                    'class' => 'form-control',
                    'between' => '<div class="col-sm-10">',
                    'after' => '</div>')));

            echo $this->Form->input('brand_primary', array('class' => 'form-control color',
                'label' => array('text' => 'Primary', 'class' => 'col-sm-2 control-label')));

            echo $this->Form->input('brand_success', array('class' => 'form-control color',
                'label' => array('text' => 'Success', 'class' => 'col-sm-2 control-label')));

            echo $this->Form->input('brand_info', array('class' => 'form-control color',
                'label' => array('text' => 'Info', 'class' => 'col-sm-2 control-label')));

            echo $this->Form->input('brand_warning', array('class' => 'form-control color',
                'label' => array('text' => 'Warning', 'class' => 'col-sm-2 control-label')));

            echo $this->Form->input('brand_danger', array('class' => 'form-control color',
                'label' => array('text' => 'Danger', 'class' => 'col-sm-2 control-label')));

            echo '<div class="form-group">';
            echo '<div class="col-sm-offset-2 col-sm-10">';
            echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-default'));
            echo '</div>';
            echo '</div>';

            echo $this->Form->end();
            ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="well">
            <legend>Images</legend>
            <?php
            echo $this->Form->create(array(
                'enctype' => 'multipart/form-data',
                'class' => 'form-horizontal',
                'inputDefaults' => array(
                    'div' => 'form-group',
                    'class' => 'form-control',
                    'between' => '<div class="col-sm-10">',
                    'after' => '</div>')));

            echo '<div class="form-group">';
            echo '<div class="col-sm-offset-2 col-sm-10">';
            $logoSrc = $this->request->data['Style']['img_logo'];
            if (empty($logoSrc)) $logoSrc = 'blank.gif';
            echo $this->Html->image($logoSrc, array('id' => 'logo-preview', 'class' => 'img-responsive'));
            echo '</div>';
            echo '</div>';

            echo $this->Form->input('img_logo', array('class' => 'form-control', 'type' => 'file',
                'label' => array('text' => 'Logo', 'class' => 'col-sm-2 control-label')));

            echo '<div class="form-group">';
            echo '<div class="col-sm-offset-2 col-sm-10">';
            echo '<div class="checkbox">';
            echo '<label>';
            echo $this->Form->input('img_logo_remove', array('type' => 'checkbox', 'div' => null, 'class' => null, 'between' => null, 'after' => null, 'label' => false));
            echo ' Remove';
            echo '</label>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<div class="col-sm-offset-2 col-sm-10">';
            $logoBangSrc = $this->request->data['Style']['img_logo_bang'];
            if (empty($logoBangSrc)) $logoBangSrc = 'blank.gif';
            echo $this->Html->image($logoBangSrc, array('id' => 'logo-bang-preview', 'class' => 'img-responsive'));
            echo '</div>';
            echo '</div>';

            echo $this->Form->input('img_logo_bang', array('class' => 'form-control', 'type' => 'file',
                'label' => array('text' => 'Logo Bang', 'class' => 'col-sm-2 control-label')));

            echo '<div class="form-group">';
            echo '<div class="col-sm-offset-2 col-sm-10">';
            echo '<div class="checkbox">';
            echo '<label>';
            echo $this->Form->input('img_logo_bang_remove', array('type' => 'checkbox', 'div' => null, 'class' => null, 'between' => null, 'after' => null, 'label' => false));
            echo ' Remove';
            echo '</label>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<div class="col-sm-offset-2 col-sm-10">';
            echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'btn btn-default'));
            echo '</div>';
            echo '</div>';

            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
<script>
    /**
     * Assigns a preview render of an input element image.
     *
     * @param input The input that provides the image source
     * @param prevElem The image element to render the preview
     */
    function readURL(input, prevElem) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(prevElem).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Preview the logo image
    $("#StyleImgLogo").change(function(){
        readURL(this, "#logo-preview");
    });

    // Preview the logo bang image
    $("#StyleImgLogoBang").change(function(){
        readURL(this, "#logo-bang-preview");
    });
</script>
