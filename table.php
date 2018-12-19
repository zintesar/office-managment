
<head>
<link rel="stylesheet" href="./css/mystyle.css">

<style>
	table 
	{
		border-collapse: collapse;
        width: 100%;
	}
	td, th 
	{
        border: 1px solid ;
        text-align: left;
        padding: 8px;
    }

</style>

</head>
<body class ="body_no_mar">
<div>
    <?php include('header.php');?>


</div>
<div>

	<?php include ("admin_nav.php"); ?>
</div>	
<div><h3 align="center">Employee info</h3></div>
<div class = "pad" align = center>


   <form action="" method="POST" >
                
                
                            <b>Search By Employee ID</b><br>
                            <input  style="width:200px;" type="text" name="searchid">
                      <br><br>
                <br><input type="submit" style="width:200px;" name="Search" value="Search" >
    </form>
</div>

<?php

     
    include("db.php");
	
   if (isset($_POST['Search'])) 
 {
	 
        if($_POST)                         
        {  
			$searchid =mysqli_real_escape_string($connection,$_POST['searchid']);
			
            if(!empty($_POST['searchid'])){
                $select = mysqli_query($connection, "SELECT * from info where e_id='$searchid' confirmation = 1");
			}
            else{
                $select = mysqli_query($connection, "SELECT * from info where confirmation = 1");
            }
            
        }
		else
		{
			echo mysqli_error($connection);
		}
		
   }
    
               
	if(!$_POST)         
   {
	    $select = mysqli_query($connection, "SELECT * from info where confirmation = 1");
   }
  $num_row = mysqli_num_rows($select);
   
 if( $num_row > 0) 
 {
?>
<body>
      <table>
          <tr>
              
              <th>Employee ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Mobile no</th>
              <th>Email</th>
			  <th>Age</th>
              <th>Address</th>
              <th>Gender</th>
			  <th>Designation</th>
			  <th>Apply date</th>
			  <th>Login access</th>
			  <th>Admin access</th>
			  <th>Salary given</th>
			  <th>Password</th>
			  <th>Join date</th>
              <th>Action</th>
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) ) { ?>
          <tr>
              <td><?php echo $userrow['e_id']; ?></td>
              <td><?php echo $userrow['firstname']; ?></td>
              <td><?php echo $userrow['lastname']; ?></td>
              <td><?php echo $userrow['mobi_no'] ;?></td>
              <td><?php echo $userrow['email']; ?></td>
              <td><?php echo $userrow['age']; ?></td>
              <td><?php echo $userrow['address']; ?></td>
			  <td><?php echo $userrow['gender']; ?></td>
			  <td><?php echo $userrow['designation']; ?></td>
			  <td><?php echo $userrow['created']; ?></td>
			 <td><?php if($userrow['confirmation']==1)
						{	
							echo "yes";
						}
						else 
						{
							echo"no";
						}
				   ?></td>
			  <td><?php if($userrow['admin']==1)
						{	
							echo "yes";
						}
						else 
						{
							echo"no";
						}
				   ?></td>
				 <td><?php if($userrow['salary_flag']==1)
						{	
							echo "yes";
						}
						else 
						{
							echo"no";
						}
						
					?></td>	
			  <td><?php echo $userrow['password']; ?></td>
			  <td><?php echo $userrow['date_of_join']; ?></td>
              <td>
                  <a href="edit_admin.php?id=<?php echo $userrow['e_id']; ?>"><span class="view" title="View"> edit</span></a> 
				
					<a href="send_salary.php?id=<?php echo $userrow['e_id']; ?>&designation=<?php echo $userrow['designation'];?>&email=<?php echo $userrow['email'];?>"><span class="view" title="View"> send salary</span></a>		
					
                  <a href="fire.php?id=<?php echo $userrow['e_id']; ?>&designation=<?php echo $userrow['designation'];?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
                      <span class="delete" title="Delete"> Delete</span>
                  </a>
              </td>
          </tr>
          <?php } ?>
      </table>
<?php } ?>
        
    </div>
</body>