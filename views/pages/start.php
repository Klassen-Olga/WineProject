start.php

<p>hallo <?if(isset($_SESSION['logged']) && isset($_SESSION['loginName'])){echo $_SESSION['loginName'];}else{echo 'gast';}?></p>