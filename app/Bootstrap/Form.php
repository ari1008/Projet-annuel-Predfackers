<?php

namespace App\Bootstrap;

class Form{
    public $email;
    public $password;


    public static function email($name,$description, $id){
        $contentForm = '<div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">'.$name .'</label>
                            <input type="email" class="form-control" id="email" name="'.$id.'" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">'.$description.'</div>
                        </div>';
        echo $contentForm;
        //return $contentForm;
    }

    public static function password($name,$description,$id){
        $contentForm = '<div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">'.$name .'</label>
                            <input type="password" class="form-control" id="' . $id . '" name="'.$id.'" aria-describedby="emailHelp">
                            <div id="passwordHelp" class="form-text">'.$description .'</div>
                        </div>';
        echo $contentForm;

    }

    public static  function button($name){
        $contentForm = '  <button type="submit" class="btn btn-primary">' . $name . '</button>';
        echo $contentForm;
    }

    public static function texte($name,$description,$id){
        $contentForm = '<div class="row gy-3 align-items-center">
                            <div class="col-auto">
                                <label for="texte" class="col-form-label">' . $name .'</label>
                            </div>
                            <div class="col-auto">
                                <input type="texte" id="' . $id .'"  name="'.$id.'" class="form-control" aria-describedby="texteHelpInline" placeholder="' . $name . '">
                            </div>
                            <div class="col-auto">
                                <span id="texteHelpInline" class="form-text">
                                    ' . $description . '
                                </span>
                                
                            </div>
                        </div>';
        echo $contentForm;
    }

    public static function texteAera($name,$description,$id){
        $contentForm = '<div class="row gy-3 align-items-center">
                            <div class="col-auto">
                                <label for="texte" class="col-form-label">' . $name .'</label>
                            </div>
               <label for="exampleFormControlTextarea1" class="form-label">'.$description.'</label>
               <textarea class="form-control" id="'.$id .'" name="'.$id.'" rows="3" placeholder="' . $name . '"></textarea>
               </div>';
        return $contentForm;
    }

    public static function inputFile($name,$description,$id){
        $contentForm = '<div class="row gy-3 align-items-center">
                            <div class="col-auto">
                                <label for="texte" class="col-form-label">' . $name .'</label>
                            </div>
                            <div class="mb-3">
                            <label for="formFile" class="form-label">'.$description.'</label>
                            <input class="form-control" type="file" id="'.$id.'" name="'.$id.'">
                        </div>';
        return $contentForm;
    }

    public static function number($name,$description,$id, $value){
        $contentForm = '<div class="form-group row">
                             <label for="texte" class="col-form-label">' . $name .'</label>
                            <label for="example-number-input" class="col-2 col-form-label">' . $description .'</label>
                            <div class="col-10">
                                <input class="form-control" type="number" value="'.$value.'" id="'. $id.'"  name="'.$id.'">
                            </div>
                        </div>';
        return $contentForm;
    }
}