<?php
	
    include("db.php");
	
	
    if($_POST)    
    {
		
        $errors = array();
        if(empty($_POST['cur_pass']))
        {
            $errors['cur_pass1'] = "Your current password cannot be empty";
			
        }
        
		if(empty($_POST['new_pass']))
        {
            $errors['new_pass1'] = "Your new password cannot be empty";
			
        }
        
		if(empty($_POST['conf_new_pass']))
		{
			$errors['conf_new_pass1'] = "please reapet your new password empty";
			
		}	
		if($_POST['new_pass'] !== $_POST['conf_new_pass'])
		{
			$errors['pass1'] = "new pass word and confirmed new password does not match";
		}

		session_start();
		$tempfname=$_SESSION['firstname'];
		if(count($errors) == 0)
		{
			$cur_pass = mysqli_real_escape_string($connection,$_POST['cur_pass']);
			$new_pass = mysqli_real_escape_string($connection,$_POST['new_pass']);
			$conf_new_pass= mysqli_real_escape_string($connection,$_POST['conf_new_pass']);
			
			$sql = "select password from info where firstname = '$tempfname' AND password = '$cur_pass' ";
			
			if($result=(mysqli_query($connection,$sql)))
			{
				if(mysqli_num_rows($result) > 0)
				{
					$update= "update info set password = '$new_pass' where firstname = '$tempfname'";
					mysqli_query($connection,$update);
				}
				else
				{
					$errors['cur_pass2'] = "Your current password does not match";
					
				}
			}	
			else 
			{
				mysqli_error($connection);
			}
		
			
		}
		
	}
	?>
	
<!doctype html>
<html>
<head>
<title>application</title>
<link rel="stylesheet" href="./css/mystyle.css"></link>

</head>
<body style = "margin : 0px 0px 0px 0px"  >

	<div>
	<?php include ("header.php"); ?>
	</div>
	
	
	<form action=# method = "post" class= " pad " target = "">
	<fieldset align = center >
		<legend>change password</legend>
		<p align = left>Current Password : </p>
		<input type="password" name="cur_pass" size = "40"> 
		<p class="error_red" ><?php if(isset($errors['cur_pass1'])) echo $errors['cur_pass1']; ?></p>
		<p class="error_red" ><?php if(isset($errors['cur_pass2'])) echo $errors['cur_pass2']; ?></p>
		<p align= left>New password : </p>
		<input type="password" name="new_pass" size = "40"> 
		<p class="error_red" ><?php if(isset($errors['new_pass1'])) echo $errors['new_pass1']; ?></p>   
		<p align= left>Confirm new password  : </p> 
		<input type="password" name="conf_new_pass" size = "40" >
		<p class="error_red"><?php if(isset($errors['conf_new_pass1'])) echo $errors['conf_new_pass1']; ?></p>  
		<p class="error_red"><?php if(isset($errors['pass1'])) echo $errors['pass1']; ?></p>  
       
		<input type="submit" name="go" value = "submit">	
	</fieldset>
	</form>
</body>
</html>