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
  include_once("students.php");
  /**
  *@author Jeffrey Takyi-Yeboah

  */
    //1) what is the purpose of this if block
    if(!isset($_REQUEST['studentID'])){
    echo "Please Enter Student ID";
    }
    else if(isset($_REQUEST['studentID'])){
    $studentID=$_REQUEST['studentID'];
    $weight=$_REQUEST['weight'];
    $height = $_REQUEST['height'];
    $bloodtype=$_REQUEST['bloodtype'];

     $obj=new students();
     $r=$obj->addStudentRecord($studentID,$weight,$height,$bloodtype);

       if($r==false){
       echo "Error adding student information";
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
                  <div>StudentID: <input type="text" name="studentID" value=""/></div>
                  <div>Height (cm): <input type="text" name="weight" value=""/>
                  <div>Weight (kg): <input type="text" name="height" value=""/>
                  <div>Bloodtype: <select name="bloodtype">
                    <option value =A>A</option>
                    <option value =B>B</option>
                    <option value =AB>AB</option>
                    <option value =O>O</option>

          </select>
            </div>
            <div>
                  <input type="submit" value="Add">
                      </form>
                    </div>
                  </table>
                </body>
              </html>
