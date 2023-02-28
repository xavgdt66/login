<?php 

class CarFactory{

    // Function qui return uen instance de car 
    // Sa permet de retourner une nouvelle instance  c'est l'inverse du singleton 
    // C'est pour sa que ont l'appelle factory = usine = en chaine 

    // on peut  aussi mettre un parametre 
    

public static function  getCar($type){

$type = ucfirst($type);

$class_name = "Car$type"; // 

    return new $class_name();
}

}
