<?php include 'components/authentication.php' ?>     
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/first-navigation.php' ?>     
<?php 
    if($_GET["request"]=="profile-update" && $_GET["status"]=="success"){
        $dialogue="Your profile update was successful! ";
    }
    else if($_GET["request"]=="profile-update" && $_GET["status"]=="unsuccess"){
        $dialogue="Your profile update was not at all successful! ";
    }
    else if($_GET["request"]=="login" && $_GET["status"]=="success"){
        $dialogue="Welcome back again! ";
    }
?>
    <script>
        $.growl("<?php echo $dialogue; ?> ", {
            animate: {
                enter: 'animated zoomInDown',
                exit: 'animated zoomOutUp'
            }								
        });
    </script>
 <?php          
    $sql = "SELECT * FROM user where user_username='$user_username'";
    $result = mysqli_query($database,$sql) or die(mysqli_error($database)); 
    $rws = mysqli_fetch_array($result);
?>   
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12">
            <h1 class="text-center">Welcome to your profile</h1>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <ul class="nav text-center">
                <li><a href="edit-profile.php">Edit your profile</a></li>
                <li><a href="all-users.php">View all users</a></li>
                <li><a href="components/logout.php">Logout</a></li>
	        <li><a href="profile.php?user_username=<?php echo $rws['user_username'];?>">See your profile</a></li>
                <li></li>
                <li></li>
            </ul>
        </div>
   <?php

    	$rss = new DOMDocument();

    	$rss->load('https://news.google.com/?output=rss');

    	$feed = array();

    	foreach ($rss->getElementsByTagName('item') as $node) {

    		$item = array ( 

    			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,

    			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,

    			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,

    			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,

    			);

    		array_push($feed, $item);

    	}

    	$limit = 5;

    	for($x=0;$x<$limit;$x++) {

    		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);

    		$link = $feed[$x]['link'];

    		$description = $feed[$x]['desc'];

    		$date = date('l F d, Y', strtotime($feed[$x]['date']));

    		echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';

    		echo '<small><em>Posted on '.$date.'</em></small></p>';

    		echo '<p>'.$description.'</p>';

    	}

    ?> 
        <div class="col-md-4"></div>
    </div>
</div>
