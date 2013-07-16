 <?php    include ('check.inc.php');
?>
 <h2>Upload Form:</h2>
        </div>
        <div class="midtxt">
          <form action="index.php?p=upload" method="post" enctype="multipart/form-data">
            
            <h4>Select Subject:</h4>
            <select name="sub">
            <option value="cs">Computer Science</option>
            <option value="it">Information Technology</option>
            </select>
            <br/><br/>
            <h4>File Url (Maxsize - 4MB):</h4><input type="file" name="file" />
            <br/><br/>
           
            <input type="submit" name="upload" value="Upload"  />
            <br/><br/>
          </form>
           
          