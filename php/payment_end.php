<?php

	require_once(dirname(__FILE__)."/config.inc.php");


$resp='{"id":"14cc376c76cb40d4b723256d95537ead","phone":"+918527483275","email":"test@gmail.com","buyer_name":"Shivesh N","amount":"100.00","purpose":"TEST ME","expires_at":null,"status":"Completed","send_sms":false,"send_email":true,"sms_status":null,"email_status":"Sent","shorturl":null,"longurl":"https:\/\/test.instamojo.com\/@deedgood49\/14cc376c76cb40d4b723256d95537ead","redirect_url":"https:\/\/hoproject.000webhostapp.com\/pay\/insta\/\/payment_end.php","webhook":"https:\/\/hoproject.000webhostapp.com\/pay\/insta\/\/payment_hook.php","payments":[{"payment_id":"MOJO8304005N11134614","status":"Credit","currency":"INR","amount":"100.00","buyer_name":"Shivesh N","buyer_phone":"+918527483275","buyer_email":"test@gmail.com","shipping_address":null,"shipping_city":null,"shipping_state":null,"shipping_zip":null,"shipping_country":null,"quantity":1,"unit_price":"100.00","fees":"1.90","link_slug":null,"link_title":null,"discount_code":null,"discount_amount_off":null,"variants":[],"custom_fields":[],"affiliate_id":null,"affiliate_commission":"0","payment_request":"https:\/\/test.instamojo.com\/api\/1.1\/payment-requests\/14cc376c76cb40d4b723256d95537ead\/","instrument_type":"NETBANKING","failure":null,"created_at":"2018-03-04T04:20:45.815214Z"}],"allow_repeated_payments":false,"customer_id":null,"created_at":"2018-03-04T04:20:24.947712Z","modified_at":"2018-03-04T04:21:12.422369Z"}';

?>

<!DOCTYPE html>
<html>

<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Title -->
	<title>Entrepreneurship Summit 2018, Internship and Job Fair, Competitions | eCell MSIT</title>
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800'
	 rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<!-- Stylesheets -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	 crossorigin="anonymous">
	<link href="../css/fontello.css" rel="stylesheet" type="text/css">
	<link href="../css/flexslider.css" rel="stylesheet" type="text/css">
	<link href="../js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/owl.carousel.css" rel="stylesheet" type="text/css">
	<link href="../css/responsive-calendar.css" rel="stylesheet" type="text/css">
	<link href="../css/chosen.css" rel="stylesheet" type="text/css">
	<link href="../jackbox/css/jackbox.min.css" rel="stylesheet" type="text/css" />
	<link href="../css/cloud-zoom.css" rel="stylesheet" type="text/css" />
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<link href="../css/kushagr.css" rel="stylesheet" type="text/css">
	<link href="../css/style2.css" rel="stylesheet" type="text/css">
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<link href="../css/jackbox-ie8.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../css/ie.css">
		<![endif]-->
	<!--[if gt IE 8]>
		<link href="../css/jackbox-ie9.css" rel="stylesheet" type="text/css" />
		<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" href="../css/fontello-ie7.css">
		<![endif]-->
	<style type="text/css">
		.no-fouc {
			display: none;
		}
	</style>
	<!-- jQuery -->
	<script src="../js/jquery-1.11.0.min.js"></script>
	<script src="../js/jquery-ui-1.10.4.min.js"></script>
	<!-- Preloader -->
	<script src="../js/jquery.queryloader2.min.js"></script>
	<script type="text/javascript">
		$('html').addClass('no-fouc');

		$(document).ready(function () {

			$('html').show();

			var window_w = $(window).width();
			var window_h = $(window).height();
			var window_s = $(window).scrollTop();

			$("body").queryLoader2({
				backgroundColor: '#f2f4f9',
				barColor: '#63b2f5',
				barHeight: 4,
				percentage: false,
				deepSearch: true,
				minimumTime: 1000,
				onComplete: function () {

					$('.animate-onscroll').filter(function (index) {

						return this.offsetTop < (window_s + window_h);

					}).each(function (index, value) {

						var el = $(this);
						var el_y = $(this).offset().top;

						if ((window_s) > el_y) {
							$(el).addClass('animated fadeInDown').removeClass('animate-onscroll');
							setTimeout(function () {
								$(el).css('opacity', '1').removeClass('animated fadeInDown');
							}, 2000);
						}

					});

				}
			});

		});
	</script>
</head>

<body class="sticky-header-on tablet-sticky-header">
	<!-- Container -->
	<div class="container">
		<!-- Header -->
		<header id="header">
			<!-- Main Header -->
			<div id="main-header">
				<div class="container">
					<div class="row">
						<!-- Logo -->
						<div id="logo" class="col-lg-3 col-md-3 col-sm-3">
							<a href="index.html">
								<img src="../img/logo.png" alt="Logo">
							</a>
						</div>
						<!-- /Logo -->
						<!-- Main Quote -->
						<div class="col-lg-5 col-md-4 col-sm-4">
							<blockquote>Formal education will make you a living;
								<br>self-education will make you a fortune.
							</blockquote>
						</div>
						<!-- /Main Quote -->
						
					</div>
				</div>
			</div>
			<!-- /Main Header -->
			<!-- Lower Header -->
			<div id="lower-header">
				<div class="container">
					<div id="menu-button">
						<div>
							<span></span>
							<span></span>
							<span></span>
						</div>
						<span>Menu</span>
					</div>
					<ul id="navigation">
						<!-- Home -->
						<li class="home-button current-menu-item">
							<a href="index.html">
								<i class="icons icon-home"></i>
							</a>
						</li>
						<li>
							<a href="index.html">E-Summit</a>
						</li>
						<li>
							<a href="ifair.html">Internship &amp; Job Fair</a>
						</li>
						<li>
							<a href="competitions.html">Competitions</a>
						</li>
						<li>
							<a href="faqs.html">FAQs & Schedule</a>
						</li>
						<li class="donate-button ">
							<a href="register.html">Buy Tickets</a>
						</li>
						<!-- /Donate -->
					</ul>
				</div>
			</div>
			<!-- /Lower Header -->
		</header>
		

				<?php

