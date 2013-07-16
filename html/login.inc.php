<?php

ob_start();
include('server.php');

    $connection = mysql_connect("$HOST","$USER","$PASS");
    if(!$connection){
        die("Database connection failed: " . mysql_error());
    }
    
    $db_select = mysql_select_db("vit", $connection);
    if(!$db_select){
        die("Database selection failed: " . mysql_error());
    }

    $pass = sha1($_POST['pass']);
    $name = $_POST['username'];
    $result = mysql_query("SELECT * FROM user WHERE password='{$pass}' AND username='{$name}'", $connection);
    if(!$result){
        die("Database query failed: " . mysql_error());
    }
    
    
    if(mysql_num_rows($result)==1)
    {
        $row = mysql_fetch_array($result);
        $_SESSION['user_id'] = $row['uid'];
        $_SESSION['name'] = $row['name'];
        header("Location: index.php");
    }
    else
    {  
        header("Location: index.php");
            
    }


mysql_close($connection);
?>
