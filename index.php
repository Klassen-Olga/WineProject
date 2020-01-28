<?php
ini_set('session.cookie_lifetime', 0);
session_start();
require_once 'config/imports.php';

//codepen


class User{
    private $id=null;
    public function __construct($id){
        $this->id=$id;

        $str= get_class($this);
        }
};
class SubUser extends User{};

$userA=new \User(1);
$userB=new \SubUser(2);




$controllerName=$_GET['c'] ?? 'pages';
$actionName=$_GET['a'] ?? 'start';

$src=__FILE__;
$src1=__DIR__;
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


