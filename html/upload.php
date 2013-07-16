</div>

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
    $fname = $_FILES["file"]["name"];
    $ftype = $_FILES["file"]["type"];
    $fsize = $_FILES["file"]["size"];
    $ftemp = $_FILES["file"]["tmp_name"];
    $ferror = $_FILES["file"]["error"];
  
    $sub = $_POST['sub'];
    $flocation = "uploaded/".$sub."/".$fname;
    if($ferror > 0)
    {
      header("Refresh: 3; url=index.php");
    echo "Error Uploading File! Code $ferror. Try Again." ;
    }
    else
    {
       
        move_uploaded_file($ftemp, $flocation);
         $fresult = mysql_query("INSERT INTO file (uname, fsub, fname, flocation) VALUES ('$user', '$sub', '$fname', '$flocation')", $connection);
    if(!$fresult){
        die("Database query failed: " . mysql_error());
    }
    else {
        header("Refresh: 3; url=index.php");
        echo "File Uploaded Successfully.";
      
    }
    }
        


?>
      

<?php
mysql_close($connection);

?>
 <div class="midheading">
