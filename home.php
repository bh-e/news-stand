<?php include 'components/authentication.php' ?>     
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/first-navigation.php' ?> 
<?php
    session_start();
    $temp= $_SESSION['user_username']; ?>
<?php include 'controllers/navigation/sidebar.php' ?>   
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
    $tsql = "SELECT * FROM usurl where username='$temp'";
    $result = mysqli_query($database,$tsql) or die(mysqli_error($database)); 
    $url1 = mysqli_fetch_array($result);  
    $val1=$url1['url1'];
    $val2=$url1['url2'];
    $val3=$url1['url3'];
    $ssql = "SELECT * FROM checkb where username='$temp'";
    $result = mysqli_query($database,$ssql) or die(mysqli_error($database));
    $url2 = mysqli_fetch_array($result);
    $business='http://timesofindia.indiatimes.com/rssfeeds/1898055.cms';
    $sports='http://timesofindia.indiatimes.com/rssfeeds/4719148.cms';
    $world='http://timesofindia.indiatimes.com/rssfeeds/296589292.cms';
    $entertainment='http://timesofindia.indiatimes.com/rssfeeds/1081479906.cms';
    $tech='http://timesofindia.indiatimes.com/rssfeeds/5880659.cms';
    $health='http://timesofindia.indiatimes.com/rssfeeds/3908999.cms';
    $fashion='http://timesofindia.indiatimes.com/rssfeeds/2886704.cms';
    if($url2['b']=="b1"){$val4=$business;}else {$val4=" ";}
    if($url2['s']=="s2"){$val5=$sports;}else {$val5=" ";}
    if($url2['w']=="w3"){$val6=$world;}else {$val6=" ";}
    if($url2['e']=="e4"){$val7=$entertainment;}else {$val7=" ";}
    if($url2['t']=="t5"){$val8=$tech;}else {$val8=" ";}
    if($url2['h']=="h6"){$val9=$health;}else {$val9=" ";}
    if($url2['l']=="cb7"){$val10=$fashion;}else {$val10=" ";}

require_once('php/autoloader.php'); 
$feed = new SimplePie();
$feed->set_feed_url(array("$val1","$val2","$val3","$val4","$val5","$val6","$val7","$val8","$val9","$val10"));
// http://www.rssmicro.com/feeds/images.rss','http://zeenews.india.com/malayalam/movies.xml
$feed->init();
$feed->handle_content_type(); ?>
	<?php
	
	foreach ($feed->get_items(1,100) as $item):
	?>
 
		<div class="rss_item_desc" style="padding-left:240px;">
		<?php echo '<div class="col-md-9"><div class="panel panel-default"><div class="panel-heading">'; ?>
			<h2><a href="<?php echo $item->get_permalink();  ?>"><?php echo $item->get_title(); ?></a></h2>
			<p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
			<p><?php echo '</div><div class="panel-body">';echo $item->get_description(); echo "</div><a href='#'><span class='glyphicon glyphicon-thumbs-up'></a>  <span class='glyphicon glyphicon-thumbs-down'></span></div></div>";?></p>
			
		</div> 
 
	<?php endforeach; ?>
    </div>
</div>
