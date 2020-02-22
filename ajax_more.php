<?php
require_once 'config/database.php';
if (!empty($_POST["id"])):
    $db = $GLOBALS['db'];
    $showLimit = 2;
    $lastID = $_POST['id'];

//Get all rows except already displayed
    try{
        $queryAll = $db->prepare("SELECT COUNT(*) as num_rows FROM product WHERE prodId < " . $lastID . " ORDER BY prodId DESC");
        $queryAll->execute();
        $rowAll = $queryAll->fetch();
        $allNumRows = $rowAll['num_rows'];
// Get records from the database

        $statement = $db->prepare("SELECT * FROM product WHERE prodId < " . $lastID . " ORDER BY prodId DESC LIMIT " . $showLimit);
        $statement->execute();
    }catch (\PDOException $e){
        die( $e->getMessage());
    }
    if ($statement->rowCount() > 0) :
        while ($row = $statement->fetch()):
            $postID = $row['prodId'];
            ?>
            <div class="list-item"><h4><?php echo $row['prodName']; ?></h4></div>
        <?php endwhile; ?>
        <?php if ($allNumRows > $showLimit) : ?>
        <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;"></div>
    <?php else : ?>
        <div class="load-more" lastID="0">
            There are all products!
        </div>
    <?php endif;
    else: ?>
        <div class="load-more" lastID="0">
            That's All!
        </div>
    <?php endif;
endif;



