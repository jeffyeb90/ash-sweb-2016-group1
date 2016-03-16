<html>
	<head>
		<title>Users List</title>
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
	include_once("medicalComplaint.php");

	$complaint = new medicalComplaint();

	$result=$complaint->getComplaints();

	if($result==false){
		echo "Error getting Medical Complaints.";
		exit();
	}

	echo "<table border=1>
		<tr><td>COMPLAINT ID</td><td>STUDENT ID</td><td>DATE</td><td>TEMPERATURE</td><td>SYMPTOMS</td><td>DIAGNOSIS</td><td>CAUSE<td><td>PRESCRIPTION</td><td>NURSE</td><tr>";
		$counter=1;
		$bgcolor ="";
		$style="";
	while($row=$complaint->fetch()){

		//$usergroup=
		if($counter%2==0){
			$bgcolor="Coral";
			$style='color:black';
		}
		else{
			$bgcolor = "PapayaWhip";
			$style='color:black';
		}
		
		
		
		echo "<tr bgcolor='$bgcolor' style='$style'>
		<td>{$row['XOMPLAINTID']}</td>
		<td>{$row['STUDENTID']}</td>
		<td>{$row['DATE']}</td>
		<td>{$row['TEMPERATURE']}</td>
		<td>{$row['SYMPTOMS']}</td>
		<td>{$row['DIAGNOSIS']}</td>
		<td>{$row['CAUSE']}</td>
		<td>{$row['PRESCRIPTION']}</td>
		<td>{$row['NURSEID']}</td>
		
		
		</tr>";
		
		$counter++;
		
	
	}
	echo "</table>";
	
?>