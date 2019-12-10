
<?php

$id=$_GET['i'];
$query=\skwd\models\AllProducts::find("productID=".$id);


foreach ($query as $key=> $value){
    echo nl2br($query[$key]['name'].": ".$query[$key]['value']. "\r\n");
}
    
    

