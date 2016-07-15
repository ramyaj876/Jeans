<html>
	<body>
	<?php 
	require 'Db_conn.php';

	if (!$conn)
		echo "Unsuccessful";

	foreach($_POST as $key => $value){
		//echo($key." ".$value);
		 $$key = $value; //create variable
	}

	if($ID)
	{
	try {
		$sql = "Select * from svg_table where ID = ".$_POST["ID"].";";
		$ret = $conn->query($sql);
		if ($ret->num_rows == 0)
			echo "Pattern does not exist.";
		
		else {
			$obj = $ret->fetch_assoc(); 
			echo($obj["SVG"]);
		}	
	}
	catch (Exception $e){
		echo ('Error');
	} 
	}
	else
		echo("No ID entered.")
	?>

	<p style="page-break-after:always;"></p>

	<?php
	if ($ID)
	{
	if ($ret->num_rows != 0)
	{
		try {
			$sql = "Select * from rear_table where ID = ".$_POST["ID"].";";
			$ret = $conn->query($sql);
			$obj = $ret->fetch_assoc(); 
			$cm = " cm";
			$conv = 37.8;
			$br = "<br>";
			print($br);
			print("AB - Rear Leg opening: ".round($obj["LegOpenLen"]/$conv, 2).$cm.$br);
			print("BC - Rear Outseam: ".round($obj["OutseamLen"]/$conv, 2).$cm.$br);
			print("CD - Rear Waist: ".round($obj["WaistLen"]/$conv, 2).$cm.$br);
			print("DE - Back rise: ".round($obj["BackriseLen"]/$conv, 2).$cm.$br);
			print("EA - Rear Inseam: ".round($obj["InseamLen"]/$conv, 2).$cm.$br);

			$sql = "Select * from front_table where ID = ".$_POST["ID"].";";
			$ret = $conn->query($sql);
			$obj = $ret->fetch_assoc(); 

			print($br);
			print("FG - Front Leg opening: ".round($obj["LegOpenLen"]/$conv, 2).$cm.$br);
			print("GH - Front Outseam: ".round($obj["OutseamLen"]/$conv, 2).$cm.$br);
			print("HI - Front Waist: ".round($obj["WaistLen"]/$conv, 2).$cm.$br);
			print("IJ - Front rise: ".round($obj["FrontriseLen"]/$conv, 2).$cm.$br);
			print("JF - Front inseam: ".round($obj["InseamLen"]/$conv, 2).$cm.$br);
		}
		catch (Exception $e){
		echo ('Error');
	}
	}
}
	mysqli_close($conn);
?>
		
	</body>
</html>