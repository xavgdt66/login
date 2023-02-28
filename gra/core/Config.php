<?php 
// Apprend le singleton 
// Un singleton est une fucntion qui insatnce une class qui peut etre utiliser  que 1 seul fois 
namespace Core; 

class Config {
// Stock le construct 
    private $settings = [];

    private static $_instance;

   



// Function qui fait l'instanciation de la class config  pour la page index.php ; 
// Elle est stocker dans la private static $_instance pour ne pas l'appeler plusieur fois 
    public static function getInstance($file) {
// si je n'aucuen instance 
    if(is_null(self::$_instance)){
        // J'initailase uen nouvelle fois l'objet 
        self::$_instance = new Config($file);
        }
        // et ça me return l'instance de la class config 
    return self::$_instance;
    }



    // Se constructeur lis le fichier Config.php et il crée un tableua contenant la configuration 
    public function __construct($file){
        // uniqied() permet de genrer une clé unique pour ne pas dupliquer la bdd avec uen clé diffrtente 
    
  // La variable  stock la page Config.php qui est dans le dossier config qui ets la connection à la bdd 
      $this->settings  =  require($file);

    }

// function qui récupére la cle que on s'ouhaite récuperer 
    public function get($key){

        if(!isset($this->settings[$key])){
            return null ;
        }

        return $this->settings[$key];
    }


}

