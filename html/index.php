<?php
session_start();
ob_start();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Vnotes</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="images/icon.ico" />


</head>

<body>
<div id="headerbg">
  <div id="headerblank">
    <div id="header">
      <div id="menu">
        <ul>
          <li><a href="index.php" class="menu">Home</a></li>
          <li><a href="index.php?p=downloadform" class="menu">Download</a></li>
          <li><a href="index.php?p=uploadform" class="menu">Upload</a></li>
          <li><a href="index.php?p=postform" class="menu">Forum</a></li>
          <li><a href="index.php?p=aboutus" class="menu">About Us</a></li>
        </ul>
      </div>
     <div id="login">
        <div id="logintxtblank">
     
        <?php ob_start();
        
    if(isset($_SESSION['user_id']))
    {
        include('welcome.inc.php');
    }
    else
    {
        include('loginform.inc.php');
    }
    
    
                   ?>  
        </div>
      </div>
    </div>
  </div>
</div>
<div id="contentbg">
  <div id="contentblank">
    <div id="content">
      <div id="contentleft">
        <div id="leftheading">
          <h4>News &amp; Updates</h4>
        </div>
        <div class="lefttxtblank">
          <span style="font-family:'Comic Sans MS',cursive; font-size:12px; font-weight:bold;">
            <script type="text/javascript"
src="#"></script>
          </span>
        </div>
        
       
       
      </div>
      <div id="contentmid">
                <div class="midheading">

         <?php ob_start();
         if(isset($_GET['p']))
        {
         $p=$_GET['p'];
          include ($p . '.inc.php');
        }
        else
        {
          include ('index.inc.php');
        }
         ?>
                </div>
                

       
        
      </div>
      <div id="contentright">
        <div class="rightheading">
          <h4>Photo Gallery</h4>
        </div>
        <div id="galleryblank">
          <div id="rightpic"><a href="#" class="rightpic"></a></div>
          <div id="rightpic02"><a href="#" class="rightpic02"></a></div>
          <div id="rightpic03"><a href="#" class="rightpic03"></a></div>
          <div class="viewbutton"><a href="#" class="view"> view more</a></div>
         
        </div>
      </div>
    </div>
  </div>
</div>
<div id="footerbg">
  <div id="footerblank">
    <div id="footer">
      <div id="footerbox">
       
        <div class="footertxt"><a target="_blank" href="#"><img src="images/facebook.png" border=0 height=135px width=135px alt="facebook"/></a></div>
        
      </div>
      <div id="footermid">
      <div class="footertxt"><a target="_blank" href="#"><img src="images/twitter.png" border=0 height=135px width=135px alt="twitter"/></a></div>
      
      </div>
      <div id="footerlast">
        
        <div class="footertxt"><a target="_blank" href="#"><img src="images/orkut.png" border=0 height=145px width=145px alt="orkut"/></a></div>
        
      </div>
      <div id="footerlinks"><a href="index.php" class="footerlinks">Home</a> | <a href="index.php?p=downloadform" class="footerlinks">Download</a> | <a href="index.php?p=uploadform" class="footerlinks">Upload</a> | <a href="index.php?p=postform" class="footerlinks">Forum</a> | <a href="index.php?p=aboutus" class="footerlinks">About Us</a></div>
      <div id="copyrights">© Copyright Information. All Rights Reserved.</div>
      
      
    </div>
  </div>
</div>
</body>
</html>
