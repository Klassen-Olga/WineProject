start.php

<p>hallo <?php if(isset($_SESSION['logged']) && isset($_SESSION['loginName'])&& $_SESSION['logged']==true){
    echo $_SESSION['loginName'];}
    else if(isset($_COOKIE['logged']) && $_COOKIE['logged']==='isLogged'){
        echo $_COOKIE['email'];
    }
    else{echo 'gast';}?></p>

