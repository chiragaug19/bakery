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

$emob= $pass=
$emob=$_POST["emob"];
$pass=$_POST["pass"];

$check1='SELECT * FROM sign WHERE mob="'.$emob.'" OR email="'.$emob.'"';
$result = $conn->query($check1);

if($result->num_rows == 0)
{
	echo'<script type="text/javascript">
     window.alert("This Mobile Number or Email is not registered. Please Sign Up first.");
     window.history.go(-1);
     </script>';
}

else
{
	$result->close();
	$check2='SELECT * FROM sign WHERE (mob="'.$emob.'" OR email="'.$emob.'") AND pass="'.$pass.'"';
	$verify = $conn->query($check2);

	if($verify->num_rows == 0)
	{
		echo"<script type='text/javascript'>
     window.alert('Incorrect Password.');
     window.history.go(-1);
     </script>;";
	}

	else
	{
		echo"<script type='text/javascript'>
     window.alert('Welcome!');
     window.open('Menu.html');
     </script>;";
	}
}