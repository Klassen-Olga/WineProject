<?php
session_start();
require_once  'models/baseModel.class.php';
require_once 'config/database.php';
require_once 'models/address.class.php';
require_once 'models/customer.class.php';
require_once 'models/account.class.php';
require_once 'core/controller.class.php';
require_once 'helper/functions.php';


//$str=dateOfBirthFilter('2000February03');
/*$str=dateOfBirthFilter('2000February03');
$_POST['submitR']="dd";
$_POST['fname']="df";
$_POST['lname']="df";
$_POST['year'] ='2001';
$_POST['month'] ='February';
$_POST['day']='19';
$_POST['phone']="fahh";
$_POST['country']="dhhh";
$_POST['city']="dd";
$_POST['zip']="dd";
$_POST['street']="dd";
$_POST['email']="ddjjjjjwj";
$_POST['password1']="dd1hhhhh";
$_POST['password2']="dd1hhhhh";*/

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


