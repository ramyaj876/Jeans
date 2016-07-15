<?php
// Execute the python script with the JSON data
//$res = exec("C:\\Python27\\python.exe C:\\wamp\\www\\Input.py")
//  echo "Json:".escapeshellarg(json_encode($_POST));
$jsObj = null;
$jsStr = ""; 
 //  = json_encode($_POST);
//$jsStr = $jsObj.dumps(); 
$arg = '{';
$q = '\"';
$col = ':';
$com = '';	//first comma not wanted
foreach ($_POST as $key => $value){
 $$key = $value; //create variable
 $arg = $arg.$com.$q.$key.$q.$col.$q.$value.$q;
 $com = ',';
  echo $arg."<br>";
}
$arg = $arg.'}';

//for i = 0; i < $_POST.()
$cmd = 'python C:\wamp\www\myScript.py ' . $arg;
$result = shell_exec($cmd);
echo "<br><br>In PHP, Result :<br>";
echo $result;
// Decode the result
$resultData = json_decode($result, true);

//echo $resultData
// This will contain: array('status' => 'Yes!')
//var_dump($resultData);
?>