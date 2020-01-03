<?php
$dbName='skwd';
$dns='mysql:dbname='.$dbName.';host=localhost;port=3307;';

$userName='root';
$password='';
$options=[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$db=null;
try{
    $db=new PDO($dns, $userName, $password, $options);

}catch (\PDOException $e){
    die('Database connection failed: '. $e->getMessage());
}
