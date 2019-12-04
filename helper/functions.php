<?php

function login(){
    $test = false;
    if(isset($_POST['submitLogin'])){
        $test = true;//unter bedingungen
    }
    return $test;
}
function dateOfBirthFilter($str){

    $month=ucfirst(substr($str, 4, strlen($str)-6));
    $year= substr($str, 0, 4);
    $date=substr($str, -2, 2);
    $array=['January', 'February', 'March', 'April', 'May', 'June', 'July',
        'August', 'September', 'October', 'November', 'December'];
    $monthNumber=0;
    for ($i=0; $i<count($array); $i++){
        if ($array[$i]===$month){
            $monthNumber=$i+1;
            break;
        }
    }
    if ($monthNumber<10){
        $monthNumberWith0='0'. $monthNumber;
    }
    $resultMonth=isset($monthNumberWith0)? $monthNumberWith0: $monthNumber;

    return $year.'-'.$resultMonth.'-'. $date;

}
//should have minimum 1 char and 1 number
function validatePassword(&$errors, $password){
    $check=0;
    if(!preg_match('/[a-zA-Z]/', $password)){
        $errors[]="Use at least one letter symbol for your password";
        return false;
    }
    if (!preg_match('/[0-9]/', $password)){

        $errors[]="Use at least one number for your password";
        return false;
    }
    return true;
}