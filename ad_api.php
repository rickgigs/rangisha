<?php
require 'constants/config.php';
require 'constants/check-login.php';
require 'constants/fetch-ad-info.php';

	if ($logged == "1") {
	   if ($myrole == "admin") {

	   	$preview_allowed = "YES";

	   }else{

	   	if ($myid == $authid) {

	   		$preview_allowed = "YES";

	   	}else{

	   		$preview_allowed = "NO";
	   	}

       

	   }

	}else{

		if ($adstatus == "active") {

			$preview_allowed = "YES";

		}else{

			$preview_allowed = "NO";

		}

	

	}




?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $site_title; ?> - <?php echo $title; ?></title>
<?php
if ($preview_allowed == "YES") {

      $directory = "uploads/ads/$ad_id/";
      $files = scandir ($directory);
      $firstFile = $directory . $files[2];

	?>

	<meta property="og:image" content="http://<?php echo $installation_path; ?>/<?php echo $firstFile; ?>" />
    <meta property="og:image:secure_url" content="https://<?php echo $installation_path; ?>/<?php echo $firstFile; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="<?php echo $title; ?>" />
    <meta property="og:description" content="<?php echo $short_des; ?>" />

    <?php

}

?>

<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../assets/fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="../assets/css/slicknav.css">

<link rel="stylesheet" type="text/css" href="../assets/css/color-switcher.css">

<link rel="stylesheet" type="text/css" href="../assets/css/animate.css">

<link rel="stylesheet" type="text/css" href="../assets/css/owl.carousel.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/main.css">


<link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
<link rel="icon" href="../assets/icon/favicon.ico">
</head>
<body>

<header id="header-wrap">

<div class="top-bar">
<div class="container">
<div class="row">
<div class="col-lg-7 col-md-5 col-xs-12">

<ul class="list-inline">
<li><a style="padding-top:5px;" class="header-top-button"><i class="lni-envelope"></i><?php echo $site_email; ?></a></li>
</ul>

</div>
<div class="col-lg-5 col-md-7 col-xs-12">

<div class="header-top-right float-right">
	<?php
	if ($logged == "1") {
		?>
		<a href="../<?php echo $myrole ; ?>" class="header-top-button"><i class="lni-user"></i> My Account</a> |
       <a href="../logout" class="header-top-button"><i class="lni-enter"></i> Log Out</a>
       <?php

	}else{

		?>
		<a href="../login" class="header-top-button"><i class="lni-lock"></i> Log In</a> |
       <a href="../register" class="header-top-button"><i class="lni-pencil"></i> Register</a>
   <?php

	}

	?>

</div>
</div>
</div>
</div>
</div>


<nav class="navbar navbar-expand-lg bg-white fixed-top scrolling-navbar">
<div class="container">

<div class="navbar-header">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
</button>
<a id="site_logo"  class="navbar-brand"><?php echo $site_title; ?></a>
</div>
<div class="collapse navbar-collapse" id="main-navbar">
<ul class="navbar-nav mr-auto w-100 justify-content-center">
<li class="nav-item">
<a class="nav-link" href="../">
Home
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../listings">
Listings
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../faq">
FAQ
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../contact">
Contact
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../about">
About
</a>
</li>

</ul>
<div class="post-btn">
    <?php
	if ($logged == "1") {
		print '<a class="btn btn-common" href="../'.$myrole.'/upload"><i class="lni-pencil-alt"></i> Post an Ad</a>';

		}else{

		print '<a class="btn btn-common" href="../login"><i class="lni-lock"></i> Login to Post</a>';

		}

      ?>

</div>
</div>
</div>

<ul class="mobile-menu">
<li>
<a class="" href="../">
Home
</a>
<li>
<a href="../listings">
Listings
</a>
<li>
<li>
<a  href="../faq">
FAQ
</a>
<li>
<li>
<a href="../contact">
Home
</a>
<li>
<li>
<a class="about" href="../about">
About
</a>
<li>
</ul>

</nav>

</header>


<div class="page-header" style="background: url(../assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title"><?php echo $title; ?></h2>
<ol class="breadcrumb">
<li><a href="../">Home /</a></li>
<li style="color:white;" class="current"><?php echo $ad_id; ?></li>
</ol>
</div>
</div>
</div>
</div>
</div>

