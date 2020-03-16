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


            <div class="body-content">
                <h1 align="center">ADD FRIENDS</h1>
				<div class="box-shadow">
                        <?php
                            if (isset($_POST['addfriends'])){
                                $exist = false;
                                $final_friends = $_SESSION['final_friends'];
                                foreach($final_friends as $friends){
                                    if($friends == $_POST['friend']){
                                        $exist = true;
                                    }
                                }
                                if($exist != true){
                                    $conn = new mysqli("localhost", "root", "", "db_ccis");
                                    if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
                                    $usersname = "";
                                    $user = $_SESSION['user'];
                                    $chatID = "$user ".$_POST['friend']."";
                                    $addmessaging = "INSERT INTO messaging_tb (chatID)
                                    VALUES ('$chatID')";

                                    $sql = "SELECT email, firstname, lastname, friends FROM accounts_tb";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            if ($row['email'] == $user){
                                                
                                                $usersname = "".$row['firstname']." ".$row['lastname']."";
                                                if (is_null($row['friends']) == FALSE){
                                                    $string_finalfriends = (implode("-", $final_friends));
                                                    $updatedfriendlist = "".$string_finalfriends."-".$_POST['friend']."";
                                                    $updatequery = "UPDATE accounts_tb SET friends='$updatedfriendlist' WHERE email='$user'";
                                                    if ($conn->query($updatequery) != TRUE) {
                                                        echo '<h1 align="center">SOMETHING WENT WRONG</h1>';
                                                    }
                                                }else{
                                                    $updatedfriendlist = $_POST['friend'];
                                                    $updatequery = "UPDATE accounts_tb SET friends='$updatedfriendlist' WHERE email='$user'";
                                                    if ($conn->query($updatequery) != TRUE) {
                                                        echo '<h1 align="center">SOMETHING WENT WRONG</h1>';
                                                    }
                                                }
                                            }
                                            else if ($row['email'] == $_POST['friend']){
                                                $frenemail = $row['email'];
                                                $friendsname = "".$row['firstname']." ".$row['lastname']."";

                                                if (is_null($row['friends']) == FALSE){
                                                    $updatedfriendlist = "".$row['friends']."-".$user."";
                                                    $updatequery = "UPDATE accounts_tb SET friends='$updatedfriendlist' WHERE email='$frenemail'";
                                                    if ($conn->query($updatequery) != TRUE) {
                                                        echo '<h1 align="center">SOMETHING WENT WRONG</h1>';
                                                    }
                                                }else{
                                                    $updatedfriendlist = "$user";
                                                    $updatequery = "UPDATE accounts_tb SET friends='$updatedfriendlist' WHERE email='$frenemail'";
                                                    if ($conn->query($updatequery) != TRUE) {
                                                        echo '<h1 align="center">SOMETHING WENT WRONG</h1>';
                                                    }
                                                }

                                                if ($conn->query($addmessaging) != TRUE) {
                                                    echo '<h1 align="center">SOMETHING WENT WRONG</h1>';
                                                }
                                                
                                                $messagedraft = "$usersname: has started a chat.~$friendsname: has started a chat.";
                                                $chatname = "$user ".$row['email']."";
                                                
                                                $addfrenquery = "INSERT INTO messages_tb (chatname, messages)
                                                VALUES ('$chatname', '$messagedraft')";

                                                if ($conn->query($addfrenquery) != TRUE) {
                                                    echo '<h1 align="center">SOMETHING WENT? WRONG</h1>';
                                                }else{
                                                    echo '<h1 align="center">SUCCESSFULLY ADDED '.$_POST['friend'].'</h1>';
                                                }

                                            }
                                        }
                                    }
                                    $conn->close();
                                }else{
                                    echo '<h1 align="center">FRIEND HAS ALREADY BEEN ADDED</h1>';
                                }
                            }
                            echo
                            "<form method='post'>
                            <p>MCM EMAIL :<input type='text' name='friend' required /></p>
                            <input type='submit'  name='addfriends' value='ADD'></form>";
						?>
                </div>
                <div class="announcement_menu">
                    <button onclick="window.location.href = 'community.php';">back</button>
                </div>
            </div>



			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>