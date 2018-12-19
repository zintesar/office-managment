<?php
    include("db.php");
	session_start();
	echo $_SESSION['firstname'];
	$temp_name = $_SESSION['firstname'] ;
	
    
        if(count($errors) == 0)
        {
            //redirect to success pages
            //header("Location: insert.php");
			//exit();
			// if(isset($_POST['go']) != "" ) {echo  "11" ;	
			//echo "14";
			
			
		$getid = mysqli_query($connection,"select e_id , designation from info where firstname = '$temp_name'");
		$result = mysqli_fetch_array ($getid);
		$temp_id = $result['e_id'];
		$designation = mysqli_real_escape_string($connection,$result['designation']);
		$post=mysqli_query($connection,"UPDATE posts SET number_post = number_post + 1 where designation = '$designation'");
		$sql =  "delete from info where e_id = '$temp_id' ";
									  	 
		
		if(mysqli_query($connection, $sql))
                {
      //          echo "23";    
                 
                    
                   header("Location:aindex.php");
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
	<?php include ("user_nav.php"); ?>
	</div>
	
	
	
	<
</body>
</html>