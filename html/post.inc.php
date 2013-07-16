<?php ob_start();
include ('check.inc.php');
include('server.php');

    $connection = mysql_connect("$HOST","$USER","$PASS");
    if(!$connection){
        die("Database connection failed: " . mysql_error());
    }
    
    $db_select = mysql_select_db("vit", $connection);
    if(!$db_select){
        die("Database selection failed: " . mysql_error());
    }
?>
<?php ob_start();
$username1 = $_SESSION['name'];
      $comm = $_POST['comment'];
        if((isset($comm))||(!empty($comm)))
        {
             $comment = mysql_query("INSERT INTO post (username, post) VALUES ('$username1', '$comm')", $connection);
             if(!$comment){
        die("Database query failed: " . mysql_error());
    }
 header("Location: index.php?p=postform");
 exit;}

?>
<?php
mysql_close($connection);

?>
