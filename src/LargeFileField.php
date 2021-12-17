<?php
namespace Encore\LargeFileUpload;

use Encore\Admin\Form\Field;

class LargeFileField extends Field
{

    protected $group = 'file';
    public $view = 'large-file-field::large_file_upload';

    public function group($group)
    {
        $this->group = $group;
        return $this;
    }
    
    public function render()
    {
        $(".controls input[type='file']").bind('change',function(){
            let name = $(this).attr('id')
            name = name.slice(0, -9)
            console.log(name)
            name = name.replaceAll('[','\\\[')
            name = name.replaceAll(']','\\\]')
            $('#'+name+'-resource').bootstrapFileInput();
            console.log(name)
            aetherupload(name, this).setGroup('{$this->group}').setSavedPathField('#'+name+'-savedpath').setPreprocessRoute('/aetherupload/preprocess').setUploadingRoute('/aetherupload/uploading').setLaxMode(false).success().upload(name)
        });

SRC;
        return parent::render();
    }
}
