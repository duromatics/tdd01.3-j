<?php
	
	$server = "us-cdbr-iron-east-01.cleardb.net";
	$username = "b798786b8aa714";
	$password = "2e0e0451";
	$db = "heroku_ce52199dd4f50e1";
	$conn = new mysqli($server, $username, $password, $db);
	mysqli_query($conn, "SET NAMES utf8");
	
	function query($txtin)
	{
	$sql_text = "SELECT * FROM tbl_khasemsak_tdd_job WHERE PEA LIKE '%".$txtin."%'";
	$query = mysqli_query($conn,$sql_text);
	while($obj_result = mysqli_fetch_array($query))
	{
	$result = $result."\n".$obj_result["WBS"].$obj_result["Ustatus"].$obj_result["Status"].$obj_result["Name"].$obj_result["Quan"].$obj_result["ActQuan"];
	}
	return $return;
	}
	//$sql_text = "SELECT * FROM tbl_khasemsak_tdd_job WHERE PEA LIKE '%กกค%' ";
	//$query_text = mysqli_query($conn,$sql_text);
	
	//while($obj = mysqli_fetch_array($query_text))
	//{
		//echo $obj["PEA"]." ".$obj["WBS"]." ".$obj["Ustatus"]." 
		//".$obj["Sstatus"]." ".$obj["Name"]." ".$obj["Quan"]." ".$obj["ActQuan"]."<br>";
	//}
?>