<?php 
namespace Core\Auth;

use Core\Database\Database;
class DBAuth{

    private $db;

     public function __construct(Database $db){
      $this->db= $db;
     }
     
  public function getUserid(){
    // si le users est connecter 
    if($this->logged()){
        // et retournea l'id de utilisateur 
        return $_SESSION['auth'];
    }

    return false;
  }

    /**
     * @param $username 
     * @param $password 
     * @return boolean
     */


     public function login($username, $password){
    // Se connecte à la bdd pour la table users
        //Le troisième argument de prepare() est null, ce qui signifie que la requête ne prend pas de paramètres de liaison
        // (paramètres qui permettent d'éviter les attaques par injection SQL en encadrant les valeurs avec des guillemets simples).
    // Le quatrième argument est true, ce qui indique que la méthode prepare() doit renvoyer une seule ligne de résultat. 
    //Cela est probablement dû au fait que l'on s'attend à ce que chaque nom d'utilisateur soit unique dans la table des utilisateurs.
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
        if($user){
            if ($user->password == ($password));
            $_SESSION['auth'] = $user->id;
            return true;
        } else {
            return false;
        }
        //var_dump(sha1('demo'));
        //var_dump($user);
    }
     

    
// verifie si le users est connecter sur les pages 
     public function logged(){
        return isset($_SESSION['auth']);

     }

    
      
}