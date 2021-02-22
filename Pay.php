<?php
$servername = "localhost";
$username = 'root';
$password = 'mysql';

//Create connection
$conn = new mysqli($servername, $username, $password,"hotpot");
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$otyp=$_POST["hide"];

if($otyp=='del')
{
	$name= $mob= $pcode= $prim= $sec= $lnd= $cst=
	$name=$_POST['name'];
	$mob=$_POST[('num')];
	$pcode=$_POST[('pcode')];
	$prim=$_POST['prim'];
	$sec=$_POST['sec'];
	$lnd=$_POST['lnd'];
	$cst=$_POST['cst'];

	$add='Name: '.$name.' Contact: '.$mob.' Address: '.$prim.' '.$sec.' '.$cst.' '.' PinCode: '.$pcode.' Landmark: '.$lnd;

	$check = mysqli_query($conn,"SELECT max(orderid) AS max FROM orders;" );
	@mysqli_stmt_execute($check);
	$result = mysqli_fetch_array($check);
	$odid=$result['max'];

	$ins="INSERT INTO pay VALUES ('".$odid."','".$otyp."','".$add."')";
	echo($ins);

	mysqli_query($conn,$ins);
	
	echo'<script type="text/javascript">
    		window.alert("You will be directed to Payment Gateway. Press Ok to continue.");
    	</script>';
}

else
{
	$add=$_POST['take'];
	
	$check = mysqli_query($conn,"SELECT max(orderid) AS max FROM orders;" );
	@mysqli_stmt_execute($check);
	$result = mysqli_fetch_array($check);
	$odid=$result['max'];

	$ins="INSERT INTO pay(orderid,ordertype,address) VALUES ('".$odid."','".$otyp."','".$add."')";
	$insert=$conn->prepare($ins);
	if($insert==FALSE){trigger_error('An unexpected error has occured.Please try again.');}
	else
	{
		$insert->execute();
		$insert->close();
	}
	echo'<script type="text/javascript">
    	window.alert("You will be directed to Payment Gateway. Press Ok to continue.");
    	</script>';
}
?>