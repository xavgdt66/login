<?php 

namespace Core\Controller;

class Controller{

    protected $viewPath;
    protected $template;



    //Le paramètre $view est une chaîne de caractères qui représente le nom de la vue (template) à afficher.
    // Le paramètre $variables est un tableau associatif qui contient les variables à passer à la vue.


    protected function render($view, $variables = []){
// démarrer la temporisation de sortie en appelant ob_start(). Cela permet de stocker toute sortie ultérieure dans un tampon de sortie jusqu'à ce que la temporisation soit désactivée.
    ob_start();
//pour extraire les variables du tableau associatif $variables dans le tableau de symboles actuel. 
   //Cela permet d'accéder directement aux variables dans la vue en utilisant leur nom. Pour les mettre sur la pages posts/index.php
    extract($variables);
    // viewpathest le chemin du dossier 
//str_replace('.', '/', $view) est une fonction qui remplace tous les points (".") dans la chaîne $view par des barres obliques ("/"). 
//Cette étape est nécessaire pour convertir la notation de chemin de point à la notation de chemin de répertoire.
    require($this->viewPath . str_replace('.', '/', $view) . '.php');
    $content = ob_get_clean();
    require($this->viewPath . 'templates/' . $this->template . '.php');
    }
// En résumé, cette fonction est utilisée pour rendre une vue avec les variables fournies, puis l'inclure dans un template spécifié.




//////////////////////////////FUNCTION POUR LES PAGES/////////////////////////////////////////////////

// Function pour autorriser ou non l'acces à une page selon le statut  de l'user ( Par exemple si il l'admin ) 
protected function forbidden(){
    header('HTTP/1.0 403 Forbidden');
    die('Acces interdit');
}

// ereur page 404 si user est connecte ou pas connecter une 404 basique 
protected function notFound(){
    header('HTTP/1.0 404 Not Found');
    die('Page introuvable');
}
































}