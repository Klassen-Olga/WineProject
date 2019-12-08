
<?php 

if(isset($_SESSION['logged'])&& $_SESSION['logged']==true){

    include __DIR__.'/../accountLogged.php';
}
else{
    include __DIR__.'/../accountNotLogged.php';
}


