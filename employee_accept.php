<?php

	include("db.php");
	
	if(isset($_GET['id']) != "" )
	{	
		
	
		
		$temp_id =mysqli_real_escape_string($connection,$_GET['id']);
		$temp_name=mysqli_real_escape_string($connection,$_GET['firstname']);
		
			$result = mysqli_query($connection,"SELECT max(e_id) as e_id FROM info") ;
			$id=mysqli_fetch_array($result);
			//print_r($id);
			//echo $id['e_id'];
			$id['e_id'] = $id['e_id'] + 1 ;
			$e_id = mysqli_real_escape_string($connection,$id['e_id']);
			$date = date("Y-m-d");
			$date=mysqli_real_escape_string($connection,$date);
			$designation=mysqli_real_escape_string($connection,$_GET['designation']);
			$accept=mysqli_query($connection,"update info set confirmation = 1 , date_of_join = now() , e_id = '$e_id'  where e_iD = '$temp_id' and firstname = '$temp_name'");
			$post=mysqli_query($connection,"UPDATE posts SET number_post = number_post - 1 where designation = '$designation'");
			$set_attendance=mysqli_query($connection,"insert into attendance (date,e_id,attendance) values ('$date','$e_id','0')" );
			
			$to = $_GET['email'];
			$subject = "Job interview";
			$txt = "you have been chosen for interview. Your interview will take place at our office on 20 th of this month at 11 am";
			$headers = "From: webmaster@example.com" . "\r\n" .
				"CC: somebodyelse@example.com";

			mail($to,$subject,$txt,$headers);
			
			if($accept)
				
			{
				
				header("Location:admin_panel.php");
				
				//, date_of_join = now()
			}
			
			else
			{
				
			
			}
	}
	?> 