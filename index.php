<?php
session_start();
require_once 'config/database.php';
require_once 'models/address.class.php';
require_once 'models/customer.class.php';
require_once 'core/controller.class.php';



if (isset($_POST['submitR'])) {
    $country = $_POST['country'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $street = $_POST['street'];
    $address = new Address(1, $country, $city, $zip, $street);
    $address->insert();
    $customer = new Customer(1, $_POST['fname'], $_POST['lname'], $_POST['year'] . $_POST['month'] . $_POST['day'], $_POST['phone']);
    $customer->insert();
}

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


