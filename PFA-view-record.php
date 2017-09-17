<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		<style>
		table
		{
			background-color:#ccffcc;
		}
		th{
			text-align:center;
		}
		td{
			padding: 5px;
		}
		</style>
	</head>
	<body>
	<?php
	$conn = new mysqli("localhost","stevepf6_PFA","987654321","stevepf6_PFA");
	$result = $conn->query("select * from income;");
	echo "<table class='table-bordered'><tr><th>Amount</th><th>Date</th><th>Type</th></tr>";
	while($row = $result->fetch_row())
	{
	   printf("<tr><td>$ %.2f</td><td>%s</td><td>%s</td></tr>",$row[0],$row[1],$row[2]);
	}
	echo "</table><br>";
	echo "<a href='PFAonline.php'>Go Back</a>";
	$conn->close();
	?>
	</body>
</html>

