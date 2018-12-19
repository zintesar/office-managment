<?php

	include("db.php");
	
	if(isset($_GET['id']) != "" )
	{	
		
	
		
		$temp_id =mysqli_real_escape_string($connection,$_GET['id']);
		$salary_flag = mysqli_query($connection,"select salary_flag from info where e_iD = '$temp_id'");
			$salary_flag=mysqli_fetch_array($salary_flag);
		
		if($salary_flag['salary_flag']== 1)
		{
			echo "<script type='text/javascript'>alert('salary already paid');
                    window.window.history.go(-1);
                    </script>";
		}
		if($salary_flag['salary_flag']== 0)
		{
			//print_r($id);
			//echo $id['e_id'];
			//$e_id = mysqli_real_escape_string($connection,$id['e_id']);
			$designation=mysqli_real_escape_string($connection,$_GET['designation']);
			$accept=mysqli_query($connection,"update info set salary_flag = 1   where e_iD = '$temp_id'");
			
			$salary_amount = mysqli_query($connection,"select salary from posts where designation = '$designation'");
			$salary_amount=mysqli_fetch_array($salary_amount);
			
			$to = $_GET['email'];
			$subject = "Salary";
			$txt = "your salary of ".$salary_amount['salary'] ." taka has been paid to your account";
			$headers = "From: webmaster@example.com" . "\r\n" .
				"CC: somebodyelse@example.com";
				echo $txt;

			mail($to,$subject,$txt,$headers);
			
			
			if($accept)
				
			{
				
			
				echo "<script type='text/javascript'>alert('salary has been paid');
                    window.window.history.go(-1);
                    </script>";
				
				
				//, date_of_join = now()
			}
			
			
		}
	}
	?> 