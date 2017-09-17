<!DOCTYPE html>
<?php
	$conn = new mysqli("localhost","stevepf6_PFA","987654321","stevepf6_PFA");
	
	if(isset($_POST['submit']) && $_POST['from'])
	{
		$to_date =  $_POST['to']?$_POST['to']:date('Y-m-d');
		$filter = " WHERE date >= \"{$_POST['from']}\" AND date <= \"{$to_date}\"";
	}
	else
		$filter="";
	
	$result = $conn->query("select * from income".$filter);
	while ($row = $result->fetch_row())
	{
		$rows[] = $row;
	}
	
	$total_cash = $conn->query("select SUM(amount_cash) as total_cash from income".$filter);
	$total_cash = $total_cash->fetch_row();
	$total_credit = $conn->query("select SUM(amount_credit) as total_credit from income".$filter);
	$total_credit = $total_credit->fetch_row();
	$total = $total_cash[0]+ $total_credit[0];
	$conn->close();
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		<link rel="stylesheet" href="PFAstyle.css">
	</head>
	<body>
	<table class='table-bordered'>
		<tr>
			<th>Date</th>
			<th>Cash</th>
			<th>Credit</th>
			<th>Total</th>
		</tr>
	<?php
	foreach($rows as $row)
	{
	   printf("<tr><td>%s</td><td>%.2f</td><td>%.2f</td><td>%.2f</td></tr>",$row[0],$row[1],$row[2],$row[1]+$row[2]);
	}
	echo "<tr><th>Total</th><td>$ {$total_cash[0]}</td><td>$ {$total_credit[0]}</td><td>$ {$total}</td></tr>";
	?>
	</table><br>
	<h4>Filter:</h4>
	<form action="/PFA-view-record.php" method="post">
	From date:<br><input type="date" name="from"><br>
	To date:<br><input type="date" name="to"><br><br>
	<input type="submit" name="submit" value="Filter Result">
	</form>
	<a href='PFAonline.php'>Go Back</a>
	</body>
</html>

