<?php
include('config.php');?>
<!DOCTYPE html>
<html>

<head>
	<title>
	DOM Style boxSizing Property
	</title>
	<style>
		.container {
			width: 200px;
			height: 300px;
			border: 10px solid green;
		}
		
		.box {
			width: 400px;
			height: 100px;
			border: 5px solid lightgreen;
			text-align: center;
			font-size: 2rem;
			box-sizing: border-box;
		}
	</style>
</head>

<body>
    <?php
    $sql = "SELECT * FROM app";
    $result = $link->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) { ?>

<div class="box"
			id="box-1">
		Name: <?php echo $row["nom"]; ?>
		</div>
		<div class="box"
			id="box-2"
			style="padding: 10px;">
            City: <?php echo $row["Ville"]; ?>
		</div>
		<div class="box"
			id="box-3">
		Address: <?php echo $row["Adress"]; ?>
		</div>
        <div class="box"
			id="box-1">
            Telephone: <?php echo $row["tlf"]; ?>
		</div>
        <br/>
       

     <?php } 
    } 
    
    ?>
	

	
</body>

</html>
