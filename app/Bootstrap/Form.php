<?php

namespace App\Bootstrap;

class Form{
    public $email;
    public $password;


    public static function email($name,$description, $id){
        $contentForm = '<div class="row gy-3 align-items-center">
                            <div class="col-auto">
                                <label for="inputPassword6" class="col-form-label">' . $name .'</label>
                            </div>
                            <div class="col-auto">
                                <input type="email" id="' . $id .'" class="form-control" aria-describedby="passwordHelpInline" placeholder="' . $name . '">
                            </div>
                            <div class="col-auto">
                                <span id="passwordHelpInline" class="form-text">
                                    ' . $description . '
                                </span>
                                
                            </div>
                        </div>';
        echo $contentForm;
        //return $contentForm;
    }

    public static function password($name,$description,$id){
        $contentForm = '<div class="row gy-3 align-items-center">
                            <div class="col-auto">
                                <label for="inputPassword6" class="col-form-label">' . $name .'</label>
                            </div>
                            <div class="col-auto">
                                <input type="password" id="' . $id .'" class="form-control" aria-describedby="passwordHelpInline" placeholder="' . $name . '">
                            </div>
                            <div class="col-auto">
                                <span id="passwordHelpInline" class="form-text">
                                    ' . $description . '
                                </span>
                                
                            </div>
                        </div>';
        echo $contentForm;

    }

    public static  function button($name){
        $contentForm = '<button type="submit" class="btn btn-primary">' . $name . '</button>';
        echo $contentForm;
    }

    public static function texte($name,$description,$id){
        $contentForm = '<div class="row gy-3 align-items-center">
                            <div class="col-auto">
                                <label for="texte" class="col-form-label">' . $name .'</label>
                            </div>
                            <div class="col-auto">
                                <input type="texte" id="' . $id .'" class="form-control" aria-describedby="texteHelpInline" placeholder="' . $name . '">
                            </div>
                            <div class="col-auto">
                                <span id="texteHelpInline" class="form-text">
                                    ' . $description . '
                                </span>
                                
                            </div>
                        </div>';
        echo $contentForm;
    }
}