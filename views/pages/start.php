start.php

<p>hallo <?if(isset($_SESSION['logged']) && isset($_SESSION['loginName'])&& $_SESSION['logged']==true){echo $_SESSION['loginName'];}else{echo 'gast';}?></p>

<p>deine daten <br> <?$test = skwd\models\Customer::find('customerID = 1');
echo $test[0]['firstName']?></p>