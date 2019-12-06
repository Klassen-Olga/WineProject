<?php

function login()
{
    $test = false;
    if (isset($_POST['submitLogin'])) {
        $test = true;//unter bedingungen
    }
    return $test;
}

function dateOfBirthFilter($str)
{

    $month = substr($str, 4, strlen($str) - 6);
    $year = substr($str, 0, 4);
    $date = substr($str, -2, 2);
    $array = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
        'August', 'September', 'October', 'November', 'December'];
    $monthNumber = 0;
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] === $month) {
            $monthNumber = $i + 1;
            break;
        }
    }
    if ($monthNumber < 10) {
        $monthNumberWith0 = '0' . $monthNumber;
    }
    $resultMonth = isset($monthNumberWith0) ? $monthNumberWith0 : $monthNumber;

    return $year . '-' . $resultMonth . '-' . $date;

}

//should have minimum 1 char and 1 number
function validatePassword(&$errors, $password)
{

    if (!preg_match('/[a-zA-Z]/', $password)) {
        array_push($errors[] ,"Use at least one letter symbol for your password");
        return false;
    }
    if (!preg_match('/[0-9]/', $password)) {

        array_push($errors, "Use at least one number for your password");
        return false;
    }
    if (strlen($password)<8){
        array_push($errors, "The length of our password should be more than 7 symbols");
        return false;
    }
    return true;
}


function register(&$errors)
{

    $db=$GLOBALS['db'];
    $db->beginTransaction();
    //the passwords1 and password 2 should be equal
    if ($_POST['password1']!==$_POST['password2']){
        array_push($errors,"The both passwords should be equal");
        return false;
    }
    //the password should be valid
    if (validatePassword($errors,$_POST['password1'])===false){
        return false;
    }
    $customer = ['firstName' => $_POST['fname'],
        'lastName' => $_POST['lname'],
        'dateOfBirth' => dateOfBirthFilter($_POST['Year'] . $_POST['Month'] . $_POST['Day']),
        'phoneNumber' => $_POST['phone']
    ];
    $address = ['country' => $_POST['country'],
        'city' => $_POST['city'],
        'zip' => $_POST['zip'],
        'street' => $_POST['street']
    ];
    $password=password_hash($_POST['password1'], PASSWORD_DEFAULT);

    $account=[
        'email'=>$_POST['email'],
        'password'=>$password
    ];
    $customerInstance = new \skwd\models\Customer($customer);
    $addressInstance = new \skwd\models\Address($address);
    $accountInstance=new \skwd\models\Account($account);
    //validate if the attributes have the right data type and all constraints are
    $customerInstance->validate($errors);
    $addressInstance->validate($errors);
    $accountInstance->validate($errors);
    if (count($errors)!==0){
        return false;
    }
    $addressInstance->save($errors);
    //only if the address is inserted we can go forward
    if (count($errors)===0){
        $customerInstance->__set('addressID', $addressInstance->__get('id'));
        $customerInstance->save($errors);
        //only if the customer is inserted we can go forrward
        if (count($errors)===0){
            $accountInstance->__set('customerID', $customerInstance->__get('id'));
            $accountInstance->save($errors);
            //only if all tree instances are inserted we can commit the transaction
            if (count($errors)===0){
                $db->commit();
                return true;
            }
            else{
                $db->rollBack();
                return false;
            }

        }
        else{
            $db->rollBack();
            return false;
        }
    }
    else{
        return false;
    }

    //todo keine doppelte addresse in db erlaubt
    //todo country month day year
    //todo trigger for unique login name
    //tofo

}
