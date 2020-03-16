<html>
    <body>
        <div>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $conn = new mysqli($servername, $username, $password);
            if ($conn->connect_error) {
                die("CONNECTION FAILED: MAKE SURE SQL IS ON");
            }
            $db_selected = mysqli_select_db($conn, "db_ccis");
            if (!$db_selected){
                echo "creating.. <br>";
                $sql_query = "CREATE DATABASE db_ccis";
                if ($conn->query($sql_query) === TRUE){
                    echo "database created <br>";
                }else{
                    echo "error creating database, something went wrong. <br>";
                }
                $conn = new mysqli($servername, $username, $password, "db_ccis");
                $accounts = "CREATE TABLE accounts_tb (
                id TEXT UNIQUE KEY,
                firstname TEXT,
                middlename TEXT,
                lastname TEXT,
                email TEXT UNIQUE KEY,
                pass TEXT,
                occupation TEXT,
                accstatus TEXT,
                position TEXT,
                friends TEXT);
                ";
                $password1 = md5('ADMINCCIS');
                $account1 = "INSERT INTO accounts_tb (id, firstname, middlename, lastname, email, pass, occupation, accstatus, position, friends)
                VALUES ('ADMINID', 'ADMINFIRSTNAME', 'ADMINSECONDNAME', 'ADMINLASTNAME', 'ADMIN@mcm.edu.ph', '$password1', 'faculty', 'active', 'admin', NULL)";

                $announcements = "CREATE TABLE announcement_tb (
                id TEXT UNIQUE KEY,
                author TEXT,
                title TEXT,
                topic TEXT,
                imageurl TEXT UNIQUE KEY,
                stat TEXT);";

                $announce1 = "INSERT INTO announcement_tb (id, author, title, topic, imageurl, stat)
                VALUES ('firstpost', 'ADMIN@mcm.edu.ph', 'FIRST POST', 'Hi! Welcome to the ew website of CCIS! This is the first post in the database.', 'FIRST POST.jpg', 'pinned');";
                
                $albums = "CREATE TABLE albums_tb (
                    id TEXT UNIQUE KEY,
                    author TEXT,
                    title TEXT UNIQUE KEY,
                    directory TEXT,
                    stat TEXT);
                    ";
                $albums1 = "INSERT INTO albums_tb (id, author, title, directory ,stat)
                VALUES ('firstalbum','salik@mcm.edu.ph', 'CCIS PHOTOS', 'albums/CCIS PHOTOS', 'active')";
                
                $messages = "CREATE TABLE messages_tb (
                    chatname TEXT UNIQUE KEY,
                    messages TEXT);
                    ";

                $messaging = "CREATE TABLE messaging_tb (
                    chatID TEXT UNIQUE KEY);
                    ";

                $conn->query($accounts);
                echo "creating accounts_tb..<br>";
                $conn->query($account1);
                $conn->query($announcements);
                echo "creating announcements_tb...<br>";
                $conn->query($announce1);
                $conn->query($albums);  
                echo "creating albums_tb..<br>";
                $conn->query($albums1); 
                $conn->query($messages); 
                echo "creating messages_tb..<br>";
                $conn->query($messaging); 
                echo "creating messaging_tb..<br>";
                echo "all tables initialized<br>";
                
                echo "DATA BASE HAS BEEN CREATED<br>";
                echo "YOU CAN NOW ACCESS THE CCIS WEBSITE<br>";
            }else{
                echo "database has already been initialized, redirecting..";
            }
            $conn->close();
            ?>
        </div>
        <button onclick="window.location.href = 'php/login_screen.php';">OPEN CCIS SITE</button>
    </body>    
</html>