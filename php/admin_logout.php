<!DOCTYPE HTML>
<?php
	session_start();
	if (!isset($_SESSION['user'])){
		header('Location: login_screen.php');
	}
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

		<!--- PHP RESET USER DATA --->
		<section id="banner">
			<div class="inner">
            <?php
				$username = $_SESSION['user'];
				unset($_SESSION['user']);
				session_destroy();
				echo
				'<form action="login_screen.php" method="post">
					<h1>
						HI! '.$username.'<br>YOU HAVE BEEN SUCCESSFULLY LOGGED OUT
					</h1>
					<input class="button" type="submit" value="MENU">
				 </form>'
			?>
			</div>
		</section>

		<!--- SCRIPTS --->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>