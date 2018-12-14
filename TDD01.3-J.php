<?php
	function search($txtin)
	{
		$server = "us-cdbr-iron-east-01.cleardb.net";
		$username = "b798786b8aa714";
		$password = "2e0e0451";
		$db = "heroku_ce52199dd4f50e1";
		$conn = new mysqli($server, $username, $password, $db);
		mysqli_query($conn, "SET NAMES utf8");
		$sql_text = "SELECT * FROM tbl_khasemsak_tdd_job WHERE PEA LIKE '%".$txtin."%'";
		$query_txt = mysqli_query($conn,$sql_text);
		$num_result = mysqli_num_rows($query_txt);
			if($num_result > 3)
			{	
				$result = "ผลงานก่อสร้าง.... https://tdd013j.herokuapp.com/Result_Khasemsak.php?keyword=".$txtin;
				return $result;
			}
			else
			{
				while($obj_result = mysqli_fetch_array($query_txt))
				{
					$quan_total = $quan_total + $obj_result["ActQuan"];
					$result = $result."\n\nหมายเลขงาน  : ".$obj_result["WBS"]."\nสถานะผู้ใช้ : ".$obj_result["Ustatus"]."\nสถานะระบบ : ".$obj_result["Sstatus"]."\nชื่องาน : ".$obj_result["Name"]."\nปริมาณงาน : ".$obj_result["Quan"]."\nผลงาน : ".$obj_result["ActQuan"];
				}
				$result = $result."\n\nผลงานสะสม : ". $quan_total;
				return $result;
			}
	}
	//$sql_text = "SELECT * FROM tbl_khasemsak_tdd_job WHERE PEA LIKE '%กกค%' ";
	//$query_text = mysqli_query($conn,$sql_text);
	
	//while($obj = mysqli_fetch_array($query_text))
	//{
		//echo $obj["PEA"]." ".$obj["WBS"]." ".$obj["Ustatus"]." 
		//".$obj["Sstatus"]." ".$obj["Name"]." ".$obj["Quan"]." ".$obj["ActQuan"]."<br>";
	//}
?>