</div>
   <?php
   ob_start();

    include('server.php');

    $connection = mysql_connect("$HOST","$USER","$PASS");
    if(!$connection){
        die("Database connection failed: " . mysql_error());
    }
    
    $db_select = mysql_select_db("$DATABASE", $connection);
    if(!$db_select){
        die("Database selection failed: " . mysql_error());
    }
?>

    
    
    <?php ob_start();
    

    
    $errorstring = "";
    
    if(!isset($_POST['name'])||empty($_POST['name']))
    $errorstring = $errorstring."Name<br>";
    else
     $name = $_POST['name'];

    
    if(!isset($_POST['username'])||empty($_POST['username']))
    $errorstring = $errorstring."Username<br>";
    else
        $uname = $_POST['username'];

    
    if(!isset($_POST['pass'])||empty($_POST['pass']))
    $errorstring = $errorstring."Password<br>";
    else
        $hpass = sha1($_POST['pass']);

    
    if(!isset($_POST['mob'])||empty($_POST['mob'])||$_POST['mob']<7000000000||$_POST['mob']>9999999999)
    $errorstring = $errorstring."Mobile Number<br>";
    else
        $mob = $_POST['mob'];

    
    
    if($errorstring!="")
    {
        header("Refresh: 3; url=index.php?p=registerform");
    echo "The following fields are empty or entry is invalid:<br/>$errorstring";
    
    }
    else
    {
        $check = mysql_query("SELECT * FROM user", $connection);
    if(!$check){
        die("Database query failed: " . mysql_error());
    }
   
    $flag = 0;
    while($every = mysql_fetch_array($check)){
        if($uname==$every['username'])
        {
            
            $flag = 1;
        }
    }
    if($flag==1){
      header("Refresh: 3; url=index.php?p=registerform");
            echo "<br/>Username already exists. Please register with another username.";
    }
    else
    {
    $result = mysql_query("INSERT INTO user (name, username, password, mob) VALUES ('$name', '$uname', '$hpass', $mob)", $connection);
    if(!$result){
        die("Database query failed: " . mysql_error());
    }
    else{
         header("Refresh: 3; url=index.php");
                echo "<br/>You are successfully registered.";

      
    }}
        
    }
    
    
?>
<?php
mysql_close($connection);
?>
<div class="midheading">