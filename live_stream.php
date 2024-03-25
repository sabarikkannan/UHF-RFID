<html>
<body>

<?php

$dbname = 'example';
$dbuser = 'root';  
$dbpass = ''; 
$dbhost = 'localhost'; 

$connect = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
mysqli_options($connect, MYSQLI_INIT_COMMAND, "SET SESSION old_passwords=0");


if (!$connect) {
    echo "Error: " . mysqli_connect_error();
    exit();
}

echo "Connection Success!<br><br>";

if (isset($_POST["epc"])) {
    //$temperature = '130720106015' ;
    $epc= $_POST["epc"];
    $sql="INSERT INTO livedata(reg_no) VALUES('$epc')";
    

    if (mysqli_query($connect,$sql)) {
        echo "Insertion Success!<br>";
    } else {
        echo "Insertion Failed: " . mysqli_error($connect) . "<br>";
    }

}
?>
</body>
</html>
