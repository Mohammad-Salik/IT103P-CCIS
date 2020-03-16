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
	</head>

	<body class="is-preload">


		<!--- HEADING --->
		<section class="wrapper2">
			<header class="special">
				<h2>RESTORE ARCHIVED ALBUMS PAGE</h2>
			<header>
		</section>

		<!--- MAIN SCREEN OF ANNOUNCEMENTS --->
		<div class="announcement_menu">
			<button onclick="window.location.href = 'admin_gallery.php';">BACK</button>
		</div>

		<!-- <section class="wrapper">
                <div class="box-shadow"> -->

                    <form action="archive_albums_success.php" method="post">
					<!---DATABASE CODE --->
					<?php 
						$conn = new mysqli("localhost", "root", "", "db_ccis");
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						$sql = "SELECT id, author, directory, title, stat  FROM albums_tb";
						$result = $conn->query($sql);
						//ARCHIVING ANNOUNCEMENTS
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								if ($row['stat'] == 'archived'){
									echo '<p class="identifier">
										 <input type="checkbox" name="'.$row['id'].'">';
									echo "TITLE: ".$row['title']." ID:".$row['id']."";
									echo '</p>';
								}
							
							}
						} else {
							echo "no archived albums";
						}

						$conn->close();
					?>
					<input value="RESTORE ARCHIVED albums" type="submit">
					</form>
				<!-- </div>
		</section> -->

		<!--- SCRIPTS --->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>