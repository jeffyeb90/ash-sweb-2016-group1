<html>
	<head>
		<title>Students' List</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			<!--add validation js script here
		</script>
	</head>
	<body>

		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Application Header
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >page menu 1</span>
						<input type="text" id="txtSearch" />

						<span class="menuitem">search</span>
					</div>
					<?php
					$strStatusMessage="Display Users";

					if(isset($_REQUEST['message'])){
						$strStatusMessage=$_REQUEST['message'];
					}

	?>
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>
					<div id="divContent">
						Content space
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
		echo "Error getting users.";
		exit();
	}

	echo "<table border=1>
		<tr><td>ID</td><td>USER NAME</td><td>FULL NAME</td><td>GENDER</td><td>PHONE NUMBER</td><td>HEIGHT</td><td>WEIGHT</td><td>BLOOD TYPE</td><td>EMERGENCY CONTACT</td><td>CONTROLS</td></tr>";
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
		<td>{$row['HEIGHT']}</td>
		<td>{$row['WEIGHT']}</td>
		<td>{$row['BLOODTYPE']}</td>


		<td>{$row['CONTACTFIRSTNAME']} {$row['CONTACTLASTNAME']}</td>
		<td><a href='editStudentRecord.php?studentID={$row['STUDENTID']}'>Update</a>
		<a href='viewStudentComplaints.php?sid={$row['STUDENTID']}'>View Details</a>
		</td>
		</tr>";

		$counter++;
	}

	echo "</table>";
?>
