<!DOCTYPE HTML>
<?php
    session_start();
    if (!isset($_SESSION['chat_target'])) {
        $_SESSION['chat_target'] = "null";
        $chat_target = $_SESSION['chat_target'];
    }
    if (!isset($_SESSION['chat_raw'])) {
        $_SESSION['chat_raw'] = "null";
        $chat_raw = $_SESSION['chat_raw'];
    }
	if (!isset($_SESSION['user'])){
		header('Location: login_screen.php');
    }else{
        $conn = new mysqli("localhost", "root", "", "db_ccis");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT id, firstname, lastname, email, friends  FROM accounts_tb";
        $result = $conn->query($sql);
						
        if ($result->num_rows > 0) {    
            while($row = $result->fetch_assoc()) {
                if($_SESSION['user'] == $row['email']){
                    $c_name = "".$row['firstname']." ".$row['lastname']."";
                    $c_id = $row['id'];
                    $c_email = $row['email'];
                }
            }
        } else {
            echo "<h1>INVALID ACCOUNT!</h1>";;
        }
        $conn->close();
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


            
            <!-- MAIN CHAT AREA -->
            <h1 align="center">COMMUNITY PAGE</h1>
			<section class="wrapper">
                <?php
                $conn = new mysqli("localhost", "root", "", "db_ccis");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $user = $_SESSION['user'];
                $sql = "SELECT email, friends  FROM accounts_tb";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row['email'] == $user){
                            $raw_friends = $row['friends'];
                        }
                    }
                }
                $final_friends = (explode("-", $raw_friends));
                $_SESSION['final_friends'] = $final_friends;
                echo "<form method='post'><select name='friend'>";
                foreach($final_friends as $friends){
                    echo "<p><option name='$friends' value='$friends'>$friends</option></p>";
                } echo"</select><input class='button 'type='submit' name='refresh' value='chat'></form>";
                ?>
                <div class="announcement_menu">
                    <button onclick="window.location.href = 'add_friends.php';">ADD FRIENDS</button>
                </div>
                <div class="box-small">
                    <?php
                        if (isset($_POST['refresh'])){
                            if(isset($_POST['send'])){
                                $conn = new mysqli("localhost", "root", "", "db_ccis");
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                $updatedchat = "".$_SESSION['chat_raw']."~$c_name: ".$_POST['newchat']."";
                                $localtarget = $_SESSION['chat_target'];
                                $archivequery = "UPDATE messages_tb SET messages='$updatedchat' WHERE chatname='$localtarget'";
                                if ($conn->query($archivequery) != TRUE) {
                                    echo "Error: ".$sql."<br>".$conn->error;
                                }   

                                $sql = "SELECT id, email FROM accounts_tb";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        if($row['email'] == $_POST['friend']){
                                            $cf_id = $row['id'];
                                        }
                                    }
                                }

                                $sql = "SELECT chatname, messages  FROM messages_tb";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $chatnamelist = (explode(" ",$row['chatname']));
                                        if (($chatnamelist[0] == $c_email && $chatnamelist[1] == $_POST['friend'])||
                                            ($chatnamelist[1] == $c_email && $chatnamelist[0] == $_POST['friend'])){
                                                $_SESSION['chat_target'] = $row['chatname'];
                                                $_SESSION['chat_raw'] = $row['messages'];
                                                $raw_chats = (explode("~", $row['messages']));
                                                foreach ($raw_chats as $chat){
                                                    $chatcontainer = (explode(":", $chat));
                                                    if ($chatcontainer[0] == $c_name){
                                                        echo "<div class='chat2'>
                                                                <img class='profile2' src='assets/images/profiles/$c_id.jpg'>
                                                                <p class='right'>$chat<br></p></div>";
                                                    }else{
                                                        echo "<div class='chat2'>
                                                                <img class='profile1' src='assets/images/profiles/$cf_id.jpg'>
                                                                <p class='left'>$chat<br></p></div>";
                                                    }
                                                }
                                            }
                                    }
                                } else {
                                    echo "0 CHATS IN DATABASE";
                                }
                                $conn->close();
                                echo " 
                                <form method='post'>
                                <input type=hidden name='friend' value='".$_POST['friend']."'>
                                <input type=hidden name='refresh' value='refresh'>
                                <input type='text' name='newchat' required />
                                <input type='submit' name='send' value='send'></form>";

                            }else{
                                $conn = new mysqli("localhost", "root", "", "db_ccis");
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                $sql = "SELECT id, email FROM accounts_tb";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        if($row['email'] == $_POST['friend']){
                                            $cf_id = $row['id'];
                                        }
                                    }
                                }


                                $sql = "SELECT chatname, messages  FROM messages_tb";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $chatnamelist = (explode(" ",$row['chatname']));
                                        if (($chatnamelist[0] == $c_email && $chatnamelist[1] == $_POST['friend'])||
                                            ($chatnamelist[1] == $c_email && $chatnamelist[0] == $_POST['friend'])){
                                                $_SESSION['chat_target'] = $row['chatname'];
                                                $_SESSION['chat_raw'] = $row['messages'];
                                                $raw_chats = (explode("~", $row['messages']));
                                                foreach ($raw_chats as $chat){
                                                    $chatcontainer = (explode(":", $chat));
                                                    if ($chatcontainer[0] == $c_name){
                                                        echo "<div class='chat2'>
                                                                <img class='profile2' src='assets/images/profiles/$c_id.jpg'>
                                                                <p class='right'>$chat<br></p></div>";
                                                    }else{
                                                        echo "<div class='chat2'>
                                                                <img class='profile1' src='assets/images/profiles/$cf_id.jpg'>
                                                                <p class='left'>$chat<br></p></div>";
                                                    }
                                                }
                                            }
                                    }
                                } else {
                                    echo "0 CHATS IN DATABASE";
                                }
                                $conn->close();
                                echo " 
                                <form method='post'>
                                <input type=hidden name='friend' value='".$_POST['friend']."'>
                                <input type=hidden name='refresh' value='refresh'>
                                <input type='text' name='newchat' required />
                                <input type='submit' name='send' value='send'></form>";
                            }
                        }
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