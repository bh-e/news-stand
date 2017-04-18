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

    <tr><td><input type="checkbox" name="cb" value="cb1"> Business</td></tr>

     <tr><td></td></tr>

    <tr><td><input type="checkbox" name="cb" value="cb2"> Sport</td></tr>

    <tr><td></td></tr>

    <tr><td><input type="checkbox" name="cb" value="cb3"> World</td></tr>

    <tr><td></td></tr>

    <tr><td><input type="checkbox" name="cb" value="cb4"> Entertainment</td></tr>

    <tr><td></td></tr>

    <tr><td><input type="checkbox" name="cb" value="cb5"> Technology</td></tr>

    <tr><td></td></tr>

    <tr><td><input type="checkbox" name="cb" value="cb6"> Health&Fitness </td></tr>

    <tr><td></td></tr>

<tr><td><input type="checkbox" name="cb1" value="Radio 6"> Fashion </td></tr>
</ul>
</table>
    </div>    
    <div class="col-md-6">
        <div class="form-group float-label-control">
            <label for="">Birthday</label>   
            <input type="date" class="form-control" placeholder="<?php echo $rws['user_dob'];?>" name="user_dob" value="<?php echo $rws['user_dob'];?>" required>
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
