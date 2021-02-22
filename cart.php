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

$arr=[];
$c=$_POST["count"];
for($i=1;$i<=$c;$i++)
{

	@$x=$_POST[$i];
	if(is_null($x))
		{
			continue;
		}
	else
		{
			array_push($arr,$x);
		}

}

$check = mysqli_query($conn,"SELECT max(orderid) AS max FROM orders;" );
@mysqli_stmt_execute($check);
$result = mysqli_fetch_array( $check );
$odid = $result['max']+1;

foreach ($arr as $j)
{
	$ins="INSERT INTO orders(item,orderid) VALUES ('".$j."','".$odid."')";
	$insert=$conn->prepare($ins);
	if($insert==FALSE){trigger_error('An unexpected error has occured.Please try again.');}
	else
	{
		$insert->execute();
		$insert->close();
	}
}
echo'<script type="text/javascript">
    	window.alert("Your cart has been saved. Press Ok to continue.");
    	window.open("Payment.html","_self");
    </script>';
?>