<?php
    session_start();
    $temp= $_SESSION['user_username'];
    ini_set("display_errors",1);
    if(isset($_POST)){
        require '../_database/database.php';
        session_start();
	$user_url1=$_REQUEST['user_dob1'];
	$user_url2=$_REQUEST['user_dob2'];
	$user_url3=$_REQUEST['user_dob3'];
	$checkBox1 =$_POST['ab'];
	$checkBox2 =$_POST['bb'];
	$checkBox3 =$_POST['cb'];
	$checkBox4 =$_POST['db'];
	$checkBox5 =$_POST['eb'];
	$checkBox6 =$_POST['fb'];
	$checkBox7 =$_POST['gb'];
        $sql3="UPDATE user SET user_shortbio='$user_shortbio',user_dob='$user_dob' WHERE user_username = '$temp'";
        $user_username=$_SESSION['user_username'];
        $sql4="INSERT INTO user (user_dob) VALUES ('$user_shortbio','$user_dob') WHERE user_username = $temp";
        $result = mysqli_query($database,"SELECT * FROM user WHERE user_username = '$user_username'");
        $sql5="INSERT INTO usurl (url1,url2,url3,username) VALUES ('$user_url1','$user_url2','$user_url3','$temp')";
	$sql6="INSERT INTO checkb (b,s,w,e,t,h,l,username) VALUES ('$checkBox1','$checkBox2','$checkBox3','$checkBox4','$checkBox5','$checkBox6','$checkBox7','$temp')";
	mysqli_query($database,$sql5)or die(mysqli_error($database));
	mysqli_query($database,$sql6)or die(mysqli_error($database));
         
        if( mysqli_num_rows($result) > 0) {
            mysqli_query($database,$sql3)or die(mysqli_error($database));
            header("location:../edit-profile.php?user_username=$user_username");
        }
        else{
            mysqli_query($database,$sql3)or die(mysqli_error($database));
            header("location:../edit-profile.php?user_username=$user_username");
        }  
    }    
?>
