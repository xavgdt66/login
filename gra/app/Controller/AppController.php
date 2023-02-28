<?php 

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class AppController extends Controller{

    protected $template = 'default';

   public function __construct(){
       $this->viewPath = ROOT . '/app/Views/';
   } 
// Function qui charge  les tables poue etre utiliser dans le PostController.php 
  protected function loadModel($model_name){
           $this->$model_name =  App::getInstance()->getTable($model_name);
  }
  
  


}