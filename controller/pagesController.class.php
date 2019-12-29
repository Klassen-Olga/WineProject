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
            actionIfUserIsNotLoggedIn();
        }
        $this->_params['error'] = $errors;
    }

    public function actionMyOrders()
    {

    }

    public function actionError()
    {

    }

    public function actionShoppingCartShow()
    {
        $errors = [];
        //should know if user is logged in
        $accountId = usersIdIfLoggedIn();
        //case user wants to add a product to his basket and he is not logged in
        //save all data to cookie, because we want, that user automatically get his basket after login/register and all elements from submit disappear from $_GET
        if (is_null($accountId) && isset($_GET['i'])) {
            $_SESSION['destination']="shoppingCartShow";
            $_SESSION['productToBasket']=$_GET['i'];
            $_SESSION['price']=$_GET['p'];
            header('Location: index.php?c=pages&a=login');
            return;
        } //case user want to show his basket and is not logged in
        elseif (is_null($accountId)) {
            $_SESSION['destination']="shoppingCartShow";
            header('Location: index.php?c=pages&a=login');
            return;
        }
        //else the user is logged in
        userIsLoggedIn($accountId, $errors);
        if (count($errors) !== 0) {
            $this->_params = $errors;
        }

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
                actionIfUserIsNotLoggedIn();
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