<?php

function login()
{
    $test = false;
    if (isset($_POST['submitLogin'])) {
        $test = true;//unter bedingungen
    }
    return $test;
}


function isPasswordFromUser($password, $email){
    
    skwd\models\Account::find();
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

function requiredCheck(&$errors){
    if (!isset($_POST['fname'])){
        array_push($errors, "Please fill out first name field");
    }
    if (!isset($_POST['lname'])){
        array_push($errors, "Please fill out last name field");
    }
    if (!isset($_POST['email'])){
        array_push($errors, "Please fill out email field");
    }
    if (!isset($_POST['password1'])){
        array_push($errors, "Please fill out password field");
    }
    if (!isset($_POST['password2'])){
        array_push($errors, "Please fill out repeat password field");
    }
    if (!isset($_POST['phone'])){
        array_push($errors, "Please fill out phone number field");
    }
    if (!isset($_POST['Month']) || $_POST['Day'] || $_POST['Year']){
        array_push($errors, "Please fill out all date of birth fields");
    }
    if (!isset($_POST['genderRadio'])){
        array_push($errors, "Please set your gender");
    }
    if (!isset($_POST['zip'])){
        array_push($errors, "Please fill out zip field");
    }
    if (!isset($_POST['city'])){
        array_push($errors, "Please fill out city field");
    }
    if (!isset($_POST['street'])){
        array_push($errors, "Please fill out street field");
    }
    if (!isset($_POST['country'])){
        array_push($errors, "Please fill out country field");
    }
}

//should have minimum 1 char and 1 number
function validatePasswordForm(&$errors, $password)
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

function validatePassword(&$errors, $password1, $password2){
    //the passwords1 and password 2 should be equal
    if ($password1!==$password2){
        array_push($errors,"The both passwords should be equal");
        return false;
    }
    //the password should be valid
    if (validatePasswordForm($errors,$password1)===false){
        return false;
    }
    return true;
}
function isUnique(&$errors, $email){
   $result= \skwd\models\Account::find('email= '.'\''. $email. '\'');
    if (count($result)===0){
        return true;
    }
    array_push($errors, "The user with this email already exists");
    return false;
}
function validateDateOfBirth(&$errors){
    if ($_POST['Year']==='Year'){
        array_push($errors, "Please enter valid year in your date of birth");
    }
    if ( $_POST['Month']==='Month'){
        array_push($errors, "Please enter valid month in your date of birth");
    }
    if ($_POST['Day']==='Day'){
        array_push($errors, "Please enter valid day in your date of birth");
    }
}
function validateCountry(&$errors){
    if ($_POST['country']==='Country'){
        array_push($errors, "Please enter valid country");
    }
}
function findAddressInDb($address){
    $country=$address->__get('country');
    $city=$address->__get('city');
    $zip=$address->__get('zip');
    $street=$address->__get('street');
    $id=\skwd\models\Address::find('country= '. '\''. $country. '\''. ' and city= ' .
                        '\'' .$city.  '\''. ' and zip= '. '\''.  $zip.  '\''. ' and street= '. '\''. $street. ' \' ');
    if (count($id)===0){
        return null;
    }
    return $id[0]['id'];
}
function validateCustomerTable(&$errors){
    $customer = ['firstName' => $_POST['fname'],
        'lastName' => $_POST['lname'],
        'gender'=>$_POST['genderRadio'],
        'phoneNumber' => $_POST['phone']
    ];
    $customerInstance = new \skwd\models\Customer($customer);
    $customerInstance->validate($errors);
    validateDateOfBirth($errors);
    if (count($errors)===0){
        $customerInstance->__set('dateOfBirth',dateOfBirthFilter($_POST['Year'] . $_POST['Month'] . $_POST['Day']));
        return $customerInstance;
    }
    else{
        return false;
    }

}
function validateAddressTable(&$errors){

    $address = [
        'city' => $_POST['city'],
        'zip' => $_POST['zip'],
        'street' => $_POST['street']
    ];
    $addressInstance = new \skwd\models\Address($address);
    $addressInstance->validate($errors);
    validateCountry($errors);
    if (count($errors)===0){
        $addressInstance->__set('country', $_POST['country']);
        //it is not allowed to save the same addresses to the database
        $addressID=findAddressInDb($addressInstance);
        if (!is_null($addressID)){
            $addressInstance->__set('id', $addressID);
        }
        return $addressInstance;
    }
    else {
        return false;
    }
}
function validateAccountTable(&$errors){
    if (!validatePassword($errors, $_POST['password1'], $_POST['password2']) || !isUnique($errors, $_POST['email'])) {
        return false;
    }
    $password=password_hash($_POST['password1'], PASSWORD_DEFAULT);
    $account=[
        'email'=>$_POST['email'],
        'password'=>$password
    ];
    $accountInstance=new \skwd\models\Account($account);
    $accountInstance->validate($errors);
    if (count($errors)===0){
        return $accountInstance;
    }
    else{
        return false;
    }
}
function register(&$errors)
{
    $db=$GLOBALS['db'];
    $db->beginTransaction();
    $customerInstance=validateCustomerTable($errors);
    $addressInstance=validateAddressTable($errors);
    $accountInstance=validateAccountTable($errors);
    if ($customerInstance===false || $addressInstance===false || $accountInstance===false){
        return false;
    }

    if($addressInstance->__get('id')===null){
        $addressInstance->save($errors);
    }
    //only if the address is inserted we can go forward
    if (count($errors)===0){
        $customerInstance->__set('addressID', $addressInstance->__get('id'));
        $customerInstance->save($errors);
        //only if the customer is inserted we can go forward
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

    function isPasswordfromUser($password, $email){
        $result1= skwd\models\Account::find('email =' . $email);
        if(strlen($password)==0 || strlen($email)==0 ){
            return false;
        }
        
            $result1= skwd\models\Account::find('email =' . $email);
            if(password_verify($password, $result1[0]['password'])){
                return true;
            }
            else{

                return false;
            }
        
    }

}

