<?php
namespace APP\Models;
class Verification{

    public static function file($file, $uploadfile){
        if (isset($file['photo']) AND $file['photo']['error'] == 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($file['photo']['size'] <= 1000000)
            {

                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($file['photo']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) {

                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($file['photo']['tmp_name'], $uploadfile);
                    chmod($uploadfile, 0777);
                    return 1;
                }
            }
        }
        return 0;
    }

    public static function texte($texte, $length){
        if(is_string($texte)){
            if($length>=strlen($texte)){
                return 1;
            }else{
                return 0;
            }
        }
        return 0;
    }

    public static function number($int, $length){
        if(ctype_digit($int)){
            if($length>=strlen($int)){
                return 1;
            }else{
                return 0;
            }
        }
        return 0;
    }

    public static function filePhotoMulti($file, $uploadfile, $namePhoto){
        if (isset($file[$namePhoto]) AND $file[$namePhoto]['error'] == 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($file[$namePhoto]['size'] <= 1000000)
            {

                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($file[$namePhoto]['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) {

                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($file[$namePhoto]['tmp_name'], $uploadfile);
                    chmod($uploadfile, 0777);
                    return 1;
                }
            }
        }
        return 0;
    }

    function moveFile($dossierSource , $dossierDestination){

        $retour = 1;
        if(!file_exists($dossierSource)) {
            $retour = -1;
        } else {
            if(!copy($dossierSource, $dossierDestination)) {
                $retour = -2;
            } else {
                if(!unlink($dossierSource)) {
                    $retour = -3;
                }
            }
        }
        return($retour);
    }

}