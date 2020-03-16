<html>
<head>
</head>
<body>
    <div>

    <div>
        <?php 
        $email = $_POST["email"];
        $password = $_POST["password"];
        $encrypted_pass = md5($password);
        $user_exist = false;
        echo "your email: $email<br>";
        echo "encrypted pass: $encrypted_pass <br>";
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ccis";
        

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT email, pass FROM accounts WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $user_exist = true;
                $db_pass = $row['pass'];
            }
        }

        if ($user_exist == true){
            if ($encrypted_pass == $db_pass){
                echo "LOGIN SUCCESS HASH MATCH";
            }else{
                echo "LOGIN FAILED INCORRECT PASSWORD, HASH MISMATCH";
            }
        }else{
            echo "SORRY ACCOUNTS DOES NOT EXIST";
        }
        
        $conn->close();

        ?>
    </form>
    </div>
</body>    

</html>