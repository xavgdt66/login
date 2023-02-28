<?php 

use Core\Config;

use Core\Database\MysqlDatabase;

class App{

public $title = 'Mon super site';
private static $_instance;
private  $db_instance; // j'ai enlever le static 

public static function getInstance(){
    if(is_null(self::$_instance)){
        self::$_instance = new App();
    }

    return self::$_instance;
}

////////////////////FUNCTION LOAD /////////////////////////////////////////////////////////////

public static function load(){
      session_start();
      // Va require le fichier autoloader 
      require ROOT . '/app/Autoloader.php';
      //EN suite elle va le charger 
      App\Autoloader::register();
        // Va require le fichier autoloader qui est dans le core 
        require ROOT . '/core/Autoloader.php';
        //EN suite elle va le charger 
        Core\Autoloader::register();
}




//////////////////////////////////////////////////////////////////////////////////////
public static function getTable($name){
    $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
    $app = new static();
   
    return new $class_name($app->getDB());
  }
//////////////////////////////////////////////////////////////////////////////////////
public function getDB(){

    $config = Config::getInstance(ROOT . '/config/config.php');

   if(is_null($this->db_instance)){
$this->db_instance =  new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
   }

    return $this->db_instance;

}





/*

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// variable qui permet de sauvegarder  la connecsion a la bdd 
    private static $database;




// Getter qui recupere la connection a la bdd 
    public static function getDB(){
     if( self::$database === null){
         self::$database =  new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
     }
        
        return self::$database;
    }

    public static function notFound() {
        
   header('HTTP/1.0 404 Not Found');
   header('Location:index.php?p=404');
   }


  public static function getTitle(){

      return self::$title;

  }

  public static function setTitle($title){

    self::$title = $title;
    
}*/







}