<?php
if ($not_found == "YES") {

	require 'constants/404.php';

}else{

if ($preview_allowed == "YES") {

	?>

	<div class="section-padding">
<div class="container">

<div class="product-info row">
<div class="col-lg-8 col-md-12 col-xs-12">
<div class="ads-details-wrapper">
<div id="owl-demo" class="owl-carousel owl-theme">
	<?php
$dir = 'uploads/ads/'.$ad_id.'/*.png';

$fileList = glob($dir);

foreach($fileList as $filename){
print '
<div class="item">
<div class="">
<img class="img-fluid img-detail" src="../'.$filename.'" alt="">

</div>
<span class="price">'.number_format($price).' '.$currency.'</span>
</div>

';


}


?>

</div>
</div>
<div class="details-box">
<div class="ads-details-info">
<h2><?php echo $title; ?></h2>
<div class="details-meta">
<span><a><i class="lni-alarm-clock"></i> <?php echo $post_date; ?></a></span>
<span><a><i class="lni-map-marker"></i> <?php echo $city; ?></a></span>
<span><a><i class="lni-files"></i> <?php echo $ad_id; ?></a></span>
<span><a>Fixed Price : <strong> <?php echo $fixed; ?></strong></a></span>
</div>
<p class="mb-4"><?php echo $des; ?></p>


</div>
<div class="tag-bottom">
<div class="float-left">
<ul class="advertisement">
<li>
<p><strong><i class="lni-folder"></i> Category :</strong> <a><?php echo $category; ?></a></p>
</li>
<li>
<p><strong><i class="lni-archive"></i> Condition :</strong> <?php echo $adcond; ?></p>
</li>
<li>
<p><strong><i class="lni-package"></i> Brand :</strong> <a href="#"><?php echo $brand; ?></a></p>
</li>
</ul>
</div>
<div class="float-right">
<div class="share">
<div class="social-link">
<a class="facebook" data-toggle="tooltip" data-placement="top" title="Share on facebook" href="<?php echo $fbshare; ?>"><i class="lni-facebook-filled"></i></a>
<a class="twitter" data-toggle="tooltip" data-placement="top" title="Share on twitter" href="<?php echo $twshare; ?>"><i class="lni-twitter-filled"></i></a>
<a class="google" data-toggle="tooltip" data-placement="top" title="Share on google plus" href="<?php echo $gpshare; ?>"><i class="lni-google-plus"></i></a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 col-xs-12">

<aside class="details-sidebar">
<div class="widget">
<h4 class="widget-title">Ad Posted on : <?php echo $post_date; ?></h4>
<div class="agent-inner">
<div class="agent-title">
<div class="agent-photo">
<a href="#">
	<?php 
	if ($avatar == null) {

		print '<img class="user_avatar" src="../assets/img/blank_avatar.png" alt="">';

	}else{
		print '<img class="user_avatar" src="../uploads/avatar/'.$avatar.'" alt="">';

	}

	?>
</div>
<div class="agent-details">
<h3><a href="#"><?php echo $author; ?> <?php if ($verified == "YES") { print '<span class="lni-check-mark-circle"></span>'; } ?></a></h3>
<span><i class="lni-envelope"></i><?php echo $email; ?></span>
</div>
</div>
<?php
if (isset($_SESSION['reply'])) {

if ($_SESSION['reply'] == "012") {
	print '<strong>Your message was not sent</strong>';
}

if ($_SESSION['reply'] == "011") {
	print '<strong>Your message has been sent</strong>';
}

unset($_SESSION['reply']);

}else{

}

?>
<?php
if (isset($_POST["submit"]))
{
$receiver = $_POST ["Receiver"];
$subject = $_POST ["Subject"];
$msg = $_POST ["Message"];
require_once 'vendor/autoload.php';
$messagebird = new MessageBird\Client('vxVOQsyv6NlzFGTFTZJui7iBOCgtj1');
$message = new MessageBird\Objects\Message;
$message->originator = 'RANGISHA';
$message->recipients = [ $receiver ];
$message->body = $msg;
$response = $messagebird->messages->create($message);
var_dump($response);
print_r(json_encode($response));

}


?>
<form action="" method="post">
                    <div class="form-group mb-3">
                        <label for="Receiver" class="form-label">Receiver</label>
                        <input type="text" class="form-control" placeholder="Enter Receiver phone number" required name="Receiver" id="Receiver">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" placeholder="Enter Your Subject" required name="Subject" id="Subject">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Message" class="form-label">Message</label>
                        <textarea name="Message"  rows="5" type="text" class="form-control" placeholder="Enter Your Your Message" required name="Subject" id="Subject">Icyi cyangobwa  [<?php echo $title; ?>] nicyange naragitaye nakibona gute  watoraguye [<?php echo $category; ?>] </textarea>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary"  name="submit">Send SMS</button>
                        <button type="reset" class="btn btn-danger"  >Clear Form</button>
                    </div>
                    
                </form>

<!-- <textarea style="resize: none;" class="form-control" name="message" required > Icyi cyangobwa  [<?php echo $title; ?>] nicyange naragitaye nakibona gute</textarea> -->

</div>
</div>

<div class="widget">
<h4 class="widget-title">Send Message Via Whatsapp</h4>
<a href="https://wa.me/250785999950"  text="I'm%20interested%20in%20your%20car%20for%20sale" class="whatsapp_float" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
</div>
<ul class="posts-list">
	<style>
		/* for desktop */
		.widget
		{
			align-items: center;
		}
.whatsapp_float {
	
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	top: 30px;
	background-color:#25d366;
	color:#FFF;

	border-radius:50px;
	text-align:center;
        font-size:30px;
	box-shadow: 2px 2px 3px #999;
        z-index:100;
}

.whatsapp-icon {
	margin-top:15px;
}
/* for mobile */
@media screen and (max-width: 767px){
     .whatsapp-icon {
	 margin-top:10px;
     }
    .whatsapp_float {
        width: 40px;
        height: 40px;
        bottom: 20px;
        right: 10px;
        font-size: 22px;
    }
}
	</style>

	<?php
	try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_ads WHERE author = :author AND ad_id != :adid AND status = 'active' order by rand() LIMIT 6");
$stmt->bindParam(':author', $authid);
$stmt->bindParam(':adid', $ad_id);
$stmt->execute();
$result = $stmt->fetchAll();

    foreach($result as $row)
    {
      $ad_id = $row['ad_id'];
      $directory = "uploads/ads/$ad_id/";
      $files = scandir ($directory);
      $firstFile = $directory . $files[2];

    	?>
    	<li>
<div class="widget-thumb">
<a href="../ad/<?php echo $row['ad_id']; ?>"><img class="more-ads" src="../<?php echo $firstFile; ?>" alt="" /></a>
</div>
<div class="widget-content">
<h4 class="limit-text"><a href="../ad/<?php echo $row['ad_id']; ?>"><?php echo $row['title']; ?></a></h4>
<div class="meta-tag">
<span>
<a><i class="lni-map-marker"></i> <?php echo $row['city']; ?></a>
</span>

</div>
<h4 class="price"><?php echo number_format($row['price']); ?> <?php echo $currency; ?></h4>
</div>
<div class="clearfix"></div>
</li>

<?php
		

	}
					  
	}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


    ?>

</ul>
</div>
</aside>

</div>
</div>

</div>
</div>







	<?php

}else{

	?>
<section class="subscribes section-padding">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="subscribes-inner">
<div class="icon">
<i class="lni-pointer"></i>
</div>

	     <div class="alert alert-danger closeable">
          <h3>This Post is not available for now</h3>
          <p style="margin-left:30px;">The Post <strong><?php echo $title; ?></strong> is waiting for Admin Approval</p>
            <a class="close" href="#"></a>
        </div>


</div>
</div>

</div>
</div>
</section>



	<?php

}

}

