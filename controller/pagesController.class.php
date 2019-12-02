<?php

namespace skwd\controller;

class PagesController extends \skwd\core\Controller
{


    public function actionLogin()
    {

       
        if(isset($_POST['submitLogin'])){
       $_SESSION['a']=true;
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


    }

    public function actionStart()
    {

        if(isset($_POST['submitLogin'])){
            $_SESSION['logged']=true;
            $_SESSION['loginName']= $_POST['email'];
             }
             if(isset($_POST['submitLogout'])){
                $_SESSION['logged']=false;
                 }

        if (isset($_POST['submitR'])) {
            $address=['country'=>$_POST['country'],
                'city'=> $_POST['city'],
                'zip'=>$_POST['zip'],
                'street'=>$_POST['street']
                ];

            $addressO = new \skwd\models\Address($address);
            $addressO->save();
            $customer=['firstName'=>$_POST['fname'],
                'lastName'=>$_POST['lname'],
                'dateOfBirth'=>$_POST['year'] . $_POST['month'] . $_POST['day'],
                'phoneNumber'=>$_POST['phone'],
                'addressID'=>$addressO->__get('id')
            ];
            $customerO = new \skwd\models\Customer($customer);
            $customerO->save();
        }

    }

    public function actionProducts()
    {

    }
    public function actionBasket()
    {

    }

    public function actionWineInformation()
    {

    }

    public function actionPayOffice()
    {

    }
    public function actionImprint(){

    }
    public function actionAccount(){

    }
}