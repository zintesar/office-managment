<?php 
include("db.php");
$sql = mysqli_query($connection,"select * from posts where number_post > 0 ");
  /*while($result=mysqli_fetch_array($sql))
  {
	  print_r($result);
  }	  
	*/
	$num_rows=mysqli_num_rows($sql);
?>


<!doctype html>
<html>
<head>


<title> </title>

	
	<link rel="stylesheet" href="./css/mystyle.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css"> 
	<link rel="stylesheet" href="./css/foundation.css">
	<script src = "./js/jquery.min.js"></script>
	<script src = "./js/bootstrap.min.js"></script>

<style>

<style>	
</style>

</style>

</head>

<body  class="body_design" style = "margin : 0px 0px 0px 0px"  >


<div>
<?php include ("header.php"); ?>
</div>

<div class="container">
  <h2 align=center >Welcome </h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style = "">
      <div class="item active">
        <img src="./images/1.jpg" alt="Los Angeles" style="width:100%; height : 60%;">
      </div>

      <div class="item">
        <img src="./images/2.jpg" alt="Chicago" style="width:100%; height : 60%; ">
      </div>
    
      <div class="item">
        <img src="./images/3.jpg" alt="New york" style="width:100%; height : 60% ;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
      
	<div style= "padding-top : 50px;" >
	<h3 style = "text-align :center"> News Feed </h3>
     <div class="lighten">
	<div class="row">
	
		<div class="small-12 medium-12 columns" style = "text-align : center" >
		<?php
			if($num_rows>0)
			{	
				while($result=mysqli_fetch_array($sql))
				{	?>
				<div class="small-12 medium-4 columns" style = "text-align : center">
				<p class="text-center"><i class="fa fa-support fa-4x"></i></p>
				<h4>We are hiring <?php echo $result['designation'] ;?> </h4>
				<p>Requirments : <?php echo $result['requirement'];?></p>
				<form>
				<input type="button" value="Apply here" onclick="window.location ='post_application.php?post=<?php echo $result['designation']?>'">
				</form>
				</div>
			<?php
			
				}
			
			}

			?>
			
		</div>
		
	</div>
</div>
</div>
</body>
</html>