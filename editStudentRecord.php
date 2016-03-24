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
	$strStatusMessage ="Edit User";
	include_once("users.php");
	 $obj=new users();
	$usercode = $_REQUEST["usercode"];
	
	$result =$obj->getUserByCode($usercode);
	if(!$result){
		echo "Error getting data.";
		exit();

	}
	$row =$obj->fetch();
	
?>
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>
					<div id="divContent">
						Content space
						<form action="update.php" method="GET">
						<input type="hidden" name="usercode" value="<?php echo $row['USERCODE'] ?>">
						<div>Username: <input type="text" name="username" value="<?php echo $row['USERNAME'] ?>";/></div>
						<div>First Name: <input type="text" name="firstname" value="<?php echo $row['FIRSTNAME'] ?>"/>
						<div>Last Name: <input type="text" name="lastname" value="<?php echo $row['LASTNAME'] ?>"/>
					
						<div>
						
							Permission :
							<?php
							$viewSelect="";
							$addSelect="";
							$deleteSelect="";
							$updateSelect="";
							$perlist=explode(",", $row['PERMISSION']);

							if(in_array("VIEW", $perlist)){
								$viewSelect="checked";
							}
							if(in_array("ADD", $perlist)){
								$addSelect="checked";
							}
							if(in_array("DELETE", $perlist)){
								$deleteSelect="checked";
							}
							if(in_array("UPDATE", $perlist)){
								$updateSelect="checked";
							}
							?>	
							<input <?php echo  $viewSelect ?> type="checkbox" value="VIEW" name="permission[]"  /> View
							<input <?php echo  $addSelect ?> type="checkbox" value="ADD" name="permission[]" /> Add
							<input <?php echo  $updateSelect ?> type="checkbox" value="DELETE" name="permission[]"  /> Delete
							<input <?php echo  $deleteSelect ?> type="checkbox" value="UPDATE" name="permission[]" /> Update

						</div>
						<div>
							<?php
								$enabled="";
								$disabled="";
								$newUser="";
								if($row['STATUS']=="ENABLED"){
									$enabled="checked";
								}
								else if($row['STATUS']=="NEWUSER"){
									$newUser="checked";
								}
								else{
									$disabled="checked";
								}
							?>
							Account Status: <input <?php echo $enabled ?> type="radio" name="status" value="1"/>Enabled
							<input <?php echo $disabled ?> type="radio" name="status" value="0"/>Disabled
							
						</div>
						<div>User Group: 
							<select name="usergroup">
								<?php
									
									include_once("usergroups.php");
									$usergroup= new usergroups();
									$result=$usergroup->getAllUserGroups();

									
									if($result==false){
										
										echo "result is false";
									}else{
										
										while($groupRow=$usergroup->fetch()){
											$selected="";
											if($groupRow["id"]==$row["USERGROUP"]){
												$selected="selected";
											}

											echo "<option $selected value='{$groupRow['id']}'>{$groupRow['name']}</option>";
										}
									}
									
									
								?>				
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

		

		
