<?php

	session_start();
	include '../connect.php';

	if (empty($_SESSION['e_id'])) {
		setcookie('login_error',1,time()+5,'/');
		echo "<script type='text/javascript'> window.location.href = '../index.php';</script>";
	} else {

	$stmt=$pdo->prepare("SELECT * FROM book");
	$stmt->execute();

	$stmt2=$pdo->prepare("SELECT * FROM employee WHERE e_id = ?");
	$stmt2->bindParam(1,$_SESSION['e_id']);
	$stmt2->execute();
	$user=$stmt2->fetch();

	$stmt3=$pdo->prepare("SELECT * FROM publisher");
	$stmt3->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="../css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="../css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body class="fixed-sn pink-skin" style="background-color: #eeeeee;">

	<header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed">
            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light">
                        <a href="employee_home.php"><p class="text-white text-center" style="font-size: 24px;">Select Book</p></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                      <li class="mb-2">
                        <a href="employee_home.php" class="waves-effect" style="font-size: 18px;"><i class="fas fa-home"></i>&nbsp; Home </a>
                      </li>

                        <li class="mb-2">
                          <a data-target="#add_book" data-toggle="modal" class="collapsible-header waves-effect" style="font-size: 18px;"><i class="fas fa-book"></i>&nbsp; เพิ่มหนังสือ</a> 
                        </li>

                         <li class="mb-2" >
                          <a class="collapsible-header waves-effect arrow-r" style="font-size: 16px;"><i class="fas fa-shopping-cart"></i>&nbsp; สั่งซื้อและขายสินค้า <i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="order.php" class="waves-effect" style="font-size: 14px;"><i class="fas fa-shopping-cart"></i>&nbsp; สั่งซื้อหนังสือกับสำนักพิมพ์</a>
                                    </li>
                                    <li><a href="sales.php" class="waves-effect" style="font-size: 14px;"><i class="fas fa-shopping-cart"></i>&nbsp; ขายสินค้า</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                         <li class="mb-2">
                          <a href="order_list.php" class="collapsible-header waves-effect "style="font-size: 16px;"><i class="fas fa-cash-register"></i>&nbsp; รายการขายสินค้าทั้งหมด </a>
                        </li>

                         <li class="mb-2">
                          <a href="order_list_publisher.php" class="collapsible-header waves-effect "style="font-size: 16px;"><i class="fas fa-cash-register"></i>&nbsp; รายการสั่งซื้อจากสำนักพิมพ์ </a>
                        </li>

                        <li class="mb-2">
                          <a href="customer_list.php" class="collapsible-header waves-effect "style="font-size: 18px;"><i class="fas fa-user"></i>&nbsp; สมาชิกลูกค้า </a>
                        </li>

                        <li class="mb-2">
                          <a href="employee_list.php" class="collapsible-header waves-effect "style="font-size: 18px;"><i class="fas fa-user-tie"></i>&nbsp; สมาชิกพนักงาน </a>
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
                <a href="employee_home.php" class="btn btn-outline-light"> Select Book </a>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle btn btn-light btn-rounded waves-effect" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
			          aria-haspopup="true" aria-expanded="false">&nbsp;
			          <i class="fas fa-user"></i>&nbsp;&nbsp; <?=$_SESSION['e_name']?> <?=$user['e_surname']?>&nbsp;</a>
			        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
			          <a class="dropdown-item" data-target="#profile" data-toggle="modal">My account</a>
			          <a class="dropdown-item" href="employee_logout.php">Log out</a>
			        </div>
		      </li>
            </ul>
        </nav>

       <!-- Modal profile -->
        <form action="edit_profile.php" method="post">
        	<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <!-- Change class .modal-sm to change the size of the modal -->
		  <div class="modal-dialog modal-md" role="document">
		    <div class="modal-content">
		      <div class="modal-header danger-color">
		        <h4 class="modal-title text-center white-text  w-100" id="myModalLabel">Profile</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="form-group">
		        	<div class="md-form">
		        		<i class="fas fa-user-tie prefix"></i>
		        		<input type="text" id="e_id" name="e_id" class="form-control" required="" readonly="" value="<?=$user['e_id']?>">
		        		<label for="e_id"> รหัสพนักงาน </label>
		        	</div>		        			        	        		
		        </div>
		        <div class="form-row">
		        	<div class="col">
		        		<div class="md-form">
		        			<i class="fas fa-user prefix"></i>
		        			<input type="text" id="e_name" name="e_name" class="form-control" required="" value="<?=$user['e_name']?>">
		        			<label for="e_name"> ชื่อ </label>
		        		</div>		
		        	</div>
		        	<div class="col">
		        		<div class="md-form">
		        			<i class="fas fa-user prefix"></i>
		        			<input type="text" id="e_surname" name="e_surname" class="form-control" required="" value="<?=$user['e_surname']?>">
		        			<label for="e_surname"> นามสกุล </label>
		        		</div>		
		        	</div>
		        </div>
		        <div class="form-row">
		        	<div class="col">
		        		<div class="md-form">
			        		<i class="fas fa-map-marker-alt prefix"></i>
			        		<input type="text" id="e_address" name="e_address" class="form-control" required="" value="<?=$user['e_address']?>">
			        		<label for="e_address"> ที่อยู่ </label>
			        	</div>
		        	</div>
		        	<div class="col">
		        		<div class="md-form">		        		
			        		<input type="text" id="e_district" name="e_district" class="form-control" required="" value="<?=$user['e_district']?>">
			        		<label for="e_district"> จังหวัด </label>
			        	</div>
		        	</div>	     
		        	<div class="col">
		        		<div class="md-form">			        		
			        		<input type="text" id="e_province" name="e_province" class="form-control" required="" value="<?=$user['e_province']?>">
			        		<label for="e_province"> ประเทศ </label>
			        	</div>
		        	</div>	     	        	
		        </div>
		        <div class="form-row">
		        	<div class="col">
		        		<div class="md-form">
		        			<i class="fas fa-map-marked-alt prefix"></i>
			        		<input type="text" id="e_postcode" name="e_postcode" class="form-control" required="" value="<?=$user['e_postcode']?>">
			        		<label for="e_postcode"> รหัสไปรษณีย์ </label>
		        		</div>
		        	</div>
		        	<div class="col">
		        		<div class="md-form">
		        			<i class="fas fa-phone prefix"></i>
			        		<input type="text" id="e_tel" name="e_tel" class="form-control" required="" value="<?=$user['e_tel']?>">
			        		<label for="e_tel"> เบอร์โทรศัพท์ </label>
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
        </form>
        <!-- /.Navbar -->

        <!-- Modal add book -->
		<form action="add_book.php" method="post" style="color: #757575;">
			<div class="modal fade" id="add_book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
						  aria-hidden="true">
				<!-- Change class .modal-sm to change the size of the modal -->
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						 <!-- Material form register -->
						<div class="card">
							<h5 class="card-header info-color white-text text-center py-4">
							<strong>เพิ่มรายการหนังสือ</strong>
							</h5>
							<!--Card content-->
							<div class="card-body px-lg-5 pt-0 my-4">
								<div class="form-row">			            
								    <div class="col">
								        <div class="md-form">
								            <i class="fas fa-book prefix"></i>
								            <input type="text" name="b_name" id="b_name" class="form-control" required="">
								            <label for="b_name">ชื่อหนังสือ</label>
								        </div>
								    </div>
								</div>
								<div class="md-form ">
								    <i class="fas fa-address-book prefix"></i>
								    <input type="text" name="b_author" id="b_author" class="form-control" required="">
								    <label for="b_author">ผู้แต่ง</label>
								</div>
								<div class="form-row">
								    <div class="col-5">
								        <div class="md-form">
								            <i class="fas fa-dollar-sign prefix"></i>
								            <input type="text" name="b_price" id="b_price" class="form-control" required="">
								            <label for="b_price">ราคา</label>
								        </div>
								    </div>
								    <div class="col-1">
								        <div class="md-form">
								            <label for="b_price">บาท</label>
								        </div>
								    </div>
								    <div class="col-5">
								        <div class="md-form">
								            <i class="fas fa-layer-group prefix"></i>
								            <input type="text" name="b_stock" id="b_stock" class="form-control" required="">
								            <label for="b_stock">จำนวนหนังสือ</label>
								        </div>
								    </div>
								    <div class="col-1">
								    	<div class="md-form">
								            <label for="b_stock">เล่ม</label>
								        </div>
								    </div>
								</div>										
							</div>
							<div class="card-footer">
								<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">เพิ่มหนังสือ</button>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</form>

        
    </header>
    <!--/.Double navigation-->

    <main>
    	<div class="container-fluid" style="background-color: #ffffff; border-radius: 20px; padding: 20px;box-shadow: 0px 0px 25px 10px #1e272e; margin-top: 50px; padding: 50px;">
    		<form action="order_book.php" method="post">
    			<div class="card">
    				<h2 class="card-header primary-color white-text text-center py-4">
   				 	<strong>สั่งซื้อหนังสือจากสำนักพิมพ์</strong>
  					</h5>
  					<div class="card-body">
  							<div class="form-row">
  								<div class="col">
  									<div class="md-form">
	  									<i class="fas fa-book prefix"></i>
	  									<input type="text" name="b_name" id="b_name1" class="form-control" required="">
	  									<label for="b_name1">ชื่อหนังสือ</label>
  									</div>  	
  								</div>
  								<div class="col">
  									<div class="md-form">
  										<i class="fas fa-user prefix"></i>
  										<input type="text" name="b_author" id="b_author1" class="form-control" required="">
  										<label for="b_author1"> ผู้แต่ง </label>
  									</div>
  								</div>															
  							</div>
  						<div class="form-row">
  							<div class="col">
  								<div class="md-form">
  									<i class="fas fa-dollar-sign prefix"></i>
  									<input type="number" id="o_price" name="o_price" class="form-control" required="" onkeyup="calc(this)">
  									<label for="o_price"> ราคา </label>
  								</div>
  							</div>
  							<div class="col">
  								<div class="md-form">
  									<i class="fas fa-layer-group prefix"></i>
  									<input type="number" id="o_qty" name="o_qty" class="form-control" required="" onkeyup="calc(this)">
  									<label for="o_qty"> จำนวนที่สั่งซื้อ </label>
  								</div>
  							</div>
  							<script>
						        var x = 0;
						        var y = 0;
						        var z = 0;
						        function calc(obj) {
						            x = document.getElementById("o_price").value;
						            y = document.getElementById("o_qty").value;
						            z = x * y;
						            document.getElementById('o_total').value = z;
						            
						        }
						    </script>
  							<div class="col">
  								<div class="md-form">
  									<i class="fas fa-dollar-sign prefix"></i>
  									<input type="text" id="o_total" name="o_total" class="form-control" readonly="" required="" placeholder="ราคารวมทั้งหมด">				
  								</div>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="text-info"  style="font-size: 18px;"> สำนักพิมพ์ </label>
  							<select class="browser-default custom-select" name="p_id">
									<?php while ($row3=$stmt3->fetch()) { ?>
										<option  id="p_id<?=$row3['p_id']?>" value="<?=$row3['p_id']?>"> <?= $row3['p_name']?> </option>
									<?php } ?>
								</select>
  						</div>
  						<div class="form-group">
  							<div class="md-form">
  								<button type="submit" class="btn btn-outline-primary"> สั่งซื้อหนังสือ </button>
  							</div>
  						</div>
  					</div>
    			</div>
    		</form>
		</div>
    </main>
		
	<!-- Footer -->
    <footer class="page-footer font-small fixed-bottom" style="background: rgba(62, 69, 81, 0.7);">
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">
        © 2019 Copyright: Select Book   
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

	<!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <script type="text/javascript">
        // SideNav Button Initialization
    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    Ps.initialize(sideNavScrollbar);
  </script>

</body>
</html>
<?php } ?>