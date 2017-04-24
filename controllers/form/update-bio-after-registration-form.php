<form action="components/update-bio-after-registration.php" method="post" enctype="multipart/form-data" id="UploadForm" autocomplete="off">
<?php
    $user_username = mysqli_real_escape_string($database,$_REQUEST['user_username']);
    $sql = "SELECT * FROM user WHERE user_username='$user_username'";
    $result = mysqli_query($database,$sql);
    $rws = mysqli_fetch_array($result);
?>
    <div class="col-md-6">
        <u>Select the categories</u><br>
   
    <table>

    <tr><td><input type="checkbox" name="ab" value="b1"> Business</td></tr>

     <tr><td></td></tr>

    <tr><td><input type="checkbox" name="bb" value="s2"> Sport</td></tr>

    <tr><td></td></tr>

    <tr><td><input type="checkbox" name="cb" value="w3"> World</td></tr>

    <tr><td></td></tr>

    <tr><td><input type="checkbox" name="db" value="e4"> Entertainment</td></tr>

    <tr><td></td></tr>

    <tr><td><input type="checkbox" name="eb" value="t5"> Technology</td></tr>

    <tr><td></td></tr>

    <tr><td><input type="checkbox" name="fb" value="h6"> Health&Fitness </td></tr>

    <tr><td></td></tr>

<tr><td><input type="checkbox" name="gb" value="cb7"> Lifestyle </td></tr>
</ul>
</table>
    </div>    
    <div class="col-md-6">
        <div class="form-group float-label-control">
            <label for="">Or you can add your preferred RSS feed URL </label>   
            <input type="date" class="form-control" name="user_dob1"><br>
<input type="date" class="form-control"  name="user_dob2" ><br>
<input type="date" class="form-control"  name="user_dob3" ><br>
        </div>
    </div>          
<?php
    $user_username =  $_POST['user_username'];
?>     
    <hr>                 
    <div class="submit">           
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Save Your Profile</button>
        </center>
    </div>
</form>
