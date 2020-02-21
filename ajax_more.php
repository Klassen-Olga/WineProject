<?php
require_once 'config/imports.php';
if(!empty($_POST["id"])){

    $db = $GLOBALS['db'];

    $showLimit = 2;
    $lastID = $_POST['id'];
/*
    // Count all records except already displayed
    $statement = $db->prepare("SELECT COUNT(*) as num_rows FROM product WHERE id < ".$lastID." ORDER BY id DESC");
    $statement->execute();
    $row = $statement->fetch();
    $totalRowCount = $row['num_rows'];
    
    $showLimit = 2;
   */ 
  //Get all rows except already displayed
$queryAll = $db->prepare("SELECT COUNT(*) as num_rows FROM product WHERE id < ".$lastID." ORDER BY id DESC");
$queryAll->execute();
$rowAll = $queryAll->fetch();
$allNumRows = $rowAll['num_rows'];
    // Get records from the database

    $statement = $db->prepare("SELECT * FROM product WHERE id < ".$lastID." ORDER BY id DESC LIMIT ".$showLimit);
    $statement->execute();
    if( $statement->rowCount() > 0){ 
        while($row = $statement->fetch()){
            $postID = $row['id'];
    ?>
        <div class="list-item"><h4><?php echo $row['prodName']; ?></h4></div>
<?php } ?>
<?php if($allNumRows > $showLimit){ ?>
    <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
        <img src="loading.gif"/>
    </div>
<?php }else{ ?>
    <div class="load-more" lastID="0">
        That's All!
    </div>
<?php }
}else{ ?>
    <div class="load-more" lastID="0">
        That's All!
    </div>
<?php
    }
}
?>

