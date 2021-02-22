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

	$fname= $lname= $mob= $email= $pass=
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$mob=$_POST[("num")];
	$email=$_POST["email"];
	$pass=$_POST["pass"];

	$check='SELECT * FROM sign WHERE mob="'.$mob.'" OR email="'.$email.'"';
	$result = $conn->query($check);
	if($result->num_rows > 0)
	{
		echo'<script type="text/javascript">
     window.alert("This Mobile Number or Email is already registered. Please Log In to continue.");
     window.history.go(-1);
     </script>';
 	}


 	else
 	{
 	$result->close();
	$query="INSERT INTO sign(fname,lname,mob,email,pass) VALUES ('".$fname."','".$lname."','".$mob."','".$email."','".$pass."')";
	$q=$conn->prepare($query);

	if($q==FALSE){trigger_error('An unexpected error has occured.Please try again.');}
	else
	{
		$q->execute();
		$q->close();
		echo'<script type="text/javascript">
    	window.alert("Your account has been created.You will be redirected to previous page.");
 		window.open("Log In.html");
 		</script>';
	}
}
?>