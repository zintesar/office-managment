<?php
	include("db.php");
	if(isset($_GET['id']) != "" )
	{
		$temp_id =mysqli_real_escape_string($connection,$_GET['id']);
			
			$accept=mysqli_query($connection,"delete from info where e_id = $temp_id");
			if($accept)
			{
				header("Location:entry_request.php");
			}
			else
			{
				echo mysqli_error($connection);
			}
	}
	?>