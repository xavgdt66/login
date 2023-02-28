<?php 

use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'home';
}

// Auth
$app = App::getInstance();
$auth = new DBAuth($app->getDB());
if(!$auth->logged()){
    $app->forbidden();
}

ob_start();
if($page === 'home'){
    require ROOT . '/pages/admin/posts/index.php';
} elseif ($page === 'posts.edit'){
    require ROOT . '/pages/admin/posts/edit.php';
} elseif ($page === 'posts.add'){
    require ROOT . '/pages/admin/posts/add.php';
}elseif ($page === 'posts.delete'){
    require ROOT . '/pages/admin/posts/delete.php';
}elseif($page === 'categories.index'){
    require ROOT . '/pages/admin/categories/index.php';
} elseif ($page === 'categories.edit'){
    require ROOT . '/pages/admin/categories/edit.php';
} elseif ($page === 'categories.add'){
    require ROOT . '/pages/admin/categories/add.php';
}elseif ($page === 'categories.delete'){
    require ROOT . '/pages/admin/categories/delete.php';
}
$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';









































/*
use Core\Auth\DBAuth;
//----------------- refactoring  ---------------------------

// Mtn le mots ROOT se la dossier 'app/App.php' 
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
// Utilise la function load qui est dans core/autoloader dans la class App
App::load();


if(isset($_GET['p'])){
    $page = $_GET['p'];
}else {
    $page = 'home';
}

//////////////////////// AUTH verifie si le uses est connecter 
// class app->gestInstance ( Pour instancer la function et la manipuler)
$app = App::getInstance();

// On instance la page dbAuth suivie de $app->getDB pour connecter la bdd 
$auth = new DBAuth($app->getDB());
// si auth est differnt de logged
if(!$auth->logged()){
    // ont lui mets la function forbiden qui est "acces interdit "
    $app->forbidden();
}










/*

ob_start();
if($page === 'home' ){
    require ROOT . '/pages/admin/posts/index.php';
} elseif ($page === 'posts.edit') {
    require ROOT . '/pages/admin/posts/edit.php';
} elseif ($page === 'posts.add') {
    require ROOT . '/pages/admin/posts/add.php';
}elseif ($page === 'posts.delete') {
    require ROOT . '/pages/admin/posts/delete.php';
}
/// Pour les categories 
else if($page === 'categories.index' ){
    require ROOT . '/pages/admin/categories/index.php';
} elseif ($page === 'categories.edit') {
    require ROOT . '/pages/admin/categories/edit.php';
} elseif ($page === 'categories.add') {
    require ROOT . '/pages/admin/categories/add.php';
}elseif ($page === 'categories.delete') {
    require ROOT . '/pages/admin/categories/delete.php';
}


$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';*/