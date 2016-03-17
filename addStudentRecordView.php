<html>
	<head>
		<title>Add Student Record</title>
		<link rel="stylesheet" href="css/style.css">
		<script>

		</script>
	</head>
	<body>

		<table>
			<tr>
				<td colspan="2" id="pageheader">
				Add Student Record
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
                //initialize

                $studentID="";
                $weight="";
                $height="";
                $bloodtype="";
                  include_once("students.php");
                //1) what is the purpose of this if block
                if(!isset($_REQUEST['studentID'])){
                  exit();
                }
                else{
                  $studentID=$_REQUEST['studentID'];
                  $weight=$_REQUEST['weight'];
                  $height = $_REQUEST['height'];
                  $bloodtype=$_REQUEST['bloodtype'];

                  $obj=new students();
                  $r=$obj->addStudentRecord($studentID,$weight,$height,$bloodtype);
                  //1) what is the purpose of this if block
                  if($r==false){
                    echo "error while adding student information";
                  }else{
                    echo" Student with ID $studentID added";
                  }

                }
          ?>

          <div id="divStatus" class="status">
                    </div>
                    <div id="divContent">
                      Content space
                      <form action="" method="GET">
                  <div>StudentID: <input type="text" name="studentID" value="<?php echo $studentID  ?>"/></div>
                  <div>Height: <input type="text" name="weight" value="<?php echo $weight  ?>"/>
                  <div>Weight: <input type="text" name="height" value="<?php echo $height  ?>"/>
                  <div>Bloodtype: <input type="bloodtype" name="bloodtype"  value="<?php echo $bloodtype  ?>"/></div>
                  <input type="submit" value="Add">
                      </form>
                    </div>
                  </table>
                </body>
              </html>
