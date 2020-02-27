<?php

namespace skwd\controller;
class ProductsController extends \skwd\core\Controller
{
    //*//
    //implements filter part and pagination af all products
    //*//
    public function actionAllProducts()
    {
        /*   Filter allow to search by drinks from an certain region
     and/or an certain year
     and/or price class
     or drink category(dropdown menu in navigation)*/
        $this->_params['year']=getDbYears();
        $this->_params['region']=getDbRegions();
        $this->_params['price']=['0.1', '10', '50', '100', '500', '1000'];
        //user deleted part of url
        if (empty($_GET['page'])){
            $_GET['page']=1;
        }
        //user: I want to  modify my url
        //dev: :( WHY?!
        elseif(ctype_digit($_GET['page'])==false){
            $_GET['page']=1;
        }
        if (isset($_GET['region']) || isset($_GET['year']) || isset($_GET['minPrice'])) {
            //here complex select clause if user wants to combinate filters
            $where = '';
            $join = ' join PropertyProProduct ppp on product.prodId=ppp.ProductID ';
            $join .= ' join Property on property.id=ppp.propertyID ';
            $others = ' GROUP BY prodId HAVING COUNT(*)=';
            $numberOfOptions = 0;//how many matches exist(for example product should have value 2015 and value 'Germany')
                                //with or operator it should appear twice in the list, that is why $numberOfOptions = 2)
            if (isset($_GET['region'])) {
                if ( validateUserUrl($this->_params['region'],$_GET['region'])==false){
                    header('Location: index.php?c=pages&a=error');
                }

                $where = ' where (property.name=\'country\') and (ppp.value=' . '\'' . $_GET['region'] . '\')';
                $numberOfOptions++;
            }
            if (isset($_GET['year'])) {
                if ( validateUserUrl($this->_params['year'],$_GET['year'])==false){
                    header('Location: index.php?c=pages&a=error');
                }
                if ($where === '') {
                    $where = ' where (property.name=\'year\') and (ppp.value=' . '\'' . $_GET['year'] . '\')';
                } else {
                    $where .= ' or (property.name=\'year\') and (ppp.value=' . '\'' . $_GET['year'] . '\')';
                }
                $numberOfOptions++;
            }
            if (isset($_GET['minPrice']) && isset($_GET['maxPrice'])) {
                if (!priceIsValid($this->_params['price'])){
                    header('Location: index.php?c=pages&a=error');
                }
                $wherePrice = $_GET['minPrice'] . ' <= ( case when product.discount is null then product.standardPrice else product.standardPrice-(product.standardPrice*product.discount/100) end )';
                $wherePrice .= ' and ' . $_GET['maxPrice'] . ' >= ( case when product.discount is null then product.standardPrice else product.standardPrice-(product.standardPrice*product.discount/100) end )';
                if ($where === '') {
                    $this->_params['pagesNumber'] =getNumberOfPages(null,' where '.$wherePrice);
                    $this->_params['products'] = getProductsAccordingToThePage(null, ' where '.$wherePrice);
                    return;
                } else {
                    $wherePrice = ' and ' . $wherePrice;
                    $others .= $wherePrice;
                }
            }
            $others = str_replace('COUNT(*)=', 'COUNT(*)=' . $numberOfOptions . ' ', $others);
            $this->_params['pagesNumber'] =getNumberOfPages($join, $where, null, $others);
            $this->_params['products'] =getProductsAccordingToThePage($join, $where, null, $others);
        } else {
            $this->_params['pagesNumber']=getNumberOfPages();
            $this->_params['products']=getProductsAccordingToThePage();
        }
    }
    //*//
    //shows all properties of certain product, its price and picture
    //*//
    public function actionTheProduct()
    {
        $id = $_GET['i'];
        //user manipulated his url
        if (ctype_digit($id)===false){
            $this->_params['products']=false;
        }
        else{
            $this->_params['products'] = \skwd\models\Product::find("prodId= " . $id);
            if (count($this->_params['products'])>0){
                $this->_params['query'] = \skwd\models\AllProducts::find("productID=" . $this->_params['products'][0]['prodId']);
                $this->_params['pictures']= \skwd\models\Picture::find("productID=" . $this->_params['products'][0]['prodId']);
            }
            else{
                $this->_params['products']=false;
            }
        }
    }

    public function actionCategory()
    {

    }

}