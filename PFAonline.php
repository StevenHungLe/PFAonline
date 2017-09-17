<!DOCTYPE html>
<html>
<head>
    <title>Personal Financial Assistant Online</title>
    <meta name="viewport" content="width=device_width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3mobile.css">
</head>
<body>
<?php
    if ($_POST['submit'])
    {
        $conn = new mysqli('localhost','stevepf6_PFA','987654321','stevepf6_PFA');
       $date = $_POST['date']?$_POST['date']:date('Y-m-d');
       $stmt = $conn->prepare ("INSERT INTO income VALUES(?,?,?)");
        $stmt->bind_param('dss',doubleval($_POST['amount']),$date,$_POST['type']);
	if ( $stmt->execute())
	{
		 echo "<script>alert('record of income successful!')</script>";
	}
        $conn->close();
    }				
?>
<div class="w3-container">
<h2>Income Record Form</h2>
<form action="/PFAonline.php" method="post">
    Amount:<br>
    <input type="text" name="amount" autofocus="autofocus"><br>
    Type:<br>
    <input type="radio" name="type" value="credit card" checked> Credit Card<br>
    <input type="radio" name="type" value="cash"> Cash<br>
    Date:(today by default)<br>
    <input type="date" name="date"><br><br>
    <input type="submit" name="submit"><br><br>
    <button type="submit" name="view record" formaction="PFA-view-record.php">View Record</button>
</form>
</div>
</body>
</html>
