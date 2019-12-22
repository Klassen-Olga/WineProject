<?php

namespace skwd\controller;
class AccountsController extends \skwd\core\Controller{
    public function actionMyOrders(){

    }
    public function actionPersonalData(){
        
        $this->_params['error']=[];

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

        
        if(isset($_POST['submitEdit']) 
            && validatePersonalDataAccount($this->_params['error']
            ,$this->_params['customer'][0]['gender'], $this->_params['customer'][0]['addressID']
            ,$this->_params['customer'][0]['dateOfBirth'],$this->_params['customer'][0]['id']
            ,$this->_params['account'][0]['email'],$this->_params['account'][0]['password']))
            {
                header('Location: index.php?c=accounts&a=personalData');
            }


        if(isset($_POST['submitEditPassword']) 
            &&editPassword($this->_params['error'], $this->_params['account'][0]['email']
            ,$this->_params['account'][0]['id'], $this->_params['customer'][0]['id']))
            {
                header('Location: index.php?c=accounts&a=personalData');
            }
        

        if(isset($_POST['submitEditAddress'])&& editAddress($this->_params['error'], $this->_params['address'][0]['id']))
        {
                header('Location: index.php?c=accounts&a=personalData');
        }
    }
}