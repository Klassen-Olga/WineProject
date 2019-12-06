start.php

<p>hallo <?if(isset($_SESSION['logged']) && isset($_SESSION['loginName'])&& $_SESSION['logged']==true){echo $_SESSION['loginName'];}else{echo 'gast';}?></p>

