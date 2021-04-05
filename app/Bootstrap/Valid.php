<?php

namespace app\Bootstrap;
use App\Bootstrap\Form;

class Valid extends Form {

    public static function  texteValidate($name, $description, $id){
        $contentForm = '<div class="col-md-4">
                    <label for="validationCustom01" class="form-label">'.$description.'</label>
                    <input type="text" class="form-control" id="validationCustom01"  name="'.$id.'"value="'.$name. '" required>
                    </div>';
        return $contentForm;
    }



}