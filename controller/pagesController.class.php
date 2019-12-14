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
        if(isset($_POST['rememberMe'])){
            $rememberMe = true;
        }

        if (isset($_POST['submitLogin']) && login($_POST['validationPassword'],$_POST['email'], $rememberMe, $errors)==true) {
            
            $_SESSION['logged'] = true;
            $_SESSION['email'] = $_POST['email'];
           
            header('Location: index.php?c=pages&a=start');
        }
        $this->_params['error']=$errors;
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