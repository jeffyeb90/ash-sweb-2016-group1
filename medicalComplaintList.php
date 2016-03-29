<html>
	<head>
		<title>Medical Complaints List</title>
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
					$strStatusMessage="Display Medical Complaints";

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
		<tr><td>COMPLAINT ID</td><td>STUDENT ID</td><td>DATE</td><td>TEMPERATURE</td><td>SYMPTOMS</td><td>DIAGNOSIS</td><td>CAUSE<td>PRESCRIPTION</td><td>NURSE</td><tr>";
		$counter=1;
		$bgcolor ="";
		$style="";
	while($row=$complaint->fetch()){

		
		if($counter%2==0){
			$bgcolor="Coral";
			$style='color:black';
		}
		else{
			$bgcolor = "PapayaWhip";
			$style='color:black';
		}
		
		
		
		echo "<tr bgcolor='$bgcolor' style='$style'>
		<td>{$row['COMPLAINTID']}</td>
		<td>{$row['STUDENTID']}</td>
		<td>{$row['DATE']}</td>
		<td>{$row['TEMPERATURE']}</td>
		<td>{$row['SYMPTOMS']}</td>
		<td>{$row['NAME']}</td>
		<td>{$row['CAUSE']}</td>
		<td>{$row['PRESCRIPTION']}</td>
		<td>{$row['FIRSTNAME']} {$row['LASTNAME']}</td>
		<td><a href='editComplaints.php?complaintID={$row['COMPLAINTID']}'>Update</a>
		<a href='viewComplaintDetails.php?cid={$row['COMPLAINTID']}'>View Details</a>
		</td>
		
		
		</tr>";
		
		$counter++;
		
	
	}
	echo "</table>";
	
?>