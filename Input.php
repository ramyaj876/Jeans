<?php 
	require 'Db_conn.php';

	if (!$conn)
		echo ("Connection successful");
	foreach($_POST as $key => $value){
		//echo($key." ".$value);
		 $$key = $value; //create variable
	}
	if ($ID)
	{
		$sql1 = "Select * from rear_table where ID = ".$_POST["ID"].";";
		$ret1 = $conn->query($sql1);
		$sql2 = "Select * from front_table where ID = ".$_POST["ID"].";";
		$ret2 = $conn->query($sql2);
		$obj1 = $ret1->fetch_assoc(); 
			//echo($obj1["SVG"]);
		if ($ret1->num_rows) {
			$RX0 = $obj1["SPointX"];
			$RY0 = $obj1["SPointY"];
			$RX1 = $obj1["LegOpenX"];
			$RY1 = $obj1["LegOpenY"];
			$RX2 = $obj1["OutseamX"];
			$RY2 = $obj1["OutseamY"];
			$CX0 = $obj1["OutseamCPX"];
			$CY0 = $obj1["OutseamCPY"];
			$RX3 = $obj1["WaistX"];
			$RY3 = $obj1["WaistY"];
			$RX4 = $obj1["BackriseX"];
			$RY4 = $obj1["BackriseY"];
			$CX1 = $obj1["BackriseCPX"];
			$CY1 = $obj1["BackriseCPY"];
			$RX5 = $obj1["InseamX"];
			$RY5 = $obj1["InseamY"];
			$CX2 = $obj1["InseamCPX"];
			$CY2 = $obj1["InseamCPY"];

			$obj2 = $ret2->fetch_assoc(); 
			//echo($obj1["SVG"]);
			$FX0 = $obj2["SPointX"];
			$FY0 = $obj2["SPointY"];
			$FX1 = $obj2["LegOpenX"];
			$FY1 = $obj2["LegOpenY"];
			$FX2 = $obj2["OutseamX"];
			$FY2 = $obj2["OutseamY"];
			$CX3 = $obj2["OutseamCPX"];
			$CY3 = $obj2["OutseamCPY"];
			$FX3 = $obj2["WaistX"];
			$FY3 = $obj2["WaistY"];
			$FX4 = $obj2["FrontriseX"];
			$FY4 = $obj2["FrontriseY"];
			$CX4 = $obj2["FrontriseCPX"];
			$CY4 = $obj2["FrontriseCPY"];
			$FX5 = $obj2["InseamX"];
			$FY5 = $obj2["InseamY"];
			$CX5 = $obj2["InseamCPX"];
			$CY5 = $obj2["InseamCPY"];
		}
		else
		{
			echo "<b>Pattern does not exist.</b>";
			$RX0 = 0;
			$RY0 = 0;
			$RX1 = 0;
			$RY1 = 0;
			$RX2 = 0;
			$RY2 = 0;
			$CX0 = 0;
			$CY0 = 0;
			$RX3 = 0;
			$RY3 = 0;
			$RX4 = 0;
			$RY4 = 0;
			$CX1 = 0;
			$CY1 = 0;
			$CX2 = 0;
			$CY2 = 0;

			$FX0 = 0;
			$FY0 = 0;
			$FX1 = 0;
			$FY1 = 0;
			$FX2 = 0;
			$FY2 = 0;
			$CX3 = 0;
			$CY3 = 0;
			$FX3 = 0;
			$FY3 = 0;
			$FX4 = 0;
			$FY4 = 0;
			$CX4 = 0;
			$CY4 = 0;
			$CX5 = 0;
			$CY5 = 0;
		}	
	}
	else if(!$ID)
		{	
			echo "<b>No ID entered.</b>";
			$RX0 = 0;
			$RY0 = 0;
			$RX1 = 0;
			$RY1 = 0;
			$RX2 = 0;
			$RY2 = 0;
			$CX0 = 0;
			$CY0 = 0;
			$RX3 = 0;
			$RY3 = 0;
			$RX4 = 0;
			$RY4 = 0;
			$CX1 = 0;
			$CY1 = 0;
			$RX5 = 0;
			$RY5 = 0;
			$CX2 = 0;
			$CY2 = 0;

			$FX0 = 0;
			$FY0 = 0;
			$FX1 = 0;
			$FY1 = 0;
			$FX2 = 0;
			$FY2 = 0;
			$CX3 = 0;
			$CY3 = 0;
			$FX3 = 0;
			$FY3 = 0;
			$FX4 = 0;
			$FY4 = 0;
			$CX4 = 0;
			$CY4 = 0;
			$FX5 = 0;
			$FY5 = 0;
			$CX5 = 0;
			$CY5 = 0;	
		}

				
?>


