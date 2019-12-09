<?php


 $db = $GLOBALS['db'];
$result = null;
  


$sql = 'SELECT * FROM product';

$result = $db->query($sql)->fetchall(); 




