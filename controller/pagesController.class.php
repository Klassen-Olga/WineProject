<?php

namespace skwd\controller;

class PagesController extends \skwd\core\Controller
{

    public function actionTheProduct()
    {

    }

    public function actionLogin()
    {


        if (isset($_POST['submitLogin'])) {
            $_SESSION['a'] = true;
        }


    }

    public function actionMyOrders()
    {

    }

    public function actionError()
    {

    }


    public function actionRegister()
    {
        if (isset($_POST['submitR'])) {
            $errors = [];
/*            requiredCheck($errors);
            if (count($errors)!==0){
                $this->_params['error']=$errors;
                return;
            }*/
            $good = register($errors);
            if ($good === true) {
                header('Location: index.php?c=pages&a=start');
            } else {
                $this->_params['error']=$errors;
            }

        }
    }

        public
        function actionStart()
        {

            if (isset($_POST['submitLogin'])) {
                $_SESSION['logged'] = true;
                $_SESSION['loginName'] = $_POST['email'];
            }
            if (isset($_POST['submitLogout'])) {
                $_SESSION['logged'] = false;
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