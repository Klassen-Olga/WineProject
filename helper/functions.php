<?php

function login(){
    $test = false;
    if(isset($_POST['submitLogin'])){
        $test = true;//unter bedingungen
    }
    return $test;
}