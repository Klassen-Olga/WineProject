<?php
namespace skwd\controller;
class ProductsController extends \skwd\core\Controller{

    public function actionAllProducts(){
        if (isset($this->_params['error'])){
            echo $this->_params['error'];
        }

    }
    public function actionTheProduct(){

    }
    public function actionCategory(){
        if (isset($this->_params['error'])){
            echo $this->_params['error'];
        }
    }
}