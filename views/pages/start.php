start.php

<p>hallo <?if(isset($_SESSION['logged']) && isset($_SESSION['loginName'])&& $_SESSION['logged']==true){echo $_SESSION['loginName'];}else{echo 'gast';}?></p>
<?


$result1= skwd\models\Account::find('email =' . $_POST['email']);
if(isPasswordFromUser($_POST['validationPassword'],$_POST['email'])==true){
    echo 'Password is valid!';
}
else{
    echo $_POST['validationPassword'];
    echo $_POST['email'];
    echo 'false';
    echo $result1[0]['password'];
    echo $result1[0]['email'];
}
 ?>
