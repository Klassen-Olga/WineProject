<?php

namespace skwd\controller;
class ProductsController extends \skwd\core\Controller
{

    public function actionAllProducts()
    {
/*       $limit=5;
        $orderByAndLimit=' ORDER BY prodId DESC LIMIT '.$limit;*/



/*        Filter allow to search by drinks from an certain region
         and/or an certain year
         and/or price class
         or drink category(dropdown menu in navigation)*/
/*        if (isset($_GET['region']) || isset($_GET['year']) || isset($_GET['minPrice'])){
            $where='';
            $join = ' join PropertyProProduct ppp on product.prodId=ppp.ProductID ';
            $join.=' join Property on property.id=ppp.propertyID ';
            $others=' GROUP BY prodId HAVING COUNT(*) =';
            $numberOfOptions=0;
            if (isset($_GET['region'])) {
                $where = '(property.name=\'country\') and (ppp.value=' . '\''. $_GET['region'].'\')';
                $numberOfOptions++;
            }
            if (isset($_GET['year'])){
                if ($where===''){
                    $where='(property.name=\'year\') and (ppp.value='.  '\''. $_GET['year'].'\')';
                }
                else{
                    $where.=' or (property.name=\'year\') and (ppp.value='.  '\''. $_GET['year'].'\')';
                }
                $numberOfOptions++;
            }
            if (isset($_GET['minPrice']) && isset($_GET['maxPrice'])){
                $wherePrice=$_GET['minPrice'].'< ( case when product.discount is null then product.standardPrice else product.standardPrice-(product.standardPrice*product.discount/100) end )';
                $wherePrice.=' and ' .$_GET['maxPrice'].' > ( case when product.discount is null then product.standardPrice else product.standardPrice-(product.standardPrice*product.discount/100) end )';
                if ($where===''){
                    $this->_params['products'] = \skwd\models\Product::find($wherePrice);
                    return;
                }
                else{
                    $wherePrice=' and ' . $wherePrice;
                    $others.=$wherePrice;
                }
            }
            $others=str_replace('=','='.$numberOfOptions.' ', $others);
            $this->_params['products'] = \skwd\models\Product::find($where.$others, $join);
        }

        else {
            $this->_params['products'] = \skwd\models\Product::findWithLimit($orderByAndLimit);
            //$this->_params['products'] = \skwd\models\Product::find();
        }
*/
    }

    public function actionTheProduct()
    {

    }

    public function actionCategory()
    {

    }
}