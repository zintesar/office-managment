<?php
	include("db.php");
	if(isset($_GET['id']) != "" )
	{
		$temp_id = $_GET['id'];
			
			$accept=mysqli_query($connection,"delete from posts where ID = $temp_id");
			if($accept)
			{
				header("Location:post_table.php");
			}
			else
			{
				echo mysqli_error($connection);
			}
	}
	?>