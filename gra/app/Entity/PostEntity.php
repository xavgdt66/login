<?php 
namespace App\Entity;
use Core\Entity\Entity;

// Class de mes post via bdd 
class PostEntity extends Entity{

    // function qui fair les url 
    public function getUrl(){
   return 'index.php?p=posts.show&id=' . $this->id;   
}

public function getExtrait(){
    $html = '<p>' . substr($this->contenu, 0, 100) . '...</p>';
    $html .= '<p><a href="' .$this->getUrl() . '">Voir la suite </a></p>';
    return $html;
 }
 



}