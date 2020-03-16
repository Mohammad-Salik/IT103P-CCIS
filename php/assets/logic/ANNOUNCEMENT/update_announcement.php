<html>
<head>
</head>
<body class="body">
    <div class="box-shadow">
        <h1 align="center">ANNOUNCEMENTS</h1>
        <form action='success-php.php' method='POST' enctype='multipart/form-data'>
            <p>
                TITLE/SUJBECT :  
                <input class="name" type="text" name="title" required />
            </p>
            <p>
                DESCRITPTION :  
                <input class="name" type="text" name="discussion" required />
            </p>
            <p>
                DATE: 
                <input class="calendar" type="date" name="date" required />
            </p>
            <p>
                IMAGE (OPTIONAL) : <input class='button' type='file' name='image'>
            </p>
            <?php
                echo"<input class='button 'type='submit' value='upload'></form>";
            ?>
        </form>
    </div>
</body>    
</html>