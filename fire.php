<?php
	include("db.php");
	if(isset($_GET['id']) != "" )
	{
		$temp_id = $_GET['id'];
		$designation = mysqli_real_escape_string($connection,$_GET['designation']);
		
			$post=mysqli_query($connection,"UPDATE posts SET number_post = number_post + 1 where designation = '$designation'");
			$accept=mysqli_query($connection,"delete from info where e_id = $temp_id");
			if($accept)
			{
				header("Location:table.php");
			}
			else
			{
				echo mysqli_error($connection);
			}
	}
	?>