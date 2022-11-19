<?php
//si controller pas objet
//  header('Location: controller/controller.php');

//si controller objet

//chargement config
require_once(__DIR__.'/config/config.php');

//autolarder du cours
//chargement autoloader pour autochargement des classes
//require_once(__DIR__.'/config/Autoload.php');
//Autoload::charger();


//autoloader conforme norme PSR-0
require_once(__DIR__.'/config/SplClassLoader.php');
$myLibLoader = new SplClassLoader('Controller', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('config', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Modele', './');
$myLibLoader->register();


$cont = new \Controller\Controleur();


?> 