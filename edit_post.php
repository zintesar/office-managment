<?php
    include("db.php");
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		
	}
    if($_POST)    
    {
		
        $errors = array();
        if(empty($_POST['postname']))
        {
					//echo "2";

            $errors['postname1'] = "Your Postname cannot be empty";
			
        }
        
		if(empty($_POST['number_post']))
        { //echo "3";
            $errors['number_post1'] = "Your Number of posts cannot be empty";
			
        }
        
		if(empty($_POST['salary']))
		{//echo "5";
			$errors['salary1'] = "Salary cannot be empty";
			
		}
		if(empty($_POST['requirement']))
		{//echo "5";
			$errors['requirement1'] = "Requirement cannot be empty";
			
		}		
		

        
        if(count($errors) == 0)
        {
            //redirect to success pages
            //header("Location: insert.php");
			//exit();
			// if(isset($_POST['go']) != "" ) {echo  "11" ;	
			
			$postname = mysqli_real_escape_string($connection, $_POST['postname']);
		
			$number_post = mysqli_real_escape_string($connection, $_POST['number_post']);
	  	  

			$salary = mysqli_real_escape_string($connection, $_POST['salary']);
			$requirement = mysqli_real_escape_string($connection, $_POST['requirement']);
	  	 


		$sql =  "UPDATE posts SET   designation =  '$postname' , number_post =  '$number_post' , salary = '$salary' , requirement = '$requirement'  WHERE ID = '$id' ";
									  	 
		
		if(mysqli_query($connection, $sql))
                {
                ;    
                 
                    
                   header("Location:admin_panel.php");
                } 
				else
                {
					
                    //echo "ERROR: Could not able to execute $sql. " . 
					echo mysqli_error($connection);
                }
 

                mysqli_close($connection);
                //header("Location: success.php");
                
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
	<div>
	<?php include ("admin_nav.php"); ?>
	</div>
	
	
	
	<form action=# method = "post" class= " pad " target = "">
	<fieldset align = center >
		<legend>Application</legend>
		<p align= left>post name : </p>
		<input type="text" name="postname" size = "40" value ="<?php if(isset($_POST['postname'])) echo $_POST['postname']; ?>"> 
		<p class="error_red" ><?php if(isset($errors['postname1'])) echo $errors['postname1']; ?></p>   
		<p align= left>Pumber of posts : </p> 
		<input type="text" name="number_post" size = "40" value ="<?php if(isset($_POST['number_post'])) echo $_POST['number_post']; ?>">
		<p class="error_red"><?php if(isset($errors['number_post1'])) echo $errors['number_post1']; ?></p>  
		<p align = left> Salary : </p>
		<input type="text" name="salary" size = "40" value ="<?php if(isset($_POST['salary'])) echo $_POST['salary']; ?>">
		<p class="error_red"><?php if(isset($errors['salary1'])) echo $errors['salary1']; ?></p>  
		<p align = left> Requirement : </p>
		<input type="text" name="requirement" size = "40" value ="<?php if(isset($_POST['requirement'])) echo $_POST['requirement']; ?>">
		<p class="error_red"><?php if(isset($errors['requirement1'])) echo $errors['requirement1']; ?></p>  
        
		<input type="submit" name="go" value = "submit">	
	</fieldset>
	</form>
</body>
</html>