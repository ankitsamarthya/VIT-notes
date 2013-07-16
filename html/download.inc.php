</div>
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
<table border=1 width=100%>
<?php
    
    $sub1 = $_POST['sub1'];
  $file1 = mysql_query("SELECT * FROM file WHERE fsub = '$sub1'", $connection);
    if(!$file1){
        die("Database query failed: " . mysql_error());
    }
            while($every1 = mysql_fetch_array($file1))
            {   $fname1 = $every1['fname'];
                $flocation1 = $every1['flocation'];
                $fuser = $every1['uname'];
                echo "<tr><td width=85%><b>{$fname1}</b> by <i>{$fuser}</i></td><td width=15% align=\"center\"><a href=\"{$flocation1}\">Download</a></td></tr>";
            }
   

?>
</table>

<?php
mysql_close($connection);

?>
 <div class="midheading">
