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

require_once('php/autoloader.php');
$feed = new SimplePie();
$feed->set_feed_url(array('http://sify.com/rss2/sports/article/category/football'));
$feed->init();
$feed->handle_content_type(); ?>
	<?php
	
	foreach ($feed->get_items() as $item):
	?>
 
		<div class="item">
		<?php echo '<div class="col-md-8"><div class="panel panel-default"><div class="panel-heading">'; ?>
			<h2><img src="https://www.google.com/s2/favicons?domain=http://www.sify.com/" class="img-thumbnail"  width="50" height="50"><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h2>
			<p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
			<p><?php echo '</div><div class="panel-body">';echo $item->get_description(); echo "</div></div>";?></p>
			
		</div>
 
	<?php endforeach; ?>
    </div>
</div>
