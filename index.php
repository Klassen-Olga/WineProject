<?php
ini_set('session.cookie_lifetime', 0);
session_start();
require_once 'config/imports.php';
//codepen
//cookie speichern?
//null beim nicht eingegebenen phone=> null speichern
//timpestamp ubdated at
//$str=dateOfBirthFilter('2000February03');
/*$str=dateOfBirthFilter('2000February03');
$_POST['submitR']="d";
$_POST['fname']="dh";
$_POST['lname']="df";
$_POST['year'] ='2001';
$_POST['month'] ='February';
$_POST['day']='19';
$_POST['country']="dhhh";
$_POST['city']="dd";
$_POST['zip']="dd";
$_POST['street']="dd";
$_POST['email']="ddejejddjhjjjnwj";
$_POST['password1']="ufn5j88globus";
$_POST['password2']="ufn5j88globus";
$_POST['genderRadio']="m";*/
$controllerName=$_GET['c'] ?? 'pages';
$actionName=$_GET['a'] ?? 'start';

$controllerPath=__DIR__ . '/controller/' . $controllerName. "Controller" . '.class.php';
/*
$_GET['i']='1';

$product=\skwd\models\Product::find("id= 1");
*/
if (file_exists($controllerPath)){
    include_once $controllerPath;
    $className='\\skwd\\controller\\'.ucfirst( $controllerName).'Controller';

    if (class_exists($className)){
        $controllerInstance= new $className($controllerName, $actionName);
        $controllerMethod='action'.ucfirst($actionName);
        if (method_exists($controllerInstance, $controllerMethod)){
            $controllerInstance->{$controllerMethod}();
            $controllerInstance->renderHTML();
        }
    else{
            header('Location: index.php?c=pages&a=error');
        }
    }
    else{
        header('Location: index.php?c=pages&a=error');
    }
}
else{
    header('Location: index.php?c=pages&a=error');
}


