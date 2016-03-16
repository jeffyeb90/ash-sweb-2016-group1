<html>
	<head>
		<title>Add Complaint</title>
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
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						Content space
					<form action="" method="GET">
						<div>
							Student ID: <input type="text" name="studentID">
						</div>
						<div>
							Date of Attendance: <input type="date" name="date">
						</div>
						<div>
							Temperature: <input type="number" name="temp" min="20" max="50" value="37">°C
						</div>
						<div>

							Symptoms: <input type="text" name="symptoms">
						</div>
						Diagnosis: <select name="diagnosis">
							<?php
							include_once("diseases.php");
				      	$disease=new diseases();
				      	$result=$disease->getAllDiseases();

				      	$row=$disease->fetch();
				        		while($row==true){
				          		echo "<option value={$row['DISEASEID']}>{$row['NAME']}</option>";
											$row=$disease->fetch();
				        	}
				      ?>
						</select>
						</div>
						<div>
							Cause: <input type="text" name="cause">
						</div>
						<div>
							prescription: <input type="text" name="prescription">
						</div>
						<div>
							Nurse ID: <input type="text" name="nurseID">
						</div>
						<div>
							<input type="submit" value="Add">
						</div>
					</form>

					</div>
				</td>
			</tr>
		</table>
	</body>
</html>
<?php
  include_once("medicalComplaint.php");
  $complaint=new medicalComplaint();
  if(!isset($_REQUEST['studentID'])){
    exit();
  }
  else{
    $studentID=$_REQUEST['studentID'];
    $date=$_REQUEST['date'];
    $temp=$_REQUEST['temp'];
    $symptoms=$_REQUEST['symptoms'];
    $diagnosis=$_REQUEST['diagnosis'];
    $cause=$_REQUEST['cause'];
    $prescription=$_REQUEST['prescription'];
		$nurseID=$_REQUEST['nurseID'];


    $result=$complaint->addComplaint($studentID, $date, $temp, $symptoms, $diagnosis, $cause, $prescription, $nurseID);
    if($result==false){
      echo "Error";
    }
    else {
      echo "User Added";
    }
  }

?>
