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
    $result =mysqli_query($connection,"SELECT * FROM attendance WHERE e_id = '$e_id'");
	//echo "5";
	//echo $e_id;
	while($result_date=mysqli_fetch_array($result))
	{
		//echo "6";
		//print_r($result_date); echo "<br>";
		//echo "<br>";
	
		//$date_dif = strcmp($date,$result_date['date']);
	
		if($date >= $result_date['date'] )
	{
		//echo "7";
		if($date == $result_date['date'] && $result_date['attendance'] == 0)
			{	
				//echo "8";
				$sql = "update attendance set attendance = 1 where e_id = $e_id ";
				if(mysqli_query($connection,$sql))
				{
					//echo "9";
					echo "<script type='text/javascript'>alert('Present On ' +Date());
                    window.location = 'aindex.php';
                    </script>";
					break;
				}
			}
			//echo "10";
		if($date > $result_date['date'])
		{
			//echo "11";
			$sql = "insert into attendance (date,e_id,attendance) values (now(),'$e_id','$attend')";
			//echo "12";
			if(mysqli_query($connection,$sql))
			{
				//echo "13";
					echo "<script type='text/javascript'>alert('Present On ' +Date());
                    window.location = 'aindex.php';
                    </script>";
					//echo "14";
					break;
			
			}
		//	echo "15";
		}	
//echo "16";		
	}
	
	else
	{
	//	echo "18";
		echo "<script type='text/javascript'>alert('You were already present On ' +Date());
                    window.window.history.go(-1);
                    </script>";
	
	
    
	}
	}
	
	
	
	
	
	


?>
	