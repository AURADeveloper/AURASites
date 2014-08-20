<?php

class Home extends AppModel {

    public $hasMany = array(
        'Widget' => array (
            'className' => 'Widget',
            'foreignKey' => 'business_id'
        )
    );

    function beforeSave($options = Array()) {
        $this->handleImageUpload($this->data['Home'], 'cover_image', 'img' . DS . 'home');
    }

    function afterSave($created, $options = Array()) {
        $this->handleStyleChange();
    }

    function handleStyleChange() {
        $data = $this->findById($this->id);

        $lessStylesheet = "";
        switch($data['Home']['cover_bg']) {
            case 'none':
                $lessStylesheet .= "@cover-well-bg: transparent;\n";
                $lessStylesheet .= "@cover-well-border: none;\n";
                break;
            case 'opaque':
                $lessStylesheet .= '@cover-well-bg: @glass-color;';
                $lessStylesheet .= "\n";
                $lessStylesheet .= '@cover-well-border: 1px solid #888;';
                $lessStylesheet .= "\n";
                break;
            case 'themed':
                $lessStylesheet .= '@cover-well-bg: rgba(red(@brand-info), green(@brand-info), blue(@brand-info), 0.625);';
                $lessStylesheet .= "\n";
                $lessStylesheet .= '@cover-well-border: darken(@brand-info, 15%);';
                $lessStylesheet .= "\n";
                break;
        }

        $lessStylesheet .= sprintf('@cover-image: url(../img/%s);', $data['Home']['cover_image']);
        $lessStylesheet .= "\n";

        file_put_contents(WWW_ROOT . 'less' . DS . "client-custom-home.less", $lessStylesheet);

        $this->recompileCustomStyles();
    }

}
