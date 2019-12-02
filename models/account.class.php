<?php
namespace skwd\models;
class Account{

    const TABLENAME = 'Account';
    protected $schema=[
    'id'=>['type'=>BaseModel::TYPE_STRING],
    'email'=>['type'=>BaseModel::TYPE_STRING, 'min'=>5, 'max'=> 50],
    'password'=>['type'=>BaseModel::TYPE_STRING, 'min'=>5, 'max'=> 20],
    'customerID'=>['type'=>BaseModel::TYPE_INT]];
}