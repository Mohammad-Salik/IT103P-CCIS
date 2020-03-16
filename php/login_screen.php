<!DOCTYPE HTML>
<?php
session_start();
?>
<html>

	<head>
		<title>Malayan Colleges Mindanao</title>
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>


	<body class="is-preload">

		<header id="header">
			<a class="logo" href="index.html">CCIS</a>
		</header>

		<section id="banner">
			<div class="inner">
				<h1>College of Computer and Information Science</h1>
				<p>Official Computer Department in Malayan Colleges Mindanao</p>
			</div>
			<video autoplay loop muted playsinline src="images/test.mp4"></video>
		</section>

		<!-- MAIN LOGIN AREA -->
		<section id="main" class="wrapper">
			<div class="inner">
				<header align="center">

					<!-- PHP CODE -->
					<?php

					// FUNCTION FOR DATABASE LOG IN
					function loginvalidate(){
						$conn = new mysqli("localhost", "root", "", 'db_ccis');
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						$email = $_POST["email"];
						$sql = "SELECT email, pass FROM accounts_tb WHERE email='$email'";
						$result = $conn->query($sql);
						$encrypted_pass = md5($_POST["password"]);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								$db_pass = $row['pass'];
								if ($encrypted_pass == $db_pass){
									return true;
								}else{
									return false;
								}
							}
						}
						$conn->close();
					}

					// CONDITION FOR AUTHORIZATION
					if(isset($_POST['submit'])){

						//LOGIN FAIL HTML
						if(loginvalidate() == false){
							echo 
							"<p> INVALID LOGIN</p>
							 <form method='post'>
							 <input class='button' type='submit' name='reset' value='TRY AGAIN'>
							 </form>
							 <p>No account? Please contact the CCIS officers/dean.</a></p>
							 <a href='guest_announcements.php'>Login as guest</a>";
						}else{

							//LOGIN SUCCESS
							$_SESSION['user'] = $_POST['email'];
							header('Location: admin_announcements.php');
						}

					}else{

						//LOGIN MAIN SCREEN
						echo 
						"<h1>WELCOME TO THE CCIS LOGIN SCREEN</h1>
						 <form method='post'>
							<p>
								MCM EMAIL
								<input class='email' type='text' name='email' required />
							</p>
							<p>
								PASSWORD
								<input class='password' type='password' name='password' required />
							</p>
							<br>
								<input class='button' type='submit' value='LOGIN' name='submit'>
						 </form>
						 <p>
							 No account? Please contact the CCIS officers/dean.
						 </p>
						 <a href='guest_announcements.php'>Login as guest</a>";
					}
					?>
				</header>
			</div>
		</section>

		<!-- FOOTER -->
		<footer id="footer">
			<div class="inner">
				<div class="content">
					<section>
						<h3>Keep in touch with our department</h3>
					</section>
					<section>
						<h4>Follow us on</h4>
						<ul class="plain">
							<li><a href="https://twitter.com/MalayanMindanao?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
								<li><a href="https://www.facebook.com/mcmccis/?hc_ref=ARRrGCjLc1IToVPQt8bLXpx7ktIYRf4ieAAmDuwHv6p8ThsR9PjuFAo_-PAcTJSQZTs&ref=nf_target&__tn__=kC-R"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
						</ul>
					</section>
				</div>
			</div>
		</footer>
					
		<!-- SCRIPTS -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>

</html>