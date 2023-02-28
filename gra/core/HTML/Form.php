<?php 


namespace Core\HTML;


// Class qui permettra de générer des formulaires 

class Form{

  /**
   * @var array Données utilisié par le formulaire 
   */

  private $data;

  /**
   * @var string TAG Données utilisié pour entourer les champs 
   */
  public $surround = 'p';

  /**
   * 
   * @param array $data Données utilisié par le formulaire 
   */

  public function __construct($data = array()){
  
    $this->data = $data ;
  }

  /**
   * @param $html  string CODE HTML ENTOURER 
   * @return string 
   */

  protected function  surround($html){
     return "<{$this->surround}>{$html}</{$this->surround}>";
  }

  /**
   * @param $index string Index de la valeur à récupere 
   * @return string 
   */

  protected function getValue($index){
    if(is_object($this->data)){
  return $this->data->$index;
    }
      return isset($this->data[$index]) ? $this->data[$index] : null ;
    
    
  }
  
  /**
   * @param $name string 
   * @param $lable 
   * @param array $option
   * @return string 
   */

  public function input($name, $lable, $options = []){
    // A la palce de la function password
    $type = isset($option['type']) ? $option['type'] : 'text';
    return $this->surround(
        '<input   type="' . $type . '" name="'  . $name . '" value="' . $this->getValue($name) . '">'
    );
  }


/*
  public function password($name){
    return $this->surround(
        '<input   type="password" name="'  . $name . '" value="' . $this->getValue($name) . '">'
    );
  }
*/
  public function submit(){
    return $this->surround('<button type="submit">Envoyer</button>');
  }

 

}