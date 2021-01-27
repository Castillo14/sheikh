<!DOCTYPE HTML>
<html>
	<head>
		<title>Sheikh Yousuf</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <style>
      * {
        box-sizing: border-box;
      }
      
      /* Center website */
      .main {
        max-width: 1000px;
        margin: auto;
      }
      
     
      .row {
        margin: 10px -16px;
      }
      
      /* Add padding BETWEEN each column */
      .row,
      .row > .column {
        padding: 8px;
      }
      
      /* Create three equal columns that floats next to each other */
      .column {
        float: left;
        width: 33.33%;
        display: none; /* Hide all elements by default */
      }
      
      /* Clear floats after rows */ 
      .row:after {
        content: "";
        display: table;
        clear: both;
      }
    
      
      /* The "show" class is added to the filtered elements */
      .show {
        display: block;
      }
      
  
      
      
   
      </style>
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
			
			<h2>Islamic</h2>
		</div>
			<section id="banner">

			</section>


	
		<!-- Three -->
			<!-- <section id="three" class="wrapper style3 special">
				<div class="inner">
					<header class="major narrow	">
						<h2>Lorem ipsum dolor sit amet, </h2>
						<p>Ipsum dolor tempus commodo turpis adipiscing Tempor placerat sed amet accumsan</p>
					</header>
					<ul class="actions">
						<li><a href="#" class="button big alt">Magna feugiat</a></li>
					</ul>
				</div>
			</section> -->

		<!-- Four -->
			<!-- <section id="four" class="wrapper style2 special">
				<div class="inner">
					<header class="major narrow">
					
          <h2>PORTFOLIO</h2>
          
          <div id="myBtnContainer">
            <button class="button special small active" onclick="filterSelection('all')"> Show all</button>
            <button class="button small" onclick="filterSelection('tradition')">Tradition</button>
            <button class="button small " onclick="filterSelection('people')"> People</button>
            <button class="button small" onclick="filterSelection('place')">Place</button>
          </div>
          
         
          <div class="row">
            <div class="column tradition">
              <div class="content">
                <img src="images/9.jpg" alt="Tradition" style="width:100%">
                <h4>Tradition</h4>
              </div>
            </div>
            <div class="column tradition">
              <div class="content">
              <img src="images/9.jpg" alt="Tradition" style="width:100%">
                <h4>Tradition</h4>
              </div>
            </div>
            <div class="column tradition">
              <div class="content">
              <img src="images/9.jpg" alt="Tradition" style="width:100%">
                <h4>Tradition</h4>
              </div>
            </div>
            
            <div class="column people">
              <div class="content">
                <img src="images/2.jpg" alt="People" style="width:100%">
                <h4>People</h4>
              </div>
            </div>
            <div class="column people">
              <div class="content">
              <img src="images/2.jpg" alt="People" style="width:100%">
                <h4>People</h4>
              </div>
            </div>
            <div class="column people">
              <div class="content">
              <img src="images/2.jpg" alt="People" style="width:100%">
                <h4>People</h4>
              </div>
            </div>
          
            <div class="column place">
              <div class="content">
                <img src="images/7.jpg" alt="Place" style="width:100%">
                <h4>Place</h4>
              </div>
            </div>
            <div class="column place">
              <div class="content">
              <img src="images/7.jpg" alt="Place" style="width:100%">
                <h4>Place</h4>
              </div>
            </div>
            <div class="column place">
              <div class="content">
              <img src="images/7.jpg" alt="Place" style="width:100%">
                <h4>Place</h4>
              </div>
            </div>
			</section> -->

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<!-- <li><a href="#" class="icon fa-facebook">
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
						</a></li> -->
          </ul>
          <div class="footer">
						<p>Copyright &copy; 2020<?php echo date("Y");?><a href="https://www.yaramay.com/" style="color: darkcyan;">
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
        filterSelection("all")
        function filterSelection(c) {
          var x, i;
          x = document.getElementsByClassName("column");
          if (c == "all") c = "";
          for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
          }
        }
        
        function w3AddClass(element, name) {
          var i, arr1, arr2;
          arr1 = element.className.split(" ");
          arr2 = name.split(" ");
          for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
          }
        }
        
        function w3RemoveClass(element, name) {
          var i, arr1, arr2;
          arr1 = element.className.split(" ");
          arr2 = name.split(" ");
          for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
              arr1.splice(arr1.indexOf(arr2[i]), 1);     
            }
          }
          element.className = arr1.join(" ");
        }
        
        
        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
          });
        }
        </script>
        
	</body>
</html>