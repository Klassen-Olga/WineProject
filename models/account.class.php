<?php
namespace skwd\models;
class Account extends BaseModel {

    const TABLENAME = 'account';
    protected $schema=[
    'id'=>['type'=>BaseModel::TYPE_STRING],
    'email'=>['type'=>BaseModel::TYPE_STRING, 'min'=>5, 'max'=> 50],
    'password'=>['type'=>BaseModel::TYPE_STRING, 'min'=>60, 'max'=> 255],
    'customerID'=>['type'=>BaseModel::TYPE_INT]];
}