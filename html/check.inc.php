 <?php ob_start();
    if(!isset($_SESSION['user_id'])){
        header("Refresh: 3; url=index.php");
    echo "Please Login To Access This Section." ;
        exit;
        
    }

        ?>