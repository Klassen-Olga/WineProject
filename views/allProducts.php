<?php

$db = $GLOBALS['db'];
$result = null;
  


$sql = 'SELECT * FROM product';

$result = $db->query($sql)->fetchall();
/*
foreach($result as $key =>$value){

    echo $result[$key]['name'];
    echo "<br>";
    
}
*/