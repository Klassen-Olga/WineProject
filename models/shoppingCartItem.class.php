<?php
namespace skwd\models;
class ShoppingCartItem extends BaseModel {

    const TABLENAME = 'ShoppingCartItem';
    protected $schema=[
        'id'=>['type'=>BaseModel::TYPE_INT],
        'qty'=>['type'=>BaseModel::TYPE_INT],
        'productID'=>['type'=>BaseModel::TYPE_INT],
        'shoppingCartId'=>['type'=>BaseModel::TYPE_INT],
        ];
}