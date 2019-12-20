<?php

namespace skwd\controller;
class AccountsController extends \skwd\core\Controller{
    public function actionMyOrders(){

    }
    public function actionPersonalData(){
        
        $this->_params['error']=[];

        //normale ID abfrage machen und find bei customer und address ausführen!!!!!!!!!
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


        if(isset($_POST['submitEdit'])){

            if( validatePersonalDataAccount($this->_params['error']
            ,$this->_params['customer'][0]['gender'], $this->_params['customer'][0]['addressID']
            ,$this->_params['customer'][0]['dateOfBirth'],$this->_params['customer'][0]['id']
            ,$this->_params['account'][0]['email'],$this->_params['account'][0]['password']))
            {
                header('Location: index.php?c=accounts&a=personalData');
            }

        }

        if(isset($_POST['submitEditPassword'])){

        if(isset($_POST['submitEditPassword'])
            &&isPasswordfromUser($_POST['oldPassword']
              ,$this->_params['account'][0]['email'],$this->_params['error']) 
            && validatePassword($this->_params['error'],$_POST['newPassword'],$_POST['newPasswordCheck'])
            &&validatePasswordForm($this->_params['error'], $_POST['newPassword'])){

                $account=['id'=>$this->_params['account'][0]['id'],
                'email'=>$this->_params['account'][0]['email'],
                'password'=>password_hash($_POST['newPassword'], PASSWORD_DEFAULT),
                'customerID'=>$this->_params['customer'][0]['id']];
         
                 $account1 = new \skwd\models\Account($account);
                 $account1->validate($error);
                 $account1->save($error);

                 header('Location: index.php?c=accounts&a=personalData');
                 
                 }

        }

    }

}