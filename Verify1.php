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
		$emailid=$_SESSION["veid"];
		$ans=$_POST["ans"];
		if($ans==$_SESSION["ans"])
		{
			require 'PHPMailerAutoload.php';
			$mail=new PHPMailer(); //CREATE NEW OBJECT
			$mail->IsSMTP(); //ENABLE SMTP
			//$mail->SMTPDebug=0; //DEBUG :1=ERRORS AND MESSAGE ,2=MESSAGE ONLY
			$mail->SMTPAuth=true; //AUTHENTICATION ENABLE
			$mail->SMTPSecure='tls'; //tls //SECURE TRANSFER ENABLED
			$mail->Host='smtp.gmail.com';
			$mail->Port=587;
			$mail->Username='householdservice20@gmail.com';
			$mail->Password='ohsp2020#';
			$mail->setFrom('householdservice20@gmail.com','Household Service Portal');
			//$mail->addReplyTo('email','name');
			$mail->Subject="Password Recovery For Household Service Portal";
			$mail->Body="Password is ".$_SESSION["pass"];
			$mail->addAddress($emailid);
			//$mail->addCC('');
			//$mail->addBCC('');
			$mail->WordWrap=50;
			//$mail->addAttachment('/file.doc');
			//$mail->addAttachment('/img.jpg','new.jpg');
			//$mail->isHTML(true);
			if(!$mail->send())
			{
			$msg='Mail error: '.$mail->ErrorInfo;
			}
			else
			{
			$msg='Password Sent to Email Id!';
			unset($_SESSION["pass"]);
			unset($_SESSION["veid"]);
			//unset($_SESSION["ques"]);
			unset($_SESSION["ans"]);
				
			}

		}
		else
		{
			$msg="Invalid Answer";
		}
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
										<h2 id="elements">Verification Page</h2>
										<hr class="major" />
										<div class="row gtr-200">
											

											<div class="col-6 col-12-medium">
													<form method="post" action="verify1.php">
														<div class="row gtr-uniform">
															<div class="col-12">
																<label><h3 style="color:green"><?php isset($msg)?print $msg:print "";?><h3></label>
															</div>
															<div class="col-12">
																<label><?php isset($_SESSION["ques"])?print $_SESSION["ques"]:print ""; ?></label>
																
															</div>
															<!-- Break -->
															<div class="col-12">
																<label>Answer :</label>
																<input type="text" name="ans" id="ans" value="" required="" placeholder="Answer" />
															</div>
															<!-- Break -->
															
															<div class="col-12">
																<ul class="actions">
																	<li><input type="submit" name="sbbtn" value="Get Password" class="primary" /></li>
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