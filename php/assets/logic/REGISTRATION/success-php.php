<html>
<head>
</head>
<body>
    <div>

    <div>
        <?php 
        $fname = $_POST["first_name"];
        $mname = $_POST["middle_name"];
        $lname = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $encrypted_pass = md5($password);
        $type = $_POST["type"];
        $occupation = $_POST["occupation"];
        $number = $_POST["id_number"];
        echo "$fname<br>";
        echo "$mname<br>";
        echo "$lname<br>";
        echo "$email<br>";
        echo "$type<br>";
        echo "$occupation<br>";
        echo "$encrypted_pass<br>";

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ccis";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO accounts (fname, mname, lname, email, pass, occupation, id, position)
        VALUES ('$fname', '$mname', '$lname', '$email', '$encrypted_pass', '$occupation', '$number', '$type')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='details'>SUCCESSFULLY CREATED ACCOUNT</p>";
        } else {
            echo "Error: ".$sql."<br>".$conn->error;
        }
        
        $conn->close();

        ?>
        <form action="index.html" method="post" align='center'>
            <input type="submit" value="GOBACK"></input>
        </form>
        ?>
    </form>
    </div>
</body>    

</html>