<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create($bootstrap_form_options); ?>
<div class="row">
    <div class="col-lg-12">
        <legend>Portal Widget #<?php echo $this->request->data['Widget']['id']; ?></legend>
        <?php echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';
        $portalImgSrc = $this->request->data['Widget']['image'];
        if (empty($portalImgSrc)) $portalImgSrc = 'blank.gif';
        echo $this->Html->image($portalImgSrc, array('id' => 'portal-image', 'class' => 'img-responsive'));
        echo '</div>';
        echo '</div>';

        echo $this->Form->hidden('Widget.business_id');
        echo $this->Form->hidden('Widget.id');
        echo $this->Form->input('Widget.image', array('type' => 'file'));

        echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';
        echo '<div class="checkbox">';
        echo '<label>';
        echo $this->Form->input('Widget.image_remove', array('type' => 'checkbox', 'div' => null, 'class' => null, 'between' => null, 'after' => null, 'label' => false));
        echo ' Remove Image';
        echo '</label>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo $this->Form->input('Widget.caption');
        echo $this->Form->input('Widget.text', array('type' => 'textarea'));
        echo $this->Form->input('Widget.button');
        echo $this->Form->input('Widget.link', array(
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
</div>
<?php $this->Form->end(); ?>
<script>
    $("#WidgetImage").change(function(){
        previewImage(this, "#portal-image");
    });
</script>
