<!DOCTYPE html>
<html>
	<head>
		<title>Edit Student Record</title>
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
	$strStatusMessage ="Edit Student Record";
	include_once("students.php");
	 $obj=new students();
	$studentID = $_REQUEST["studentID"];
	
	$result =$obj->getStudentByID($studentID);
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
						<input type="hidden" name="studentID" value="<?php echo $row['STUDENTID'] ?>">
						<div>Weight: <input type="text" name="weight" value="<?php echo $row['WEIGHT'] ?>";/></div>
						<div>Height: <input type="text" name="height" value="<?php echo $row['HEIGHT'] ?>"/>
						
					
						
						</div>
						<div>Blood Type:
							<select name="bloodtype">
								 <?php
									echo "hello";
									$groupA="";
									$groupB="";
									$groupAB="";
									$groupO="";

									if($row['BLOODTYPE']=='A'){
										$groupA="selected";
										
									}
									else if($row['BLOODTYPE']=='B'){
										$groupB="selected";
										
									}
									else if($row['BLOODTYPE']=='AB'){
										$groupAB="selected";
										
									}
									else{
										
										$groupO="selected";
										
									}

										
									
								?>	 
                   				 <option <?php echo $groupA ?> value =A>A</option>
                   				 <option <?php echo $groupB ?> value =B>B</option>
                   				 <option <?php echo $groupAB ?> value =AB>AB</option>
                    			<option <?php echo $groupO ?> value =O>O</option>
									

          
											
							</select>
						</div>
						<input type="submit" name= "save" value="Update">
		</form>							
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	

		

		
