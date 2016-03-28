<!DOCTYPE html>

<html>
	<head>
		<title>Generate Report</title>
		<link rel="stylesheet" href="css/style.css">

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
						<h3>Chart showing frequency of diseses occuring</h3>
						<canvas id="myCanvas" width="1000" height="1000"></canvas>
              <?php
                include_once("medicalComplaint.php");
                $obj=new medicalComplaint;
                $row=$obj->diseaseFrequency();
                $row=$obj->fetch();
								$i=50;
								$y=50;
								$q=60;
								$a=90;
								$var=0;
				        		while($row==true){
											$x=$q+(50*$row['count(DIAGNOSIS)']);
                      echo "
									    <script>
											var c = document.getElementById('myCanvas');
											var ctx = c.getContext('2d');
											ctx.moveTo(50,0);
											ctx.lineTo(50,(50*{$row['count(DIAGNOSIS)']})-50);
											var value=(50*{$row['count(DIAGNOSIS)']})-50;
											ctx.stroke();
												var c = document.getElementById('myCanvas');
												var ctx = c.getContext('2d');
												ctx.font = '15px Arial';
												ctx.fillStyle = 'black';
												ctx.fillText('{$row['NAME']} ({$row['count(DIAGNOSIS)']} students)',$x,$a);

									      var canvas = document.getElementById('myCanvas');
									      var context = canvas.getContext('2d');
									      context.beginPath();
									      context.rect($i, $y, 50*{$row['count(DIAGNOSIS)']}, 50);
									      context.fillStyle = 'orange';
									      context.fill();
									      context.lineWidth = 2;
									      context.strokeStyle = 'black';
									      context.stroke();
									    </script>

											"
                      ;

											$a=$a+50;
											$y=$y+50;
											$row=$obj->fetch();
				        	}
									$v=50;
									$q=0;
									echo "a=$a";
									while($q<20){
									echo "<script>
									var c = document.getElementById('myCanvas');
									var ctx = c.getContext('2d');
									ctx.moveTo(50,$a-40);
									ctx.lineTo(1000,$a-40);
									ctx.fillStyle = 'black';

									ctx.stroke();
									var c = document.getElementById('myCanvas');
									var ctx = c.getContext('2d');
									ctx.font = '15px Arial';
									ctx.fillText('$q',$v,$a);
									</script>";
									$q=$q+1;
									$v=$v+50;
								}
               ?>

					</div>
				</td>
			</tr>
		</table>
	</body>
</html>
