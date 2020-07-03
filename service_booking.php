<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
if(!isset($_SESSION["utype"]) || $_SESSION["utype"]!="Consumer")
{
header("location:Signin.php");
}
$con=mysqli_connect("localhost","root","","ServiceDb");
if(mysqli_connect_errno()>0)
{
	echo mysqli_connect_error();
	exit();
}
if(isset($_POST["sbbtn"]))
{
	$emailid=$_SESSION["emailid"];
	$pemailid=$_POST["pemailid"];
	$pname=$_POST["pname"];
	$sid=$_POST["sid"];
	$fdate=$_POST["fdate"];
	$tdate=$_POST["tdate"];
	$rdate=date("Y-m-d");
	$rtime=date("h:i:s a");
	$status="Pending";
	
	$query="insert into service_request(consumer_emailid,provider_emailid,service_id,fdate,tdate,request_date,request_time,status) values(?,?,?,?,?,?,?,?)";
	$stmt=$con->prepare($query);
	$stmt->bind_param("ssisssss",$emailid,$pemailid,$sid,$fdate,$tdate,$rdate,$rtime,$status);
	$stmt->execute();
	$stmt->store_result();
	if($stmt->affected_rows>0)
	{
		$msg="Request is Sent...";
		unset($emailid);
		unset($pemailid);
		unset($pname);
		unset($sid);
		unset($_SESSION["type"]);
			
	}
	else
	{
		$msg="Request is not Sent...";
		
	}
	$con->close();
 }
 
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Online HouseHold Service Portal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong>Household</strong> Service Portal</a>
									
								</header>

							<!-- Banner -->
								<section>
										<h2 id="elements">Service Booking Page</h2>
										<hr class="major" />
										<div class="row gtr-200">
											

											<div class="col-6 col-12-medium">
													<form method="post" action="service_booking.php">
														<div class="row gtr-uniform">
															<div class="col-12">
																<label><h3 style="color:green"><?php isset($msg)?print $msg:print "";?><h3></label>
															</div>
															<div class="col-12">
																<label>Provider Email id</label>
																<input type="text" name="pemailid" id="pemailid" value='<?php isset($_REQUEST["eid"])?print $_REQUEST["eid"]:print ""; ?>' readonly="" required="" placeholder="Provider Email id" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<label>Provider Name</label>
																<input type="text" name="pname" id="pname" value='<?php isset($_REQUEST["pname"])?print $_REQUEST["pname"]:print ""; ?>' readonly="" required="" placeholder="Provider Name" />
															</div>
																<!-- Break -->
															<div class="col-12">
																<label>Service Id</label>
																<input type="text" name="sid" id="sid" value='<?php isset($_REQUEST["sid"])?print $_REQUEST["sid"]:print ""; ?>' readonly="" required="" placeholder="Service Id" />
															</div>
														
															<!-- Break -->
															<div class="col-12">
																<label>Service Type</label>
																<input type="text" name="stype" id="stype" value='<?php isset($_SESSION["type"])?print $_SESSION["type"]:print ""; ?>' readonly="" required="" placeholder="Service Type" />
															</div>
															<!-- Break -->


															<div class="col-12">
																<label>Work From Date</label>
																<input type="date" name="fdate" id="fdate" value="" required="" placeholder="Work From Date" />
															</div>
															<!-- Break -->
															
															<div class="col-12">
																<label>Work To Date</label>
																<input type="date" name="tdate" id="tdate" value="" required="" placeholder="Work To Date" />
															</div>
															<!-- Break -->

														
															
															<div class="col-12">
																<ul class="actions">
																	<li><input type="submit" name="sbbtn" value="Book Service" class="primary" /></li>
																	<li><input type="reset" value="Reset" /></li>
																</ul>
															</div>

															
														</div>
													</form>

													
													

											

											</div>
										</div>

								</section>

							
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<center>
									<img src="images/noimg.png" width="150px" height="150px" style="border-radius: 75px;border:1px solid white;"><br>
									<a href="" onclick="window.open('picupload.html', 'Uploader', 'width=500,height=300,left=100,top=100,scrollbars=no,fullscreen=no,resizable=no');">Edit Profile Picture</a><br><br>
									</center>
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="welcome.html">Homepage</a></li>
										<li>
											<span class="opener">Household Services</span>
											<ul>
												<li><a href="#">Electrician</a></li>
												<li><a href="#">Plumber</a></li>
												<li><a href="#">Carpenter</a></li>
												<li><a href="#">Water Purifier</a></li>
												<li><a href="#">Painter</a></li>
												
												<li><a href="#">Appliance Repair</a></li>
												<li><a href="#">House Cleaning</a></li>
												<li><a href="#">Interior Design</a></li>
												<li><a href="#">Architecturer</a></li>
												<li><a href="#">POP Design</a></li>
												
											</ul>
										</li>
										<li><a href="Consumer_Cpass.html">My Account</a></li>
										<li><a href="">My Services</a></li>
										<li><a href="">Signout</a></li>
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
									
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="mailto:meetigandhi002@gmail.com">meetigandhi002@gmail.com</a></li>
										<li class="icon solid fa-phone">+91 81418 65603</li>
										<li class="icon solid fa-home">302/P.Maneklal (Tirth) Complex,<br />Jalvihar Society,<br />Station Road,<br />Dahod-389151</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; HouseHold Service Portal. All rights reserved. Design By: <a href="mailto:meetigandhi002@gmail.com">Gandhi Meeti S</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>