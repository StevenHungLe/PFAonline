<!DOCTYPE html>
<html>
<head>
    <title>Personal Financial Assistant Online</title>
    <meta name="viewport" content="width=device_width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
</head>
<body>
<?php
    if ($_POST['submit'])
    {
        $conn = new mysqli('localhost','stevepf6_PFA','987654321','stevepf6_PFA');
		$date = $_POST['date']?$_POST['date']:date('Y-m-d');
		$stmt = $conn->prepare ("INSERT INTO income VALUES(?,?,?)");
		$stmt->bind_param('sdd',$date, doubleval($_POST['amount_cash']),doubleval($_POST['amount_credit']));
	if ( $stmt->execute())
	{
		 echo "<h3 style='color:red'>Record of income successful!</h3><br>";
	}
        $conn->close();
    }				
?>
<div class="container-fluid" >
<div class="col-sm-4 center-block" style="border:1px solid #cecece; float:none; background: #ccffcc">
<h3>Income Record Form</h3>
<form action="/PFAonline.php" method="post">
    Cash:<br>
    <input type="text" name="amount_cash" autofocus="autofocus"><br>
    Credit:<br>
    <input type="text" name="amount_credit" autofocus="autofocus"><br>
    Date:<br>
    <input type="date" name="date"><br><br>
    <input type="submit" name="submit"><br><br>
    <button type="submit" name="view record" formaction="PFA-view-record.php">View Record</button>
</form>
</div>
</div>
</body>
</html>
