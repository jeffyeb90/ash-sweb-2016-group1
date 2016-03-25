<!DOCTYPE html>
<html>
	<head>
		<title>Edit Medical Complaint</title>
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
					<div class="menuitem">menu 3</div>
					<div class="menuitem">menu 4</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >page menu 1</span>
						<span class="menuitem" >page menu 2</span>
						<span class="menuitem" >page menu 3</span>		
					</div>
<?php
	$strStatusMessage ="Edit Medical Complaint";
	include_once("medicalComplaint.php");
	 $obj=new medicalComplaint();
	$complaintID = $_REQUEST["complaintID"];
	
	$result =$obj->getComplaintByID($complaintID);
	if(!$result){
		echo "Error getting data.";
		exit();

	}
	$row =$obj->fetch();
	print_r($row);
	
?>
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>
					<div id="divContent">
						Content space
						<form action="update.php" method="GET">
						<input type="hidden" name="complaintID" value="<?php echo $row['COMPLAINTID'] ?>">
						<div>Student ID: <input type="text" name="studentID" value="<?php echo $row['STUDENTID'] ?>";/></div>
						<div>Date: <input type="text" name="date" value="<?php echo $row['DATE'] ?>"/>
						<div>Temperature: <input type="text" name="temperature" value="<?php echo $row['TEMPERATURE'] ?>"/>
						<div>Symptoms: <input type="text" name="symptoms" value="<?php echo $row['SYMPTOMS'] ?>"/>
						<div>Diagnosis: <input type="text" name="diagnosis" value="<?php echo $row['DIAGNOSIS'] ?>";/></div>
						<div>Cause: <input type="text" name="cause" value="<?php echo $row['CAUSE'] ?>";/></div>
						<div>Prescription: <input type="text" name="prescription" value="<?php echo $row['PRESCRIPTION'] ?>";/></div>
						<div>Nurse ID: <input type="text" name="nurseID" value="<?php echo $row['NURSEID'] ?>";/></div>
						
						</div>
						
						<input type="submit" name= "save" value="Update">
		</form>							
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	

		

		