<html>
	<body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
	<script src="userincr.js"></script>
	<script type="text/javascript">
		$(function(){
 			$("input.demo").userincr().data({
  				
  			});
		});
			function SVG() {
		var iframe = getElementById["frame1"]
		alert(iframe.length());
	}
	</script>

	<form method ="post" action = 'Insert.php' >

		<b> Rear coordinates: </b> <br>
		Start: <br>	
		X: <input type="text" class="demo" name = "RX0" value = <?php echo  $RX0; ?>> <t><t><t>	
		Y: <input type="text" class="demo" name = "RY0" value = <?php echo  $RY0; ?>> <br>
	
		Leg Opening:	<br> 
		X: <input type="text" class="demo" name = "RX1" value = <?php echo  $RX1; ?>> <t><t><t>	
		Y: <input type="text" class="demo" name = "RY1" value = <?php echo  $RY1; ?>> <br>
	
		Outseam:	<br> 
		X: <input type="text" class="demo" name = "RX2" value = <?php echo  $RX2; ?>> <t><t><t>	
		Y: <input type="text" class="demo" name = "RY2" value = <?php echo  $RY2; ?>> <br>
		Control X: <input type="text" class="demo" name = "CX0" value = <?php echo  $CX0; ?>> <t><t><t>	
		Control Y: <input type="text" class="demo" name = "CY0" value = <?php echo  $CY0; ?>> <br>
	
		Waist:	<br> 
		X: <input type="text" class="demo" name = "RX3" value = <?php echo  $RX3; ?>> <t><t><t>	
		Y: <input type="text" class="demo" name = "RY3" value = <?php echo  $RY3; ?>> <br>
	
		Backrise:	<br> 
		X: <input type="text" class="demo" name = "RX4" value = <?php echo  $RX4; ?>> <t><t><t>	
		Y: <input type="text" class="demo" name = "RY4" value = <?php echo  $RY4; ?>> <br>
		Control X: <input type="text" class="demo" name = "CX1" value = <?php echo  $CX1; ?>> <t><t><t>	
		Control Y: <input type="text" class="demo" name = "CY1" value = <?php echo  $CY1; ?>> <br>
	
		Inseam:	<br> 
	
		Control X: <input type="text" class="demo" name = "CX2" value = <?php echo  $CX2; ?>> <t><t><t>	
		Control Y: <input type="text" class="demo" name = "CY2" value = <?php echo  $CY2; ?>> <br><br>

		<b>Front Coordinates: </b> <br>

		Start:	<br> 
		X: <input type="text" class="demo" name = "FX0" value = <?php echo  $FX0; ?>> <t><t><t>	
		Y: <input type="text" class="demo" name = "FY0" value = <?php echo  $FY0; ?>> <br>

		Leg Opening:	<br> 
		X: <input type="text" class="demo" name = "FX1" value = <?php echo  $FX1; ?>> <t><t><t>	
		Y: <input type="text" class="demo" name = "FY1" value = <?php echo  $FY1; ?>> <br>

		Outseam:	<br> 
		X: <input type="text" class="demo" name = "FX2" value = <?php echo  $FX2; ?>> <t><t><t>	
		Y: <input type="text" class="demo" name = "FY2" value = <?php echo  $FY2; ?>> <br>
		Control X: <input type="text" class="demo" name = "CX3" value = <?php echo  $CX3; ?>> <t><t><t>	
		Control Y: <input type="text" class="demo" name = "CY3" value = <?php echo  $CY3; ?>> <br>

		Waist:	<br> 
		X: <input type="text" class="demo" name = "FX3" value = <?php echo  $FX3; ?>> <t><t><t>	
		Y: <input type="text" class="demo" name = "FY3" value = <?php echo  $FY3; ?>> <br>

		Frontrise:	<br> 
		X: <input type="text" class="demo" name = "FX4" value = <?php echo  $FX4; ?>> <t><t><t>	
		Y: <input type="text" class="demo" name = "FY4" value = <?php echo  $FY4; ?>> <br>
		Control X: <input type="text" class="demo" name = "CX4" value = <?php echo  $CX4; ?>> <t><t><t>	
		Control Y: <input type="text" class="demo" name = "CY4" value = <?php echo  $CY4; ?>> <br>
		
		Inseam:	<br> 
		Control X: <input type="text" class="demo" name = "CX5" value = <?php echo  $CX5; ?>> <t><t><t>	
		Control Y: <input type="text" class="demo" name = "CY5" value = <?php echo  $CY5; ?>> <br><br>
		<input type="submit" name="Submit">	
	</form>

	<iframe src = "frame2.html" style="height:100%;width:50%;position:absolute;top:0px;bottom:0px;left:650px;"></iframe>

</body>
</html>