<?php 
	session_start();
	include '../connect.php';

	if (empty($_SESSION['e_id'])) {
		setcookie('login_error',1,time()+5,'/');
		echo "<script type='text/javascript'> window.location.href = '../index.php';</script>";
	} else {

	$stmt=$pdo->prepare("SELECT * FROM customer");
	$stmt->execute();

	$stmt2=$pdo->prepare("SELECT * FROM employee WHERE e_id = ?");
	$stmt2->bindParam(1,$_SESSION['e_id']);
	$stmt2->execute();
	$user=$stmt2->fetch();


?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Employee Index</title>
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
	</head>
	<body class="fixed-sn pink-skin" style="background-color: #eeeeee;">

		<!--Double navigation-->
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
    		<div class="form-group text-center ">
    			<label class="text-primary text-center" style="font-size: 35px;"> สมาชิกลูกค้า </label>
    		</div><br>
    		<div class="table-responsive text-nowrap">
    			<table class="table table-hover">
	    			<thead class="text-primary text-center">
	    				<tr>
	    					<th style="font-size: 24px;"> รหัสลูกค้า </th>
	    					<th style="font-size: 24px;"> ชื่อ </th>
	    					<th style="font-size: 24px;"> นามสกุล </th>
	    					<th style="font-size: 24px;"> เพศ </th>
	    					<th style="font-size: 24px;"> ที่อยู่ </th>
	    					<th style="font-size: 24px;"> จังหวัด </th>
	    					<th style="font-size: 24px;"> ประเทศ </th>
	    					<th style="font-size: 24px;"> รหัสไปรษณีย์ </th>
	    					<th style="font-size: 24px;"> เบอร์โทรศัพท์ </th>
	    					<th style="font-size: 24px;"> เลขบัตรประจำตัวประชาชน </th>
	    				</tr>
	    			</thead>
	    			<tbody class="text-center">
	    				<?php 
	    					while ($customerList=$stmt->fetch()) { ?>
	    						<tr>
	    							<td style="font-size: 18px;"> <?=$customerList['c_id']?> </td>
	    							<td style="font-size: 18px;"> <?=$customerList['c_name']?> </td>
	    							<td style="font-size: 18px;"> <?=$customerList['c_surname']?> </td>
	    							<td style="font-size: 18px;"> <?=$customerList['gender']?> </td>
	    							<td style="font-size: 18px;"> <?=$customerList['c_address']?> </td>
	    							<td style="font-size: 18px;"> <?=$customerList['c_district']?> </td>
	    							<td style="font-size: 18px;"> <?=$customerList['c_province']?> </td>
	    							<td style="font-size: 18px;"> <?=$customerList['c_postcode']?> </td>
	    							<td style="font-size: 18px;"> <?=$customerList['c_tel']?> </td>
	    							<td style="font-size: 18px;"> <?=$customerList['c_idcard']?> </td>
	    						</tr>
	    					<?php }
	    				?>
	    			</tbody>
	    		</table>
    		</div>   		
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
	<!-- SCRIPTS -->
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

<?php 
	}
?>