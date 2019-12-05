<?php
session_start();
require_once  'models/baseModel.class.php';
require_once 'config/database.php';
require_once 'models/address.class.php';
require_once 'models/customer.class.php';
require_once 'core/controller.class.php';
require_once 'helper/functions.php';



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
/*
                                    $_POST['submitR']="d";
                                    $_POST['fname']="d";
                                    $_POST['lname']="d";
                                    $_POST['year'] ='djs';
                                    $_POST['month'] ='djs';
                                     $_POST['day']='djs';
                                     $_POST['phone']="fa";
                                    $_POST['country']="d";
                                    $_POST['city']="d";
                                    $_POST['zip']="d";
                                    $_POST['street']="d";*/
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


