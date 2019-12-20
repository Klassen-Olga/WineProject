<?php
$category=$_GET['s'];
$result=\skwd\models\PropertyProProduct::find('category= '.$category);
if (count($result)===0){
    $this->_params['noProducts']='There is no products with category '.$category.' yet';
}
    foreach ($dbQuery as $key => $value): ?>

    <?php endforeach; ?>

