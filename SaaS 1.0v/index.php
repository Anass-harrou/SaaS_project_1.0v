<?php
include('config.php');?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet"
		href="style.css">
	<link rel="stylesheet"
		href="responsive.css">
		
</head>

<body>

	<!-- for header part -->
	<header>

		

            <form class="" action="" method="post" enctype="multipart/form-data">
		
				<div class="form first">
						
					<div class="details ID">
						<span class="title">Next week</span>
						<form class="" action="" method="post" enctype="multipart/form-data">
							<input type="file" name="excel" required value="">
							<button class="sumbit" name="import">
							<span class="btnText">Import</span>
							<i class="uil uil-navigator"></i>
						</button>
						</form>

						<?php

if(isset($_POST["import"])){
	$fileName = $_FILES["excel"]["name"];
	$fileExtension = explode('.', $fileName);
	$fileExtension = strtolower(end($fileExtension));
	$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

	$targetDirectory = "uploads/" . $newFileName;
	move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

	error_reporting(0);
	ini_set('display_errors', 0);

	require 'excelReader/excel_reader2.php';
	require 'excelReader/SpreadsheetReader.php';

	$reader = new SpreadsheetReader($targetDirectory);
	$rowCount = 0;

	foreach ($reader as $key => $row) {
		if ($rowCount < 1) { // Skip the first 12 rows
			$rowCount++;
			continue;
		}
		$Product = $row[0];
		$Machine = $row[1];
		$Mold = $row[2];
		$tlf = $row[3];
		
		
		//$Order_Number = $row[3];
		


		
		mysqli_query($link, "INSERT INTO app (nom, Ville, Adress, tlf) 
		VALUES('$Product', '$Machine','$Mold', '$tlf')");



	}

	header("location: test.php");;
}

?>

						
	
						
					</div> 
				</div>
	
				
			</form>
		</div>
	
			
			</div>
		</div>
	</div>

	<script src="script.js"></script>
</body>
</html>
