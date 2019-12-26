<?php

namespace skwd\controller;

class PagesController extends \skwd\core\Controller
{


    public function actionTheProduct()
    {

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

    public function actionShoppingCart()
    {
        //should know if user is logged in
        $accountId = usersIdIfLoggedIn();
        //if user is not logged in and he wants to add a product to basket, we save source
        if (is_null($accountId) && isset($_GET['i'])) {
            setcookie('destination', 'shoppingCartShow', 600, '/');
            setcookie('productToBasket', $_GET['i'], 600, '/');
            header('Location: index.php?c=pages&a=login');
        }

        $productId = $_GET['i'];
        $shoppingCart = \skwd\models\ShoppingCart::find("accountId=" . $accountId);
        $shoppingCartId = $shoppingCart[0]['id'];

        //if user wants to delete or to change quantity of his purchase $_GET['cartOp'] must be set
        if (isset($_GET['i']) && isset($_GET['cartOp'])) {
            //todo delete items nach checkbox
            upDateOrDeleteProductInShoppingCart($productId, $shoppingCartId, $errors);
        } else if (isset($_GET['i'])) {
            insertNewProductToShoppingCart($productId, $shoppingCartId, $errors);
        }
        if (count($errors) !== 0) {
            $this->_params = $errors;
        }

    }

    public function actionShoppingCartShow()
    {
        //case user wants to add a product to hist basket and he is not logged in
        if (isset($_COOKIE['destination']) && ($_COOKIE['destination'] === 'shoppingCartShow') && isset($_COOKIE['productToBasket'])) {
            //todo insert to shopping cart the product
            //unset cookie
        }
        //case user want to show his basket and is not logged in
        elseif (isset($_COOKIE['destination']) && ($_COOKIE['destination'] === 'shoppingCartShow')) {
            unset($_COOKIE['destination']);
        }

        if (is_null(usersIdIfLoggedIn())) {
            setcookie('destination', 'shoppingCartShow', time() + 600, '/');
            header('Location: index.php?c=pages&a=login');
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