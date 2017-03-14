<div class="nav-side-menu">
	
    <div class="brand"></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href="#"><i class="fa fa-gift fa-lg"></i>Categories <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="#">World</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Sports</a></li>
                    <li><a href="#">Technologies</a></li>
                    <li><a href="#">Lifestyle</a></li>
                    <li><a href="#">Entertainment</a></li>
                    <li><a href="#">Educaton</a></li>
                    <li><a href="#">Automobile</a></li>
                    
                </ul>
            </ul>
     </div>
</div>

<?php include 'components/authentication.php' 
$feed = new SimplePie('http://debian.org/News/news','cache/');
 
// Set which feed to process.
 
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();?>     
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
1<div class="container">
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
