<!-- <?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?> -->
<?php
include 'dummy_database.php';
$pdo = Database::connect();

// Fetch distinct departments for the dropdown
$departmentsQuery = 'SELECT DISTINCT department FROM student_information';
$departments = $pdo->query($departmentsQuery)->fetchAll(PDO::FETCH_COLUMN);
?>


<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<meta http-equiv="refresh" content="60">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
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
		
		<title>User Data : ECE FINAL YEAR PROJECT</title>
	</head>
	
	<body>
		<h2>JCE ATTENDANCE</h2>
		<ul class="topnav">
			<li><a href="index.php">Home</a></li>
			<li><a  href="user_data.php">User Data</a></li>
			<li><a class="active" href="out_time.php">Out Time</a></li>
		</ul>
		<br>
		<div class="container">
            <div class="row">
                <h3>OUT TIME</h3>
            </div>
            <!-- Add the search form with the dropdown -->
            <form method="get" action="filtered_data.php">
    <label for="departmentFilter">Filter by Department:</label>
    <select name="departmentFilter" id="departmentFilter">
        <option value="">All Departments</option>
        <?php
        // Populate dropdown with distinct departments
        foreach ($departments as $department) {
            echo '<option value="' . $department . '">' . $department . '</option>';
        }
        ?>
    </select>
    <button type="submit">Search</button>
</form>

        </div>
        <div class="row">
            <table class="table table-striped table-bordered">
                <!-- Your existing table headers -->
                <thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                        <th>REG_NO</th>
                        <th>Name</th>
                        <th>DEPT</th>
                        <th>YEAR</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Modify your SQL query based on the selected department filter
                    $filterDepartment = isset($_GET['departmentFilter']) ? $_GET['departmentFilter'] : null;

                    $sql = 'SELECT outtime.reg_no, student_information.name, student_information.department, student_information.year, outtime.out_time
                            FROM outtime
                            LEFT JOIN student_information ON outtime.reg_no = student_information.reg_no';

                    if (!empty($filterDepartment)) {
                        $sql .= ' WHERE student_information.department = ?';
                    }

                    $stmt = $pdo->prepare($sql);

                    if (!empty($filterDepartment)) {
                        $stmt->bindParam(1, $filterDepartment, PDO::PARAM_STR);
                    }

                    $stmt->execute();

                    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['reg_no'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['department'] . '</td>';
                        echo '<td>' . $row['year'] . '</td>';
                        echo '<td>' . $row['out_time'] . '</td>';
                        echo '</tr>';
                    }
//                     ?>
//                   </tbody>
// 				</table>
// 			</div>
// 		</div> <!-- /container -->
// 	</body>
// </html>
// <?php
 Database::disconnect();
 ?>