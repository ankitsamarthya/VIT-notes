
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
</div>
<h2><b>Questions? Ask Here.</b></h2>
        <form action="index.php?p=post" method="post" >
            <br/>
<textarea name="comment" rows="3" cols="47"></textarea>
<br/><br/>
            <input type="submit" name="comment1" value="Post" />
            <br/>
        </form>
        <div class="midtxt">
<?php
            $check1 = mysql_query("SELECT * FROM post ORDER BY pid DESC", $connection);
    if(!$check1){
        die("Database query failed: " . mysql_error());
    }
   ?><?php
            while($every1 = mysql_fetch_array($check1))
            {   $user1 = $every1['username'];
                $comm1 = $every1['post'];
                $pid = $every1['pid'];
                $check2 = mysql_query("SELECT * FROM comment WHERE p_id={$pid} ORDER BY cid DESC", $connection);
                if(!$check2){
                                die("Database query failed: " . mysql_error());
                            }
                ?>
                <table border=0 width=100% style="width:auto;"><tr><td width=95%><h3><?php echo $user1; ?></h3><?php echo $comm1; ?><br/><br/></td><td width=5% valign="top"><div><a href = "index.php?p=delete&id=<?php echo ($pid); ?>" ><img src="cross.jpg" height="15" width="15" alt="Delete Comment" border=0 /></a></div></td></tr>
                <?php
                    while($every2 = mysql_fetch_array($check2))
                    {
                        $cname = $every2['cname'];
                        $comm2 = $every2['comment'];
                        $cid = $every2['cid'];
                        ?>
                        <tr> <td width=95%> <li><?php echo "<b><i>{$cname}</i></b> : {$comm2}" ; ?></li></td><td valign="top" width=5%><a href = "index.php?p=delete&cid=<?php echo ($cid); ?>" ><img src="cross.jpg" height="10" width="10" alt="Delete Comment" border=0 /></a> </td></tr>
                        <?php
                        
                    }
                
                
                ?>
                
                 <tr><td><form action="index.php?p=comment&id=<?php echo ($pid); ?>" method="post" >
            <br/>
<textarea name="comment" rows="1" cols="35"></textarea>

            <input type="submit" value="Comment" />
            <br/><br/>
        </form> </td></tr></table>                                                                                                                                                                                                                                                                                                                 
                <?php 
            }
        ?>
        
        
<?php
mysql_close($connection);

?>
