<?php
include 'dummy_database.php';  // Include your database connection file

$pdo = Database::connect();

// Fetch distinct departments for the dropdown
$departmentsQuery = 'SELECT DISTINCT department FROM student_information';
$departments = $pdo->query($departmentsQuery)->fetchAll(PDO::FETCH_COLUMN);

// Retrieve the selected department filter
$filterDepartment = isset($_GET['departmentFilter']) ? $_GET['departmentFilter'] : null;

// Modify your SQL query based on the selected department filter
$sql = 'SELECT livedata.reg_no, student_information.name, student_information.department, student_information.year, livedata.in_time , outtime.out_time
                			FROM livedata
                			INNER JOIN student_information ON livedata.reg_no = student_information.reg_no
                			LEFT JOIN outtime ON student_information.reg_no = outtime.reg_no';

if (!empty($filterDepartment)) {
    $sql .= ' WHERE student_information.department = ?';
}

$sql .= ' ORDER BY student_information.year';


$stmt = $pdo->prepare($sql);

if (!empty($filterDepartment)) {
    $stmt->bindParam(1, $filterDepartment, PDO::PARAM_STR);
}

$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <!-- Add your additional styles or scripts here -->
    <style>
       html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #4CAF50;
			width: 70%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		.table {
			margin: auto;
			width: 90%; 
		}
		
		thead {
			color: #FFFFFF;
		}
    </style>
    <title>Filtered User Data : ECE FINAL YEAR PROJECT</title>
</head>
<body>
    <h2>JCE ATTENDANCE</h2>
    <ul class="topnav">
        <li><a href="index.php">Home</a></li>
        <li><a href="user_data.php">Attendance Data</a></li>
        <!-- <li><a href="out_time.php">OUT TIME</a></li> -->
        <!-- Add additional navigation links if needed -->
    </ul>
    <br>
    <div class="container">
        <div class="row">
            <h3>Filtered User Data Table</h3>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                        <th>REG_NO</th>
                        <th>Name</th>
                        <th>DEPT</th>
                        <th>YEAR</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['reg_no'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['department'] . '</td>';
                        echo '<td>' . $row['year'] . '</td>';
                        echo '<td>' . $row['in_time'] . '</td>';
                        echo '<td>' . $row['out_time'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
Database::disconnect();
?>
