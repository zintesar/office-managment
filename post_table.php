
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
<div><h3 align="center">Post info</h3></div>
<div class = "pad" align = center>


   <form action="" method="POST" >
                
                
                            <b>Search By Post name </b><br>
                            <input  style="width:200px;" type="text" name="searchid">
                      <br><br>
                <br><input type="submit" style="width:200px;" name="Search" value="Search" >
    </form>
</div>
<div  align = center >
<form action="add_post.php">
<input type = "submit" style="width:200px;" value ="Add post">
</form>

</pad>
</div>

<?php

     
    include("db.php");
	
   if (isset($_POST['Search'])) 
 {
	 
        if($_POST)                         
        {  
			$searchid =mysqli_real_escape_string($connection,$_POST['searchid']);
			
            if(!empty($_POST['searchid'])){
                $select = mysqli_query($connection, "SELECT * from posts where designation='$searchid' ");
			}
            else{
                $select = mysqli_query($connection, "SELECT * from posts ");
            }
            
        }
		else
		{
			echo mysqli_error($connection);
		}
		
   }
    
               
	if(!$_POST)         
   {
	    $select = mysqli_query($connection, "SELECT * from posts ");
   }
  $num_row = mysqli_num_rows($select);
   
 if( $num_row > 0) 
 {
?>
<body>
      <table>
          <tr>
              
              <th>Post ID</th>
              <th>Designation</th>
              <th>Number of posts</th>
			  <th>Salary</th>
			  <th>Requirment</th>
           
              <th>Action</th>
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) ) { ?>
          <tr>
              <td><?php echo $userrow['ID']; ?></td>
              <td><?php echo $userrow['designation']; ?></td>
              <td><?php echo $userrow['number_post']; ?></td>
              <td><?php echo $userrow['salary'] ;?></td>
			   <td><?php echo $userrow['requirement'] ;?></td>
             
              
              <td>
                  <a href="edit_post.php?id=<?php echo $userrow['ID']; ?>"><span class="view" title="View"> edit</span></a> 
				
							
					
                  <a href="delete_post.php?id=<?php echo $userrow['ID']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
                      <span class="delete" title="Delete"> Delete</span>
                  </a>
              </td>
          </tr>
          <?php } ?>
      </table>
<?php } ?>
        
    </div>
</body>