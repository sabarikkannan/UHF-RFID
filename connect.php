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

// Check if the "temperature" key is set in the $_GET array
//if (isset($_GET["temperature"])) {
    //$temperature = $_GET["temperature"];
    
    // Insert data into the database
    //$query = "INSERT INTO iot_project (temperature) VALUES ('$temperature')";
if (isset($_POST["temperature"])) {
        // Your code here
    
    

    //$temperature = 'Q30013072010601799552457913274A2' ;
    $temperature= $_POST["temperature"];
    $sql="INSERT INTO iot_project(temperature) VALUES ('$temperature')";
    

    if (mysqli_query($connect,$sql)) {
        echo "Insertion Success!<br>";
    } else {
        echo "Insertion Failed: " . mysqli_error($connect) . "<br>";
    }

}
?>
</body>
</html>
