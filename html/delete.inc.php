<?php ob_start();
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

<?php
    $ckname = $_SESSION['name'];
    if(isset($_GET['id'])){
          $id1 = $_GET['id'];
                      $check3 = mysql_query("SELECT * FROM post WHERE pid={$id1}", $connection);
                    while($every3 = mysql_fetch_array($check3))
                    {
                        if($ckname==$every3['username'])
                        {   
                            $del = mysql_query("DELETE FROM post WHERE pid = $id1", $connection);
                             if(mysql_affected_rows()==1){
                                header("Location: index.php?p=postform");
                                    exit;   
                                }
                                
                        
                        }
                        else
                        {
                            header("Location: index.php?p=postform");
                                    exit;
                        }
                    }   
    }
    else if(isset($_GET['cid']))
    {
            $cid1 = $_GET['cid'];
             $check3 = mysql_query("SELECT * FROM comment WHERE cid={$cid1}", $connection);
                    while($every3 = mysql_fetch_array($check3))
                    {
                        if($ckname==$every3['cname'])
                        {   $del = mysql_query("DELETE FROM comment WHERE cid = $cid1", $connection);
                           
                             if(mysql_affected_rows()==1){
                                header("Location: index.php?p=postform");
                                    exit;   
                                }   
                        }
                        else
                        {
                            header("Location: index.php?p=postform");
                                    exit;
                        }
                    }   
        
        
        
    }
    
    ?>
<?php
mysql_close($connection);
?>