<!doctype html>
<html>
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
<h3 align="center">Registration Requests</h3>
<div>
<?php

   include('db.php');
    $select = mysqli_query($connection, "SELECT * FROM info where confirmation=0");
    $num_row = mysqli_num_rows($select);

    if( $num_row >0 )
		{
?>
      <table>
          <tr>
              <th>Employee ID</th>
              <th>First Name</th>
              <th>Last Name</th>
			  <th>Mobile</th>
              <th>Email</th>
              <th>Address</th>
			  <th>Gender</th>
			  <th>Designation</th>
			  <th>Created</th>
              <th>Action</th>
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) ) { ?>
          <tr>
              <td><?php echo $userrow['e_id']; ?></td>
              <td><?php echo $userrow['firstname']; ?></td>
              <td><?php echo $userrow['lastname']; ?></td>
			  <td><?php echo $userrow['mobi_no']; ?></td>
              <td><?php echo $userrow['email']; ?></td>
              <td><?php echo $userrow['address']; ?></td>
			  <td><?php echo $userrow['gender']; ?></td>
			  <td><?php echo $userrow['designation']; ?></td>
			   <td><?php echo $userrow['created']; ?></td>
              <td>
                  <a href="employee_accept.php?id=<?php echo $userrow['e_id']; ?>&email=<?php echo $userrow['email']; ?>&designation=<?php echo $userrow['designation']; ?>&firstname=<?php echo $userrow['firstname'];?>"><span> Accept</span></a> 
                  
                  <a href="employee_reject.php?id=<?php echo $userrow['e_id']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');"><span> Delete</span></a>
              </td>
          </tr>
          <?php } ?>
      </table>
<?php } ?>
	<? else 
	{
			echo "no new rewquest";
	}	
	?>
</div>
