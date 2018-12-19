<?php
echo  "11" ;
  include("db.php");
  echo  "10" ; 
  echo $_POST['firstname'] ; echo $_POST['lastname'] ; echo $_POST['mobi_no']  ; echo $_POST['address'] ; echo $_POST['gender'] ; echo $_POST['designation'] ;
  if(isset($_POST['go']) != "" ) {echo  "11" ;
      $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
	  echo $firstname;
      $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
	  	  echo $lastname;

	  $mobi_no = mysqli_real_escape_string($connection, $_POST['mobi_no']);
	  	  echo $mobi_no;

      $email = mysqli_real_escape_string($connection, $_POST['email']);
	  	  echo $email;

	  $address = mysqli_real_escape_string($connection,$_POST['address']);
	  	  echo $address;

	  $gender = mysqli_real_escape_string($connection,$_POST['gender']);
	  	  echo  $gender;

	  $designation = mysqli_real_escape_string($connection,$_POST['designation']);
	  	  echo $designation;
		//$update = mysqli_query($connection, "INSERT INTO info(firstname,lastname,mobi_no,email,address,gender,designation,created)VALUES
									//  ("'$_POST['firstname']'","'$_POST['lastname']'","'$_POST['mobi_no']'","'$_POST['email']'","'$_POST['address']'","'$_POST['gender']'","'$_POST['designation']'",now())");
									  	  echo "8";  

     $update = mysqli_query($connection, "INSERT INTO info(firstname,lastname,mobi_no,email,address,gender,designation,created)VALUES
									 ('$firstname','$lastname','$mobi_no','$email','$address','$gender','$designation',now())");
									  	  echo "8";

  
  if($update) {
	  $msg="Successfully Updated!!";
	  	  echo "9";

	  echo "<script type='text/javascript'>alert('$msg');</script>";
	  	  echo "10";

	  header('Location:index.php');
	  	  echo "11";

  } else {
	 $errormsg="Something went wrong, Try again";
	 	  echo "12";

	  echo "<script type='text/javascript'>alert('$errormsg');</script>";
	  	  echo "13";

	  header('Location:index.php');
	  	  echo "14";

  }
  }
 ob_end_flush();
?>

