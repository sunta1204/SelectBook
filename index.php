<!DOCTYPE html>
<html>
<head>
	<title>Select Book</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<!-- Font Awesome -->
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	  <!-- Bootstrap core CSS -->
	  <link href="css/bootstrap.min.css" rel="stylesheet">
	  <!-- Material Design Bootstrap -->
	  <link href="css/mdb.min.css" rel="stylesheet">
	  <!-- Your custom styles (optional) -->
	  <link href="css/style.css" rel="stylesheet">
</head>

<body class="fixed-sn pink-skin" style="background-color: #eeeeee;">

  <!-- Start your project here-->
  <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed">
            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light">
                        <a href="index.html"><p class="text-white text-center" style="font-size: 24px;">Select Book</p></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                      <li class="mb-2">
                        <a href="index.html" class="waves-effect" style="font-size: 18px;"><i class="fas fa-home"></i>&nbsp; Home </a>
                      </li>

                        <li class="mb-2">
                          <a href="gallery.html" class="collapsible-header waves-effect" style="font-size: 18px;"><i class="fas fa-camera-retro"></i>&nbsp;Gallery</a> 
                        </li>

                        <li class="mb-2" >
                          <a class="collapsible-header waves-effect arrow-r" style="font-size: 18px;"><i class="far fa-hand-pointer"></i>&nbsp; Room Type <i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="air_room.html" class="waves-effect" style="font-size: 14px;">Air-conditioned Room</a>
                                    </li>
                                    <li><a href="fan_room.html" class="waves-effect" style="font-size: 14px;">Fan Room</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li  class="mb-2">
                          <a href="location.html" class="collapsible-header waves-effect "style="font-size: 18px;"><i class="fas fa-location-arrow"></i>&nbsp; Location </a>
                        </li>

                        <li class="mb-2">
                          <a href="room_detail.html" class="collapsible-header waves-effect "style="font-size: 18px;"><i class="fas fa-info-circle"></i>&nbsp; Room details </a>
                        </li>

                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <a href="index.html" class="btn btn-outline-light"> Select Book </a>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                  <a class="nav-link"><i class="fas fa-cash-register"></i>&nbsp; <span class="clearfix d-none d-sm-inline-block">Book Room</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="#login" data-toggle="modal" ><i class="fas fa-user"></i>&nbsp; <span class="clearfix d-none d-sm-inline-block">LogIn</span></a>
                </li>    
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->

    	<!-- Modal Login -->
    	<form action="login/login.php" method="post">
    		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  			aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header text-center">
		        <h4 class="modal-title w-100 font-weight-bold">Log in</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body mx-3">
		        <div class="md-form mb-5">
		          <i class="fas fa-envelope prefix grey-text"></i>
		          <input type="text" id="e_id" name="e_id" class="form-control validate">
		          <label data-error="wrong" data-success="right" for="defaultForm-email">Your ID</label>
		        </div>

		        <div class="md-form mb-4">
		          <i class="fas fa-lock prefix grey-text"></i>
		          <input type="password" id="e_tel" name="e_tel" class="form-control validate">
		          <label data-error="wrong" data-success="right" for="defaultForm-pass">Phone Number</label>
		        </div>

		      </div>
		      <div class="modal-footer d-flex justify-content-center">
		        <button class="btn btn-default">Login</button>
		      </div>
		    </div>
		  </div>
		</div>
    	</form>
    	

   <!--Main layout-->
    <main>
        
        <div class="container-fluid text-center" >
            <!--Card-->
            <div class="card card-cascade wider reverse my-4 pb-5">
                <!--Card image-->
                <div class="view view-cascade overlay zoom fadeIn" >
                    <img src="pic/home.jpg" class="img-fluid rounded mx-auto d-block  hoverable" >
                    <a href="">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <!--/Card image-->
                <!--Card content-->
                <div class="card-body card-body-cascade text-center wow fadeIn" data-wow-delay="0.2s">
                    <!--Title-->
                    <h3 class="card-title"><strong>หอพักบ้านวิบูรณ์</strong></h3>
                    <p class="card-text"> โทรศัพท์ 085-0035565 </p>
                    <p class="card-text"> ( คุณลารัลย์ อรุณเดชาชัย ) </p>
                    <a href="gallery.html" class="btn btn-primary btn-lg">Gallery</a>
                    <a href="location.html" class="btn btn-secondary btn-lg">Location</a>
                    <a href="room_detail.html" class="btn btn-default btn-lg">Details</a>
                </div>
                <!--/.Card content-->
            </div>
            <!--/.Card-->
        </div>  
    </main>
    <!--/Main layout-->

    <!-- Footer -->
    <footer class="page-footer font-small fixed-bottom" style="background: rgba(62, 69, 81, 0.7);">
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">
        © 2018 Copyright: Ban Wiboon     
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

  <!-- /Start your project here-->

  	<!-- Footer -->
    <footer class="page-footer font-small fixed-bottom" style="background: rgba(62, 69, 81, 0.7);">
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">
        © 2019 Copyright: Select Book    
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
	<!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript">
        // SideNav Button Initialization
    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    Ps.initialize(sideNavScrollbar);
  </script>

</body>
</html>