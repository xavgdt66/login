<?php 
namespace App\Entity;
use \Core\Entity\Entity;

// Class de mes post via bdd 
class CategoryEntity extends Entity{

    // function qui fair les url 
    public function getUrl(){
   return 'index.php?p=posts.category&id=' . $this->id;   
}





}