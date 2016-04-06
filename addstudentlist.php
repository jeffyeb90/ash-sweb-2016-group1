<html>
	<head>
		<title>Students' List</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			<!--add validation js script here
		</script>
	</head>
	<body>
					<?php
					$strStatusMessage="Display Students";
					if(isset($_REQUEST['message'])){
						$strStatusMessage=$_REQUEST['message'];
					}


	?>
				  <div class= "position">
						<?php echo  $strStatusMessage ?>

					<form action="" method="GET">
						<input type="text" name="txtSearch">
						<input type="submit" value="search" >

						</form>
					</div>

<?php
	include_once("students.php");
	$student = new students();
	if(isset($_REQUEST['txtSearch'])){
		$result = $student->searchStudents($_REQUEST['txtSearch']);
	}
	else{
		$result = $student->getStudents();
	}
	if($result==false){
		echo "Error getting students.";
		exit();
	}
	echo "<table border=1>
		<tr><td>ID</td><td>USER NAME</td><td>FULL NAME</td><td>GENDER</td><td>PHONE NUMBER</td></tr>";
	$counter = 1;
	$bgcolor="";
	$style="";
	while ($row=$student->fetch()){
		if($counter%2==0){
			$bgcolor="Coral";
			$style="color:black";
		}
		else{
			$bgcolor = "PapayaWhip";
			$style="color:black";
		}
		echo "<tr bgcolor='$bgcolor' style='$style'>
		<td>{$row['STUDENTID']}</td>
		<td>{$row['USERNAME']}</td>
		<td>{$row['FIRSTNAME']} {$row["LASTNAME"]}</td>
		<td>{$row['GENDER']}</td>
		<td>{$row['PHONENUMBER']}</td>
		<td><a href='addStudent.php?add={$row['STUDENTID']}'>Add Record</a></td>

		</tr>";

		$counter++;
	}
	echo "</table>";
?>
