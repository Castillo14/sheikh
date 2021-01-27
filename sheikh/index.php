<?php 
include_once 'config/Database.php';
include_once 'class/Articles.php';
$database = new Database();
$db = $database->getConnection();

$article = new Articles($db);

$article->id = 0;

$result = $article->getArticles();

include('inc/header.php');

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Sheikh Yousuf</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script type="text/javascript" src="engine1/jquery.js"></script> 
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><a href="index.php"></a></h1>
				<a href="#nav">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">Activities</a></li>
					<li><a href="portfolio.php">Islamic Faith</a></li>
				</ul>
			</nav>

		<!-- Banner -->
		<div class="banner">
			<video autoplay muted loop>
				<source src="islamic.mp4" type="video/mp4">
			</video>
			
			<h2>Sheikh</h2>
		</div>
			<section id="banner">

				
			</section>

		<!-- One -->
			<section id="one" class="wrapper special">
				<div class="inner">
					<article class="feature left">
						<span class="image"><img src="images/NEW/2.jpeg" alt="" style="height: 350px; width: 760px;" /></span>
						<div class="content">
								<?php
								while ($post = $result->fetch_assoc()) {
									$date = date_create($post['created']);					
									$message = str_replace("\n\r", "<br><br>", $post['message']);
									$message = $article->formatMessage($message, 100);
									?>
									<div class="col-md-10 blogShort">
									<h3><a href="view.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>		
									<!-- <em><strong>Published on</strong>: <?php echo date_format($date, "d F Y");	?></em>
									<em><strong>Category:</strong> <a href="#" target="_blank"><?php echo $post['category']; ?></a></em> -->
									<br><br>
									<article>		
									<p><?php echo $message; ?> 	</p>
									</article>
									<!-- <a class="btn btn-blog pull-right" href="view.php?id=<?php echo $post['id']; ?>">READ MORE</a>  -->
									</div>
								<?php } ?>   	

							
							
						</div>
					</article>
					<!-- <article class="feature right">
						<span class="image"><img src="" alt="" /></span>
						<div class="content">
							<h2>Social Media</h2>
							<p></p>
							<ul class="actions">
								<li>
									<a href="https://www.youtube.com/channel/UCpKP8oIcFbzb9krjx_6iC5g/featured" class="fa fa-youtube">Youtube</a><br>
									<a href="https://web.facebook.com/servantofmycreator?_rdc=1&_rdr" class="fa fa-facebook">Facebook</a><br>
									<a href="amrola_mc@yahoo.com" class="fa fa-gmail">Mail</a>
									
								</li>
							</ul>
						</div>
					</article> -->
				</div>
			</section>

		<!-- Two -->
			<!-- <section id="two" class="wrapper special">
				<div class="inner">
					<header class="major narrow">
						<h2>Quran Verse</h2>
					</header>
					<div class="image-grid">
						<a href="#" class="image"><img src="images/3.jpg" alt="" style: height="100%" width="100%"/></a>
						<a href="#" class="image"><img src="images/4.jpg" alt="" style: height="100%" width="100%" /></a>
						<a href="#" class="image"><img src="images/5.jpg" alt="" style: height="100%" width="100%"/></a>
						<a href="#" class="image"><img src="images/6.jpg" alt="" /></a>
					</div>
					<ul class="actions">
						<li><a href="portfolio.html" class="button big alt">Gallery</a></li>
					</ul>
				</div>
			</section> -->

			<!-- <section id="three" class="wrapper special">
				<div class="inner">
					<div class="content">
						<h2>Youtube Videos</h2>
					</div>
					<iframe width="330" height="250" src="https://www.youtube.com/embed/igknbY4dwMg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<iframe width="330" height="250" src="https://www.youtube.com/embed/gaCpI3ccafY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<iframe width="330" height="250" src="https://www.youtube.com/embed/VsBVKPFqhiQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<a href="https://www.youtube.com/channel/UCpKP8oIcFbzb9krjx_6iC5g/featured" class="button big alt">Watch Now..</a>
					</div>
					
				</div>
			</section>
 -->
			<!-- <section id="four" class="wrapper style2 special">
				<div class="inner">
					<header class="major narrow">
						<div class="modal fade" id="contact" role="dialog">
							  <div class="modal-dialog">
								  <div class="modal-content">
									  <form id="contact-form" class="form-horizontal ajax" role="form" action="mailto:amrollah_mc@yahoo.com" method="post">
					  
											<div class="modal-header">
                                            <h2>Contact</h2>
											</div>
											<div class="modal-footer">
												<button class="btn btn-primary" value="1" name="submit" type="submit" id="submit">Click here to Send a Message</button>
											</div>
										</form>
					  
									</div>
								</div>    
							</div>
				</div>
			</section>
 -->
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook">
							<span class="label">Facebook</span>
						</a>	</li>
						<li><a href="#" class="icon fa-twitter">
							<span class="label">Twitter</span>
						</a></li>
						<li><a href="#" class="icon fa-instagram">
							<span class="label">Instagram</span>
						</a></li>
						<li><a href="#" class="icon fa-youtube">
							<span class="label">Youtube</span>
						</a></li>
					</ul>
					<div class="footer">
						<p>Copyright &copy; <?php echo date("Y");?><a href="https://www.yaramay.com/" style="color: darkcyan;">
							YARAMAY COMPUTER MAINTENANCE SERVICES. </a> rights reserved</p>
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
<script>
	$('form.ajax').on('submit', function() {
	var that = $(this),
		url = that.attr('action'),
		type = that.attr('method'),
		data = {};
		
	that.find('[name]').each(function(index, value) {
		var that = $(this),
			name = that.attr('name'),
			value = that.val();
			
		data[name] = value;
	});
		$.ajax({

			url: https://gmail.com,
			type: "POST",
			data: data,
			success: function(response) {
				$('#form-alert').show();
				$('#modal-body-id').hide();
				$('#submit').hide();
				$('#new-message').show();
				
			}
			
	});
		
		return false;
	});

		$(document).ready(function(){
			$('#form-alert').hide();
			$('#new-message').hide();
	
		$("#new-message").click(function(){
			$("#contact-form")[0].reset();
			$('#modal-body-id').show();
			$('#new-message').hide();
			$('#submit').show();
			$('#form-alert').hide();		
		});
	
	});
</script>
	</body>
</html>