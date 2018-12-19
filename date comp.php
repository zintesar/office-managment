<?php 
	include("db.php");
    session_start();
	$firstname = $_SESSION['firstname'];
	
    $attend = 1;
	$firstname = mysqli_real_escape_string($connection,$firstname);
	$attend = mysqli_real_escape_string($connection,$attend);
    $result =mysqli_query($connection,"select e_id from info where firstname = '$firstname'");
	$e_id=mysqli_fetch_array($result);
	$e_id = mysqli_real_escape_string($connection,$e_id['e_id']);
	$date = date("Y-m-d");
	//$date=mysqli_real_escape_string($connection,$date);
    $result =mysqli_query($connection,"SELECT * FROM `attendance` WHERE e_id = '$e_id'");
	//echo "5";
	//echo $e_id;
	//while($result_date=mysqli_fetch_array($result))
	{
    //print_r($result_date); echo "<br>";
	echo "<br>";
	
	//$date_dif = strcmp($date,$result_date['date']);
	$date_dif = strcmp($date,"2017-08-19");
	echo $date_dif ;
	echo "<br>";
	
	
	
	 phpinfo(); 
	
			$to = "somebody@example.com";
			$subject = "My subject";
			$txt = "Hello world!";
				$headers = "From: webmaster@example.com" . "\r\n" .
				"CC: somebodyelse@example.com";


			

		$a=	mail($to,$subject,$txt,$headers);
		echo $a;
	}
	?>