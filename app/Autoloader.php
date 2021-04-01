<?php
namespace APP;
/**
 * Class Autoloader
 */
class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class_name string Le nom de la classe à charger
     */
    static function autoload($class){
        #var_dump($class);
        #var_dump(__NAMESPACE__);
        if(strpos($class,__NAMESPACE__ .'\\')===0) {
            $class = str_replace(__NAMESPACE__, '', $class);
            $class = str_replace('\\', '/', $class);
            require_once ROOT_FOLDER.'/app/' . $class . '.php';
        }
    }

}