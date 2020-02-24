<?php
ini_set('session.cookie_lifetime', 0);
session_start();
require_once 'config/imports.php';
/*
$controllerName=$_GET['c'] ?? 'products';
$actionName=$_GET['a'] ?? 'allProducts';*/
/*$_GET['page']=1;
$_GET['minPrice']=0.1;
$_GET['maxPrice']=10;
$_GET['region']="Germany";*/
/*$_GET['year']=2019;*/
/*$controllerName=$_GET['c'] ?? 'products';
$actionName=$_GET['a'] ?? 'theProduct';
/*$_GET['page']=1;*/
/*$_GET['i']='.sdfc.sakejv';*/
$controllerName=$_GET['c'] ?? 'pages';
$actionName=$_GET['a'] ?? 'start';




$controllerPath=__DIR__ . '/controller/' . $controllerName. "Controller" . '.class.php';
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


