<html>
	
			<head>
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0," charset="utf-8">
				<title>PSQ V.2</title>
				<!-- css -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
				<link href="tagsinput.css" rel="stylesheet" type="text/css">
				<script src="tagsinput.js"></script>
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
				<style type="text/css">
				#container-fluid
					{
					margin-bottom: 10px;
					}
				</style>
			</head>
<?php
	$server = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b798786b8aa714";
    $password = "2e0e0451";
    $db = "heroku_ce52199dd4f50e1";
    $conn = new mysqli($server, $username, $password, $db);
	mysqli_query($conn, "SET NAMES utf8");
	$keyword = $_GET["keyword"];
	if(isset($keyword))
	{
		$sql_search ="SELECT * FROM tbl_Khasemsak_tdd_job WHERE PEA LIKE '%".$keyword."%'";
		$query_search = mysqli_query($conn,$sql_search);
		$numrows = mysqli_num_rows($key_query);
		$objsearch = mysqli_fetch_array($key_query);
			if($numrows > 1)
			{
				$t_result = "พบข้อมูลงานก่อสร้าง จำนวน ".$numrows." หมายเลขงาน";
			}
				else if ($numrows < 1)
				{
					$t_result = "ไม่พบข้อมูลงานก่อสร้าง";
				}
	}
?>
		<body>
			<div class="container-fluid" style="background-color:#b461fb;">
				<div class="row">
					<div class="col-sm4 offset-sm-3">
						<h5>สถานะงานก่อสร้าง โครงการพัฒนาระบบส่งและจำหน่าย ระยะที่ 1 (คพจ.1)  กฟต.1</h5>	
					</div>
				</div>
			</div>
			
			<div class="container-fluid">
					<h3><?php  echo $t_result;?></h3>
				<div class="row">
					<div class="col-lg-12">
						<div class="list-group">
							<?php
							$a=1;
							while($objsearch = mysqli_fetch_array($query_search))
							{
								$quan_total = $quan_total + $objsearch["ActQuan"];
								echo '<a href="'.$objsearch["email"].'" class="list-group-item list-group-item-action">';
								echo $a.".<br>";
								echo "<B>ผู้รับผิดชอบ :</B> ".$objsearch["PEA"]."<br>";
								echo "<B>หมายเลขงาน :</B>".$objsearch["WBS"]."<br>";
								echo "<B>สถานะผู้ใช้ :</B> ".$objsearch["Ustatus"]."<br>";
								echo "<B>สถานะระบบ :</B> ".$objsearch["Sstatus"]."<br>";
								echo "<B>ชื่องาน :</B> ".$objsearch["Name"]."<br>";
								echo "<B>ปริมาณงาน :</B> ".$objsearch["Quan"]." วงจร - กม.<br>";
								echo "<B>ผลงาน :</B> ".$objsearch["ActQuan"]." วงจร - กม.<br>";
								echo '</a>';
								$a=$a+1;
							}
							echo "<B>ผลงานสะสม :</B>".$quan_total. " วงจร - กม.";
							$a=0;
							?>
                    
						</div>
					</div>
				</div>
			</div>
			
		</body>
</html>