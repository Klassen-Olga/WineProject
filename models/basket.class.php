<?php
namespace skwd\models;
class Basket extends BaseModel{
    const TABLENAME='Basket';
    protected $schema=[
        'basketID'=>['type'=>BaseModel::TYPE_INT],
        'actualPrice'=>['type'=>BaseModel::TYPE_FLOAT],
        'qty'=>['type'=>BaseModel::TYPE_INT],
        'productID'=>['type'=>BaseModel::TYPE_INT],
        'orderID'=>['type'=>BaseModel::TYPE_INT]
    ];
}