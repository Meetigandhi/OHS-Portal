<?php
session_start();
if(isset($_POST["sbbtn"]))
	{
		$con=mysqli_connect("localhost","root","","ServiceDb");
	if(mysqli_connect_errno()>0)
	{
		echo mysqli_connect_error();
		exit();
	}
		$emailid=$_POST["emailid"];
		$query="select question,answer,password from user_table where email_id=?";
		$stmt=$con->prepare($query);
		$stmt->bind_param("s",$emailid);
		$stmt->execute();
		$stmt->store_result();
		if($stmt->num_rows>0)
		{
			$stmt->bind_result($ques,$ans,$pass);
			$stmt->fetch();
		$_SESSION["veid"]=$emailid;
		$_SESSION["ques"]=$ques;
		$_SESSION["ans"]=$ans;
		$_SESSION["pass"]=$pass;
		header("location:Verify1.php");
		}
		else
		{
		$msg="Invalid Email id";
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
									<a href="index.php" class="logo"><strong>Household</strong> Service Portal</a>
									
								</header>

							<!-- Banner -->
								<section>
										<h2 id="elements">Password Recovery Page</h2>
										<hr class="major" />
										<div class="row gtr-200">
											

											<div class="col-6 col-12-medium">
													<form method="post" action="Verify.php">
														<div class="row gtr-uniform">
															<div class="col-12">
																<label><h3 style="color:green"><?php isset($msg)?print $msg:print "";?><h3></label>
															</div>
															<div class="col-12">
																<label>Email Id :</label>
																<input type="email" name="emailid" id="emailid" value="" required="" placeholder="Email id" />
															</div>
															<!-- Break -->

															
															<div class="col-12">
																<ul class="actions">
																	<li><input type="submit" name="sbbtn" value="Verify" class="primary" /></li>
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

							<?php include "menu.php"; ?>


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