$fail=1;
				try {
				    $response = $api->paymentRequestStatus($_GET['payment_request_id']);

				 
				 
				$response=arr2std($response);

				if(sizeof($response->payments)>0){

					if($response->payments[0]->status=="Credit"){

						 

				 ?>


		        <section class="section page-heading">
            <h1>Payment Successful</h1>
        </section>
        <section class="section gray-bg text-center">
            <img src="../img/success.svg" alt="" class="payment-response">
            <h2>

                Your transaction <strong><?php echo $response->id;?> </strong>was successful. Your UID is <strong><?php echo uid($response); ?></strong>. You should receive an email soon. It is advisable to have screenshot of this page.
            </h2>
        </section>

<?php

$fail=0;
						 
					}
					else{
						$fail=1;
					}

				}
					else{
						$fail=1;
					}



				}
				catch (Exception $e) {
					 $response=json_decode($resp); 
 
						$fail=1;
					 

				}


if($fail==1){

?>
        <section class="section page-heading">
            <h1>Payment Failed</h1>
        </section>
        <section class="section gray-bg text-center">
            <img src="img/fail.svg" alt="" class="payment-response">
            <h2>
                It seems like your payment failed or was not complete. Your transaction number is <strong><?php
                  echo $_GET['payment_request_id'];?></strong>. If you think it is a mistake, kindly drop a mail to
                <br>connect@ecellmsit.in.
            </h2>
        </section>
        <?php
}
				 

    ?>







      		<!-- Footer -->
		<footer id="footer">
			<!-- Main Footer -->
			<div id="main-footer">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 animate-onscroll">
						<h4>About eCell MSIT</h4>
						<p>The eCell of MSIT gives innovative geniuses an open platform to gain knowledge about entrepreneurship, startups, ventures
							and the A-B-Cs of building businesses. Our sole aim is to let the concept of entrepreneurship burgeon and evolve.
							Founded in 2014, eCell MSIT works to ignite the spark of risk-taking, responsibility and the creative execution of
							ideas. In February 2017, CNBC India listed us among top 120 eCells in India.
						</p>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 animate-onscroll">
						<h4>Quick Links</h4>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 menu-container">
							<ul class="menu">
								<li>
									<a href="index.html">Home</a>
								</li>
								<li>
									<a href="ifair.html">Internship &amp; Job Fair</a>
								</li>
								<li>
									<a href="competitions.html">Competitions</a>
								</li>
								<li>
									<a href="faqs.html">Schedule</a>
								</li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 menu-container">
							<ul class="menu">
								<li>
									<a href="register.html">Buy Tickets</a>
								</li>
								<li>
									<a href="faqs.html">Schedule</a>
								</li>
								<li>
									<a href="#">Sponsorship Opportunities</a>
								</li>
								<li>
									<a target="_blank" href="https://www.facebook.com/ecellmsit/">Visit Facebook Page</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /Main Footer -->
			<!-- Lower Footer -->
			<div id="lower-footer">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 animate-onscroll">
						<p class="copyright">&copy; 2018 eCell MSIT. All Rights Reserved.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 animate-onscroll">
						<p class="text-center">Developed with &#10084; by
							<br>Kushagr, Hemant &amp; Nikhil.
						</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 animate-onscroll">
						<p class="text-right">Queries? Drop us an
							<a href="mailto:connect@ecellmsit.in">email</a>.
						</p>
					</div>
				</div>
			</div>
			<!-- /Lower Footer -->
		</footer>
		<!-- /Footer -->
	</div>
	<!-- Back To Top -->
	<a href="#" id="button-to-top">
		<i class="icons icon-up-dir"></i>
	</a>
	<!-- /Container -->
	<!-- JavaScript -->
	<!-- Bootstrap -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Modernizr -->
	<script type="text/javascript" src="js/modernizr.js"></script>
	<!-- Sliders/Carousels -->
	<script type="text/javascript" src="../js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<!-- Revolution Slider  -->
	<script type="text/javascript" src="js/revolution-slider/js/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
	<!-- Calendar -->
	<script type="text/javascript" src="js/responsive-calendar.min.js"></script>
	<!-- Raty -->
	<script type="text/javascript" src="../js/jquery.raty.min.js"></script>
	<!-- Chosen -->
	<script type="text/javascript" src="js/chosen.jquery.min.js"></script>
	<!-- jFlickrFeed -->
	<script type="text/javascript" src="../js/jflickrfeed.min.js"></script>
	<!-- InstaFeed -->
	<script type="text/javascript" src="js/instafeed.min.js"></script>
	<!-- Twitter -->
	<script type="text/javascript" src="php/twitter/jquery.tweet.js"></script>
	<!-- MixItUp -->
	<script type="text/javascript" src="../js/jquery.mixitup.js"></script>
	<!-- JackBox -->
	<script type="text/javascript" src="jackbox/js/jackbox-packed.min.js"></script>
	<!-- CloudZoom -->
	<script type="text/javascript" src="js/zoomsl-3.0.min.js"></script>
	<!-- Main Script -->
	<script type="text/javascript" src="js/script.js"></script>
	
	<!--[if lt IE 9]>
		<script type="text/javascript" src="../js/jquery.placeholder.js"></script>
		<script type="text/javascript" src="js/script_ie.js"></script>
		<![endif]-->
</body>

</html>