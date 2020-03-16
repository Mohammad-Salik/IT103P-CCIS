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
                
            <!--- HEADING --->
            <section class="wrapper2">
                <header class="special">
                    <h2>ARCHIVED ANNOUNCEMENTS</h2>
                <header>
            </section>
			<section class="wrapper">
                <div class="box-shadow">

                <!--- SETTING STATUS TO ARCHIVED --->
                <?php 
                     $conn = new mysqli("localhost", "root", "", "db_ccis");
                     if ($conn->connect_error) {
                         die("Connection failed: " . $conn->connect_error);
                     }
                     $sql = "SELECT id, title  FROM announcement_tb";
                     $result = $conn->query($sql);
             
                     if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if (isset($_POST[$row['id']])){
                                $archiveID = $row['id'];
                                echo "<p>$archiveID archived.</p>";
                                $archivequery = "UPDATE announcement_tb SET stat='archived' WHERE id='$archiveID'";
                                if ($conn->query($archivequery) === FALSE) {
                                    echo "<h1>Record update failed</h1>";
                                }
                            }
                        }
                        echo 
                        "<h1> SUCCESSFULLY ARCHIVED </h1>
                        <form action='admin_announcements.php' method='POST'>
                        <p><input type='submit' value='OK'></p>
                        </form>";  
                     }else{
                        echo 
                            "<h1> NOTHING TO ARCHIVE </h1>
                            <form action='admin_announcements.php' method='POST'>
                            <p><input type='submit' value='OK'></p>
                            </form>";
                     }
                     $conn->close();
                    ?>

                </div>
			</section>

			<!-- SCRIPTS -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

