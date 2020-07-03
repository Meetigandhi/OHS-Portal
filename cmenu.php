<!-- Search -->
								<section id="search" class="alt">
									<center>
									<img src='uploads/<?php echo $_SESSION["img"]; ?>' width="150px" height="150px" style="border-radius: 75px;border:1px solid white;">
										
										<br>
										<h4>Welcome <?php echo $_SESSION["name"]; ?></h4>
										<a href="" onclick="window.open('picupload.php', 'Uploader', 'width=500,height=400,left=100,top=100,scrollbars=no,fullscreen=no,resizable=no');">Edit Profile Picture</a><br><br>
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
										<li><a href="welcome.php">Homepage</a></li>
										<li>
											<span class="opener">Household Services</span>
											<ul>
												<li><a href="view_provider.php?type=elect">Electrician</a></li>
												<li><a href="view_provider.php?type=plumb">Plumber</a></li>
												<li><a href="view_provider.php?type=carpen">Carpenter</a></li>
												<li><a href="view_provider.php?type=water">Water Purifier</a></li>
												<li><a href="view_provider.php?type=painter">Painter</a></li>
												
												<li><a href="view_provider.php?type=repaire">Appliance Repair</a></li>
												<li><a href="view_provider.php?type=cleaner">House Cleaning</a></li>
												<li><a href="view_provider.php?type=interior">Interior Design</a></li>
												<li><a href="view_provider.php?type=architecture">Architecturer</a></li>
												<li><a href="view_provider.php?type=pop">POP Design</a></li>
												
											</ul>
										</li>
										<li><a href="Consumer_Cpass.php">My Account</a></li>
										<li><a href="myservices.php">My Services</a></li>
										<li><a href="Signout.php">Signout</a></li>
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