<?php
namespace  skwd\models;
class Customer extends BaseModel{

    const TABLENAME = 'Customer';

    protected $schema=[
        'id'=>['type'=>BaseModel::TYPE_INT]	,
        'firstName'	=>['type'=>BaseModel::TYPE_STRING, 'min'=>2, 'max'=>50],
        'lastName'	=>['type'=>BaseModel::TYPE_STRING, 'min'=>2, 'max'=>50],
        'dateOfBirth'=>['type'=>BaseModel::TYPE_STRING, 'min'=>2, 'max'=>50],
        'phoneNumber'=>['type'=>BaseModel::TYPE_STRING, 'min'=>2, 'max'=>20],
        'addressID'=>['type'=>BaseModel::TYPE_INT]	,
    ];

}
