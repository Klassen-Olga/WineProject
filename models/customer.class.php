<?php
namespace  skwd\models;
class Customer extends BaseModel{

    const TABLENAME = 'Customer';

    protected $schema=[
        'id'=>['type'=>BaseModel::TYPE_INT]	,
        'firstName'	=>['type'=>BaseModel::TYPE_STRING, 'min'=>2, 'max'=>50],
        'lastName'	=>['type'=>BaseModel::TYPE_STRING, 'min'=>2, 'max'=>50],
        'gender' =>['type'=> BaseModel::TYPE_ENUM_G],
        //format: YYYY-MM-DD
        'dateOfBirth'=>['type'=>BaseModel::TYPE_STRING, 'min'=>10, 'max'=>10],
        'phoneNumber'=>['type'=>BaseModel::TYPE_STRING],
        'addressID'=>['type'=>BaseModel::TYPE_INT]	,
    ];

}
