<html>
    <body>
        <form method="post">
            
<?php
$txt = "W3Schools.com";
echo "I love $txt!";
?>

<br>

<?php
$x = "Hello world!";
$y = 'Hello world!';
echo $x;
echo "<br>";
echo $y;
?>

<br>

<?php
$var_name1=678;
$var_name2="a678";
$var_name3="678";
$var_name4="W3resource.com";
$var_name5=698.99;
$var_name6=+125689.66;    
$var_name7=true;
$var_name8=1+1;      
echo var_dump($var_name1)."<br>";
echo var_dump($var_name2)."<br>";
echo var_dump($var_name3)."<br>";
echo var_dump($var_name4)."<br>";
echo var_dump($var_name5)."<br>";
echo var_dump($var_name6)."<br>";
echo var_dump($var_name7)."<br>";
echo var_dump($var_name8)."<br>";
echo $var_name1."<br>";
echo $var_name2."<br>";
echo $var_name3."<br>";
echo $var_name4."<br>";
echo $var_name5."<br>";
echo $var_name6."<br>";
echo $var_name7."<br>";
echo $var_name8."<br>";

define("MINSIZE", 50);
echo MINSIZE;
echo constant("MINSIZE");
?>  
        </form>
    </body>
</html>