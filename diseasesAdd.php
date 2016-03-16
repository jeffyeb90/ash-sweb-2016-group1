<html>
	<head>
		<title>Add Disease</title>
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
						<input type="text" id="txtSearch" />
						<span class="menuitem">search</span>
					</div>
<?php

			$strStatusMessage ="Add disease";
			$name="";

			if(isset($_REQUEST['name'])){
				$name=$_REQUEST['name'];

				include_once("diseases.php");
				$obj=new diseases();
				$r=$obj->addDisease($name);

				if($r==false){
					$strStatusMessage="Error while adding disease";
				}else{
					$strStatusMessage="Disease added";
				}

			}
?>
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>
					<div id="divContent">
						Content space
						<form action="" method="GET">
			<div> Disease: <input type="text" name="name" value="<?php echo $name;  ?>"/></div>

			<input type="submit" value="Add">
		</form>
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>
