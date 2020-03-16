<html>
<head>
</head>
<body>
    <div>

    <div>
        <?php 

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ccis";
        $tablename = "salik_batenga";
        $id = "salik";
        $messages = $_POST["message"];

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO $tablename (id, messages)
        VALUES ('$id', '$messages')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='details'>MESSAGE HAS BEEN SENT</p>";
        } else {
            echo "Error: ".$sql."<br>".$conn->error;
        }
        
        $conn->close();

        ?>
        <form action="index.php" method="post" align='center'>
            <input type="submit" value="GOBACK"></input>
        </form>
    </div>
</body>    

</html>