?>




<footer>

<section class="footer-Content">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
<div class="widget">
<h3 class="block-title">About</h3>
<div class="textwidget">
<p><?php echo $about_site; ?></p>
</div>
<ul class="mt-3 footer-social">
<li><a class="facebook" href="<?php echo $facebook_link; ?>"><i class="lni-facebook-filled"></i></a></li>
<li><a class="twitter" href="<?php echo $twitter_link; ?>"><i class="lni-twitter-filled"></i></a></li>
<li><a class="instaram" href="<?php echo $instagram_link; ?>"><i class="lni-instagram-filled"></i></a></li>
<li><a class="google-plus" href="<?php echo $googleplus_link; ?>"><i class="lni-google-plus"></i></a></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
<div class="widget">
<h3 class="block-title">Quick Links</h3>
<ul class="menu">
<li><a href="../">- Home</a></li>
<li><a href="../listings">- Listings</a></li>
<li><a href="../faqs">- FAQ's</a></li>
<li><a href="../contact">- Contact</a></li>
<li><a href="../About">- About</a></li>
<li><a href="#">- Developer</a></li>
    <?php
	if ($logged == "1") {
print '<li><a href="./">- My Account</a></li>
       <li><a href="../logout">- Log Out</a></li>';

	}else{
print '<li><a href="../login">- Login</a></li>
       <li><a href="../register">- Register</a></li>';

	}

	?>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
<div class="widget">
<h3 class="block-title">Contact Info</h3>
<ul class="contact-footer">
<li>
<strong><i class="lni-phone"></i></strong><span><?php echo $site_phone; ?></span>
</li>
<li>
<strong><i class="lni-envelope"></i></strong><span><?php echo $site_email; ?></span>
</li>
<li>
<strong><i class="lni-map-marker"></i></strong><span><?php echo $site_address; ?></span>
</li>
</ul>
</div>
</div>
</div>
</div>
</section>



<div id="copyright">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="site-info text-center">
<p>Developed with <i class="lni-heart-filled"></i> by <a target="_blank" href="#" rel="nofollow">Rangish Ltd</a></p>
</div>
</div>
</div>
</div>
</div>

</footer>



<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>

<script src="../assets/js/jquery-min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.counterup.min.js"></script>
<script src="../assets/js/waypoints.min.js"></script>
<script src="../assets/js/wow.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/jquery.slicknav.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/form-validator.min.js"></script>
<script src="../assets/js/contact-form-script.min.js"></script>
<script src="../assets/js/summernote.js"></script>
</body>

</html>