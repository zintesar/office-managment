<?php
	if (session_status() != PHP_SESSION_NONE) {
    session_unset();
	}

	include("db.php");
	if($_POST)
	{
		$errors = array();
		
		if(empty($_POST['firstname']))
		{
			
			$errors['email1'] = "Enter Username";
		
		}
		if(empty($_POST['password']))
		{;
			$errors['pass1'] = "Enter Password";
			
		}
		
		if(count($errors) == 0 )
		{
			
			$firstname=mysqli_real_escape_string($connection,$_POST['firstname']);
			$password=mysqli_real_escape_string($connection,$_POST['password']);
			$sql = "select * from info where firstname ='$firstname' and password='$password'";
                if($result=(mysqli_query($connection, $sql)))
                {
					
                    if(mysqli_num_rows($result)>0)
                    {
						session_start();
						$_SESSION['POST'] = $_POST;
						
						$row=mysqli_fetch_array($result);
						//print_r( $row );
						if($row['admin']==1)
						{
							session_start();
							$_SESSION['firstname'] = $_POST['firstname'];
							
							header("Location:admin_panel.php");
						}
						if($row['admin']==0)
							
						{
							session_start();
							$_SESSION['firstname'] = $_POST['firstname'];
							
							header("Location:user_panel.php");
						}
						if($row['confirmation']==0)
						{
							header("Location:success.php");
						}
						
					}
					
					else 
					{
						$errors['nomatch'] = "Incorrect Username and Password";
						
					}
				}	
                   
                    
                else
                {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
                }
 

                mysqli_close($connection);
			
		}
		
	}




?>


<!doctype html>
<html>
<head>
<title>application</title>
<link rel="stylesheet" href="./css/mystyle.css"></link>

	

<body style = "margin : 0px 0px 0px 0px"  >

	<div>
	<?php include ("header.php"); ?>
	</div>
	
	
	<form action=# method = "post" class= " pad " target = "">
	<fieldset align = center style = "padding : 20px 10px 20px  10px ;" >
		<legend>Application</legend>
		<p align= left>User name : </p>
		<input type="text" name="firstname" size = "40">
		<p class="error_red"><?php if(isset($errors['email1'])) echo $errors['email1']; ?></p>
		<p align= left>passsword :  </p>
		<input type= "password" name = "password" size= "40">
		<p class="error_red"><?php if(isset($errors['pass1'])) echo $errors['pass1']; ?></p> 
		<p class="error_red"><?php if(isset($errors['nomatch'])) echo $errors['nomatch']; ?></p> 

		<input type="submit" name="go" value = "submit">	
	</fieldset>
	</form>
</body>
</html>