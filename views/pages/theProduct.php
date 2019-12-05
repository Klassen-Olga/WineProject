
<?php
require_once __DIR__ .'/../../config/database.php';
require_once __DIR__ .'/../../models/baseModel.class.php';

echo $_GET['product'];
echo "<br><br>";

$db = $GLOBALS['db'];
$result = null;
  



  


$sql = 'SELECT * FROM product where name =' . "'" . $_GET['product']."'" ;


$result = $db->query($sql)->fetchall();


    echo 'produktname: ';
    echo $result[0]['name'];
    echo  "<br><br>";
    echo 'Produkbeschreibung: ';
    echo $result[0]['description'];
    echo  "<br><br>";
    echo 'preis: ';
    echo $result[0]['standartPrice'];
    echo 'EUR';
    
    echo  "<br>";
    
    

