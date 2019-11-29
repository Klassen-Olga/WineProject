<?php require_once "config/database.php"?>

<!DOCTYPE html>
<html lang="de">

<header>
    <title>First Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</header>

<body>

<nav>
        <ul>
            <li style="display:inline"><a href="<?=$_SERVER['SCRIPT_NAME']?>/?a=start">startsite</a></li>
            <li style="display:inline"><a href="<?=$_SERVER['SCRIPT_NAME']?>/?a=basket">basket</a></li>
            <li style="display:inline"><a href="<?=$_SERVER['SCRIPT_NAME']?>/?a=login">login</a></li>
            <li style="display:inline"><a href="<?=$_SERVER['SCRIPT_NAME']?>/?a=products">products</a></li>
            <li style="display:inline"><a href="<?=$_SERVER['SCRIPT_NAME']?>/?a=wine_information">wine information</a></li>
           
           
        </ul>
      
    </nav>


<?php echo $body; ?>

<footer>
<li style="display:inline"><a href="<?=$_SERVER['SCRIPT_NAME']?>/?a=imprint">imprint</a></li>
<img src="assets/images/logo.jpeg" alt="false">
</footer>

   
</body>


</html>