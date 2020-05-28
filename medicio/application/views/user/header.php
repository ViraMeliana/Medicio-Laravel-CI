<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Medicio</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- css -->
    <link href="<?php echo base_url() ?>assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>assets2/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>plugins/cubeportfolio/css/cubeportfolio.min.css">
	<link href="<?php echo base_url() ?>assets2/css/nivo-lightbox.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets2/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets2/css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="<?php echo base_url() ?>assets2/css/owl.theme.css" rel="stylesheet" media="screen" />
	<link href="<?php echo base_url() ?>assets2/css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets2/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets2/css/loginaja.css" rel="stylesheet">
	<!-- boxed bg -->
	<link id="bodybg" href="<?php echo base_url() ?>assets2/css/bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="<?php echo base_url() ?>assets2/color/default.css" rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<div id="wrapper">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area">
			<div class="container">
				<div class="row">
				
				</div>
			</div>
		</div>
        <div class="container navigation">
		
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>home">
                    <img src="<?php echo base_url() ?>assets2/img/logo.png" alt="" width="150" height="40" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			  <ul class="nav navbar-nav">
				<li class=""><a href="<?php echo base_url() ?>index.php/user/home">Home</a></li>
				<li><a href="<?php echo base_url() ?>index.php/user/product">Products</a></li>
				<li><a href="<?php echo base_url() ?>index.php/user/cart" >Cart</a></li>
			 <!--	<li><a href="#testimonial">Review</a></li>-->
			 <?php 
			 	if ($this->session->userdata('role')!="0") { ?>
			 		<li >
					<div class="dropdown" style="float:right;">
						<button class="button"><i class="fa fa-user"></i> Login</button>
						<div class="dropdown-content">
						  <a  onclick="document.getElementById('lg').style.display='block'"  >Log in</a>
						  <a  onclick="document.getElementById('rg').style.display='block'" >Register</a>
						</div>
					  </div>
					</li> <?php 
			 	} else { ?>
			 		<li >
					<div class="dropdown" style="float:right;">
						<button class="button"><?php echo $this->session->userdata('user'); ?></button>
						<div class="dropdown-content">
						  <a  href="<?php echo base_url('index.php/user/accountUser') ?>" >Show Account</a>
						  <a  href="<?php echo base_url() ?>index.php/user/Cart/getHistory" >History</a>
						  <a  href="<?php echo base_url() ?>index.php/admin/account/logout" >Log out</a>
						</div>
					  </div>
					</li>
			 		<?php
			 	}
			  ?>
				<div id="lg" class="modal"> 
					<span onclick="document.getElementById('lg').style.display='none'" class="close" title="Close Modal">×</span> 
					<form class="modal-content animate" action="<?php echo base_url() ?>index.php/admin/account/loginAccount" method="POST"> 
						<div class="container"> 
							<h2><b>Login</b></h2>
							<label><b>Username</b></label> <br>
							<input type="text" placeholder="Enter Username" name="username" required> 
							<br>
							<label><b>Password</b></label><br>
							<input type="password" placeholder="Enter Password" name="pwd" required> 
							<br>
							<div class="clearfix"> 
								<button type="button" onclick="document.getElementById('lg').style.display='none'" class="cancelbtn" style="color: white;">Cancel</button> 
								<input type="submit" name="submit" class="lgbtn" style="color: white;" value="Login">
							</div> 
						</div> 
					</form> 
				</div> 
				<div id="rg" class="modal"> 
					<span onclick="document.getElementById('rg').style.display='none'" class="close" title="Close Modal">×</span> 
					<form class="modal-content animate" action="<?php echo base_url() ?>index.php/user/accountUser/add" method="POST"action="/action_page.php"> 
						<div class="container" style="margin-left:100px;"> 
							<h2><b>Register</b></h2>
							<label><b>Username</b></label> <br>
							<input type="text" placeholder="Enter Username" name="username" required> 
							<br>
							<label><b>Email</b></label> <br>
							<input type="email" placeholder="Enter Username" name="email" required> 
							<br>
							<label><b>Password</b></label><br>
							<input type="password" placeholder="Enter Password" name="password" required> 
							<br>
							<label><b>Full Name</b></label><br>
							<input type="text" placeholder="Enter Full Name" name="full_name" required> 
							<br>
							<label><b>Address</b></label><br>
							<input type="text" placeholder="Enter Address" name="address" required> 
							<br>
							<label><b>Phone Number</b></label><br>
							<input type="text" placeholder="Enter Phone Number" name="phone_number" required> 
							<br>
							<input type="text" name="role" value="0" style="display: none;">
							<div class="clearfix"> 
								<button type="button" onclick="document.getElementById('lg').style.display='none'" class="cancelbtn"style="color: white;">Cancel</button> 
								<input type="submit" class="lgbtn"style="color: white;" name="submit" value="Register">
							</div> 
						</div> 
					</form> 
				</div> 
				
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
