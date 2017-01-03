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

    	$rss = new DOMDocument();

    	$rss->load('http://wordpress.org/news/feed/');

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
