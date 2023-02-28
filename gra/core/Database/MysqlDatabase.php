<?php 

namespace Core\Database;

use \PDO;

class MysqlDatabase extends Database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '' ,$db_host = 'localhost'){

        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

// function private qui connecte la bdd 
    public function getPdo(){
   if($this->pdo === null) {

        // connecte la bdd de blog 
        $pdo = new \PDO('mysql:dbname=blog;host=localhost', 'root', ''); 
        // pour faire apparaite les msg d'erreur de la bdd 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->pdo = $pdo;
        var_dump('PDO initialise');

   }
       var_dump('getPDO called');
       return $this->pdo;

    }

/////////////////////////////////////////////////////////////////////////////////////////
public function query($statement, $class_name = null, $one = false){
    $req = $this->getPDO()->query($statement);
    if(
        strpos($statement, 'UPDATE') === 0 ||
        strpos($statement, 'INSERT') === 0 ||
        strpos($statement, 'DELETE') === 0
    ) {
        return $req;
    }
    if($class_name === null){
        $req->setFetchMode(PDO::FETCH_OBJ);
    } else {
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
    }
    if($one) {
        $datas = $req->fetch();
    } else {
        $datas = $req->fetchAll();
    }
    return $datas;
}



    
/////////////////////////////////////////////////////////////////////////////////////////

    public function prepare($statement,$attributes, $class_name = null, $one = false){
        $req = $this->getPdo()->prepare($statement);
        $res = $req->execute($attributes);
       if(
              strpos($statement, 'UPDATE') === 0 ||
              strpos($statement, 'INSERT') === 0 ||
              strpos($statement, 'DELETE') === 0 
       ){

        return $res;

       }

       if($class_name === null){
           $req->setFetchMode(PDO::FETCH_OBJ);
       }else {
           // Étape 2: configure le mode de récupération des résultats en utilisant le nom de la classe spécifié dans $class_name
           $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
       }
        if($one){
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
       
      
      
    }


// return l'id du dernier  enregistrement 
    public function lastInsertid(){
        return $this->getPdo()->lastInsertid();
    }
}