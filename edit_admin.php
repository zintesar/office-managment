<?php
    include("db.php");
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		
	}
    if($_POST)    
    {
		
        $errors = array();
        if(empty($_POST['firstname']))
        {
					//echo "2";

            $errors['Name1'] = "Your Firstname cannot be empty";
			
        }
        if(strlen($_POST['firstname']) < 2)
        {	echo "3";
            $errors['Name2'] = "Your Firstname must be atleast 2 characters long";
			
        } 
		if(empty($_POST['lastname']))
        { //echo "3";
            $errors['Name3'] = "Your Lastname cannot be empty";
			
        }
        if(strlen($_POST['lastname']) < 2)
        { //echo "4";
            $errors['Name4'] = "Your Lastname must be atleast 2 characters long";
			
        } 	
		if(empty($_POST['mobi_no']))
		{//echo "5";
			$errors['mobil11'] = "Mobile number cannot be empty";
			
		}	
		if(strlen($_POST['mobi_no']) != 11)
		{//echo "6";
			$errors['mobil2'] = "Mobile number must be 11 charecter long ";
			
		}
		if(empty($_POST['email']))
        {//echo "7";
             $errors['email1'] = "Email cannot be empty";
        }
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
        if(preg_match($pattern,$_POST['email']) == false)
        {//echo "8";
            $errors['email2'] = "Invalid Email";
		}
		if(empty($_POST['age']))
		{
			//echo "9";
			$errors['age1'] ="age cannot be empty";
		}
		if($_POST['age'] < 17 || $_POST['age'] > 80 )
		{
			//echo "10";
			$errors['age2'] ="age must be within 17 to 80";
		}
		
		if (empty($_POST['address']))
		{
			//echo "11";
			$errors['address1'] = "Address can not be empty"; 
			
		}
		if (strlen($_POST['address']) < 10 )
		{
			//echo "12";
			$errors['address1'] = "Address must be atlesast 10 charcters long "; 
			
		}
        if(!isset($_POST['gender']))
        {
			//echo "13";
            $errors['gender1'] = "Gender cannot be empty";
			
        }
		 if(!isset($_POST['admin']))
        {
			//echo "13";
            $errors['admin1'] = "user type cannot be empty";
			
        }
		
		/*if(!isset($_POST['birth_day']))
		{
			$errors['birthday'] = "Date of birth can not be empty";
			
		}*/		
        if($_POST['designation'] === "no" )
        { 
			//echo "13";
            $errors['designation1'] = "Designation must be selected ";
			
        }
		

        
        if(count($errors) == 0)
        {
            //redirect to success pages
            //header("Location: insert.php");
			//exit();
			// if(isset($_POST['go']) != "" ) {echo  "11" ;	
			//echo "14";
			$firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
			//echo "15";
			$lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
	  	  //echo "16";

			$mobi_no = mysqli_real_escape_string($connection, $_POST['mobi_no']);
			$mobi_no=8800000000000+$mobi_no;
	  	  //echo "17";

			$email = mysqli_real_escape_string($connection, $_POST['email']);
	  	 
//echo "18";
			$address = mysqli_real_escape_string($connection,$_POST['address']);
	//  	echo "19";  

			$gender = mysqli_real_escape_string($connection,$_POST['gender']);
	  //	  echo "20";

			$designation = mysqli_real_escape_string($connection,$_POST['designation']);
			
		//	echo "21";
			$age = mysqli_real_escape_string($connection,$_POST['age']); 
	//	echo "22";
			$admin = mysqli_real_escape_string($connection,$_POST['admin']);

		$sql =  "UPDATE info SET   firstname =  '$firstname' , lastname =  '$lastname' , mobi_no= '$mobi_no', email = '$email' , address= '$address' , gender = '$gender' , designation ='$designation' , age ='$age' , admin  = '$admin' WHERE e_id = '$id' ";
									  	 
		
		if(mysqli_query($connection, $sql))
                {
      //          echo "23";    
                 
                    
                   header("Location:admin_panel.php");
                } 
				else
                {
		//			echo "24";
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
		<p align= left>Firstname : </p>
		<input type="text" name="firstname" size = "40" value ="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>"> 
		<p class="error_red" ><?php if(isset($errors['Name1'])) echo $errors['Name1']; ?></p>   
        <p class="error_red"><?php if(isset($errors['Name2'])) echo $errors['Name2']; ?></p>
		<p align= left>Lastname : </p> 
		<input type="text" name="lastname" size = "40" value ="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
		<p class="error_red"><?php if(isset($errors['Name3'])) echo $errors['Name3']; ?></p>  
        <p class="error_red"><?php if(isset($errors['Name4'])) echo $errors['Name4']; ?></p>
		<p align = left> Mobile number : </p>
		<input type="text" name="mobi_no" size = "40" value ="<?php if(isset($_POST['mobi_no'])) echo $_POST['mobi_no']; ?>">
		<p class="error_red"><?php if(isset($errors['mobil1'])) echo $errors['mobil1']; ?></p>  
        <p class="error_red"><?php if(isset($errors['mobil2'])) echo $errors['mobil2']; ?></p>
		<p align= left>Email address : </p>
		<input type="text" name="email" size = "40" value ="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
		<p class="error_red"><?php if(isset($errors['email1'])) echo $errors['email1']; ?></p>   
        <p class="error_red"><?php if(isset($errors['email2'])) echo $errors['email2']; ?></p>
		<p align= left>Age : </p>
		<input type="text" name="age" size = "40" value ="<?php if(isset($_POST['age'])) echo $_POST['age']; ?>">
		<p class="error_red"><?php if(isset($errors['age1'])) echo $errors['age1']; ?></p>   
        <p class="error_red"><?php if(isset($errors['age2'])) echo $errors['age2']; ?></p>
		<p align= left>Addresss :  </p>
		<textarea type="text" name="address" rows = 5 cols = 42; ?></textarea> 
		<p class="error_red"><?php if(isset($errors['address1'])) echo $errors['address1']; ?></p>   
		<p align= left>Gender : </p>
		<p class="error_red"><?php if(isset($errors['gender1'])) echo $errors['gender1']; ?></p> 
		<input type="radio" name="gender" value="male"> Male 
		<input type="radio" name="gender" value="female"> Female <br>
		
		<p align= left>Acount type : </p>
		<input type="radio" name="admin" value="1"> admin <br>
		<input type="radio" name="admin" value="0"> user <br>
		<p class="error_red"><?php if(isset($errors['admin1'])) echo $errors['admin1']; ?></p> 
		
		<!--<p align= left>Date of birth:</p> 
		<p><?php if(isset($errors['birthday'])) echo $errors['birthday']; ?></p> 
		<input type="date" name="birth_day" max = "2016-1-1">-->
		
		<!-- could not validate :( -->
		
		<p align= left>Job designation: </p>
		<p class="error_red" ><?php if(isset($errors['designation1'])) echo $errors['designation1']; ?></p> 
		<select name= "designation" size = "" >
			<option value="no" selected>Select</option>
			<option value="programmer">programmer</option>
			<option value="developer">developer</option>
			<option value="project manager">project manager</option>
		</select>	<br> <br>
		<input type="submit" name="go" value = "submit">	
	</fieldset>
	</form>
</body>
</html>