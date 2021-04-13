<?php
require "header.php";
?>

<header class="header">
    <div class="row">
        <div class="col-md-12 text-center">
   <a class="logo"><img src="img/logo2.png" alt="logo"></a>
   </div>
        <div class="col-md-12 text-center">
            <button type="button" onclick="window.location.href='reservation.php'" class="btn btn-outline-light btn-lg"><em>Make a Reservation Now!</em></button>
        </div>
    </div>
</header>



<!--about us section-->

<section id="aboutus">

 <div class="container">
   <h3 class="text-center"><br><br>Al Massaa Cafe</h3>
   <div class="row">
<!--carousel-->
     <div class="col-sm"><br><br>
      	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
         </ol>
        <div class="carousel-inner">
           <div class="carousel-item active">
             <img class="d-block w-100" src="img/1.jpeg" alt="First slide">
           </div>
           <div class="carousel-item">
           <img class="d-block w-100" src="img/2.jpeg" alt="Second slide">
           </div>
           <div class="carousel-item">
           <img class="d-block w-100" src="img/3 (2).jpeg" alt="Third slide">
           </div>
            <div class="carousel-item">
           <img class="d-block w-100" src="img/4 (2).jpeg" alt="Fourth slide">
           </div>
        </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
       </div><br><br>
     </div>

<!--end of carousel-->

     <div class="col-sm">
    	<div class="arranging"><br><hr>
	<h4 class="text-center">Our Story</h4>
	<p><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br><br></p><hr>
	</div>
     </div>
    </div><br>
  </div>
</section>
<!--end of about us section-->

<div class="header2">
</div>

<!----gallery -->
<div class id="gallery"><br>
    
</div><br><br>
<!----end of gallery -->

<!-- <div class="container" id="reservation">
    <h3 class="text-center"><br><br>Reservation<br><br></h3>
    <img  src="img/16.jpg" class="img-fluid rounded">
    <button type="button" onclick="window.location.href='reservation.php'" class="btn btn-outline-dark btn-block btn-lg">Make a reservation Now!</button>
        
</div><br><br>
 -->
 <div class="container">
    <div class="row">
    <div class="container">
    <h1 class="text-center text-muted">GALLERY</h1>
      <div class="row">
        <div class="col-xs-6 col-sm-3 hover-zoomin">
          <a href="#" title="">
            <img src="img/1.jpeg" alt=""/>
          </a>
          <h4 class="text-center"></h4>
        </div>
        <div class="col-xs-6 col-sm-3 hover-fade">
          <a href="#" title="">
            <img src="img/2.jpeg" alt=""/>
          </a>
          <h4 class="text-center"></h4>
        </div>
        <div class="col-xs-6 col-sm-3 hover-blur">
          <a href="#" title="">
            <img src="img/3 (2).jpeg" alt=""/>
            <h2><span class="text-white"></span></h2>
          </a>
          <h4 class="text-center"></h4>
        </div>
        <div class="col-xs-6 col-sm-3 hover-mask">
          <a href="#" title="">
            <img src="img/9.jpg" alt=""/>
            <h2><span class="glyphicon glyphicon-search"></span></h2>
          </a>
          <h4 class="text-center"></h4>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6 col-sm-3 hover-zoomout">
          <a href="" title="">
          <img src="img/11.jpg" alt="" />
          </a>
          <h4 class="text-center"></h4> 
        </div>
        <div class="col-xs-6 col-sm-3 hover-blurout">
          <a href="#" title="">
            <img src="img/12.jpg" alt=""/>
            <h2><span class="glyphicon glyphicon-search"></span></h2>
          </a>
          <h4 class="text-center"></h4>
        </div>
        <div class="col-xs-6 col-sm-3">
          <div class="overlay-item overlay-effect">
            <img src="img/13.jpg" alt="" />
              <div class="mask">
                <h3></h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus doloremque natus quidem id.
                </p>
                <a href="#" class="btn btn-default">Read More</a>
              </div>
          </div>
          <h4 class="text-center"></h4>
      </div>
        <!-- Hover-Fall Effect-->
        <div class="col-xs-6 col-sm-3">
          <div class="fall-item fall-effect">
                    <img src="img/14.jpg"/>
                    <div class="mask">
                        <h2></h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                        <a href="#" class="btn btn-default">Read More</a>
                    </div>
                </div>
          <h4 class="text-center"></h4>
        </div>
      </div>
    </div>
</div>
</div>
<div class="header2">
</div>

<!-- main page map section-->
<section class="map" id="footer">
    <div class="container">
    <h3 class="text-center"><br><br>Find us!</h3><br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d927764.355521363!2d46.26204453470622!3d24.72415032805542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2sRiyadh%2011564%2C%20Saudi%20Arabia!5e0!3m2!1sen!2sph!4v1614144830852!5m2!1sen!2sph" width="100%" height="250px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        
    
        <div class="row staff">
            <div class="col">
            <h4><strong>Opening Hours</strong></h4>
                       
                <div class="signup-form">
                    <form action="#footer" method="post">
                        <div class="form-group">
                            <label>Enter Date</label>
                            <input type="date" class="form-control" name="date" placeholder="Date" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="check_schedule" class="btn btn-dark btn-block">Check Open Time</button>
                        </div>
                    </form>
                    
<?php

if(isset($_POST['check_schedule'])){
      
require 'includes/dbh.inc.php';
            
$date= $_POST['date'];
 
    $sql = "SELECT * FROM schedule WHERE date = '$date'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
            echo"
                <table class='table table-sm table-striped table-dark text-center'>
                   <thead>
                    <tr>
                    <th scope='col'>Date</th>
                    <th scope='col'>Open Time</th>
                    <th scope='col'>Close Time</th>
                    </tr>
                   </thead>
                   <tbody>
                    <tr>
                    <th scope='row'><em>". $date . "</em></th>
                    <td>".$row['open_time']."</td>
                    <td>".$row['close_time']."</td>
                    </tr>
                   </tbody>
                </table>";
                }
            }
        else{
         echo"
                <table class='table table-striped table-dark text-center'>
                   <thead>
                    <tr>
                    <th scope='col'>Date</th>
                    <th scope='col'>Open Time</th>
                    <th scope='col'>Close Time</th>
                    </tr>
                   </thead>
                   <tbody>
                    <tr>
                    <th scope='row'><em>". $date . "</em></th>
                    <td>12:00</td>
                    <td>00:00</td>
                    </tr>
                   </tbody>
                </table>";
            }
         
   //close connection
   mysqli_close($conn);
}
?>
                        
                </div><br>
            </div>

            <div class="col">
            <h4 class="text-right"><strong>Visit Us</strong></h4>
            <p class="text-right">Al Massaa Cafe<br><i class="fa fa-map-marker"></i>&nbsp;Riyadh, <br>Saudi Arabia <br><br>email: yaramayservices@gmail.com<br>phone: +00 (123) 456 7890</p>
            </div>

	</div>
    </div>
</section>
<!--end of main page map section-->


<?php
require "footer.php";
?>