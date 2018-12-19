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
    $select = mysqli_query($connection, "SELECT attendance.date , attendance.e_id , info.firstname , attendance.attendance  FROM attendance JOIN info ON attendance.e_id = info.e_id ORDER BY attendance.date ASC");
    $num_row = mysqli_num_rows($select);

    if( $num_row >0 )
		{
?>
      <table>
          <tr>
              <th>date</th>
			  <th>Employee ID</th>

              <th>First Name</th>
			  
              <th>Attendance</th>
			 
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) ) { ?>
          <tr>
              <td><?php echo $userrow['date']; ?></td>
			  <td><?php echo $userrow['e_id']; ?></td>
              <td><?php echo $userrow['firstname']; ?></td>
              <td><?php echo $userrow['attendance']; ?></td>
              
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
