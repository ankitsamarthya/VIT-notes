<?php    include ('check.inc.php');
?>
<h2>Download Form:</h2>
        </div>
        <div class="midtxt">
          <form action="index.php?p=download" method="post" enctype="multipart/form-data">
            
            <h4>Select Subject:</h4>
            <select name="sub1">
            <option value="cs">Computer Science</option>
            <option value="it">Information Technology</option>
            </select>
            <br/><br/>
                     
            <input type="submit" name="download" value="Load"  />
            <br/><br/>
          </form>