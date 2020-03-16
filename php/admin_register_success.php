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
				<nav>
					<a href="#menu">Menu</a>
				</nav>	
			</header>

			<!-- MENU BAR -->
			<nav id="menu">
                <ul class="links">
                    <li><a href="community.php">Community</a></li>
                    <li><a href="admin_announcements.php">Announcements</a></li>
                    <li><a href="admin_gallery.php">Gallery</a></li>
                    <li><a href="admin_register.php">Register</a></li>
                    <li><a href="admin_about.php">About</a></li>
                    <li><a href="admin_logout.php">Logout</a></li>
                </ul>
		    </nav> 
            <section class="wrapper2">
                <header class="special">
                    <h2>REGISTRATION PAGE</h2>
                <header>
			</section>

			<section class="wrapper">
                <div class="box-shadow">
                    <?php 
                        $fname = $_POST["fname"];
                        $mname = $_POST["mname"];
                        $lname = $_POST["lname"];
                        $studID = $_POST["postID"];
                        $email = $_POST["email"];
                        $pass = md5($_POST["pass"]);
                        $occupation = $_POST["occupation"];
                        $position = $_POST["position"];

                        $imageurl = "$studID.jpg";

                        if (move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/profiles/$imageurl") === FALSE){
                            echo "<p class='logo'>Could not move account profile file".htmlentities($_FILES['picture_file']['name'])."\"<br />\n</p>";
                        }

                        $conn = new mysqli("localhost", "root", "", "db_ccis");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "INSERT INTO accounts_tb (id, firstname, middlename, lastname, email, pass, occupation , accstatus, position)
                                VALUES ('$studID', '$fname','$mname', '$lname', '$email', '$pass', '$occupation', 'active', '$position')";

                        if ($conn->query($sql) === TRUE) {
                            echo 
                            "<h1> ACCOUNT REGISTRATION SUCCESS</h1>
                             <form action='admin_register.php' method='POST'>
                             <p><input type='submit' value='OK'></p>
                             </form>";
                        }else{
                            echo 
                            "<h1> ACCOUNT REGISTRATION FAILED</h1>
                             <form action='admin_register.php' method='POST'>
                             <p><input type='submit' value='OK'></p>
                             </form>";
                        }


                    ?>
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

