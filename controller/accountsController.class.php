<?php

namespace skwd\controller;
class AccountsController extends \skwd\core\Controller{
    public function actionMyOrders(){

    }
    public function actionPersonalData(){
        $email = emailSessionOrCookie();

        //normale ID abfrage machen und find bei customer und address ausführen!!!!!!!!!

       // $customerId= \skwd\models\Customer::find('email= '.'\''. $email. '\'');
       // $this->_params['address']= \skwd\models\Address::find('email= '.'\''. $email. '\'');
    }

}