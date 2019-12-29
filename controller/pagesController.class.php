<?php

namespace skwd\controller;

class PagesController extends \skwd\core\Controller
{

    public function actionTheProduct()
    {

    }

    public function actionCheckout()
    {
        $this->_params['error']=[];

        $this->_params['checkoutSite1']=true;

        if(isset($_SESSION['id'])){

            $this->_params['account']= \skwd\models\Account::find('id= '.'\''. $_SESSION['id']. '\'');
        }
        else if(isset($_COOKIE['id'])){
            $this->_params['account']= \skwd\models\Account::find('id= '.'\''. $_COOKIE['id']. '\'');
        }

        $this->_params['customer']= \skwd\models\Customer::find('id= '.'\''. $this->_params['account'][0]['customerID']. '\'');
        $date = $this->_params['customer'][0]['dateOfBirth'];
        $this->_params['dateOfBirthInRightOrder']= dateOfBirthInRightOrder($date);
        $this->_params['address']= \skwd\models\Address::find('id= '.'\''. $this->_params['customer'][0]['addressID']. '\'');

        if(isset($_POST['submitCheckout'])&&requiredCheckCheckout($this->_params['error'])){
            $this->_params['checkoutSite1']=false;
        }
        if(isset($_POST['submitOrder'])){
            
        }
    }


    public function actionLogin()
    {
        $errors = [];
        $rememberMe = false;
        if (isset($_POST['rememberMe'])) {
            $rememberMe = true;
        }

        if (isset($_POST['submitLogin']) && login($_POST['validationPassword'], $_POST['email'], $rememberMe, $errors) == true) {
            $dbQuery = \skwd\models\Account::find('email= ' . '\'' . $_POST['email'] . '\'');
            //$dbQuery[0]['id'];
            $_SESSION['logged'] = true;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $dbQuery[0]['id'];

            if (isset($_COOKIE['destination'])) {
                header('Location: index.php?c=pages&'.'a='.$_COOKIE['destination']);
            } else {
                header('Location: index.php?c=pages&a=start');
            }
        }
        $this->_params['error'] = $errors;
    }

    public function actionMyOrders()
    {

    }

    public function actionError()
    {

    }
    public function actionShoppingCartShow(){

    }

    public function actionRegister()
    {
        if (isset($_POST['submitR'])) {
            $errors = [];
            requiredCheck($errors);
            if (count($errors) !== 0) {
                $this->_params['error'] = $errors;
                return;
            }
            $good = register($errors);
            if ($good === true) {
                header('Location: index.php?c=pages&a=start');
            } else {
                $this->_params['error'] = $errors;
            }

        }
    }


    public
    function actionStart()
    {

        if (isset($_POST['submitLogout'])) {
            logout();
        }
    }

    public
    function actionProducts()
    {

    }

    public
    function actionBasket()
    {

    }

    public
    function actionWineInformation()
    {

    }

    public
    function actionPayOffice()
    {

    }

    public
    function actionImprint()
    {

    }

    public
    function actionAccount()
    {

    }
}