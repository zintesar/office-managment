<!doctype html>
<html>
<head>
<title> </title>

<link rel="stylesheet" href="./css/mystyle.css">

<style>



</style>

</head>

<body style = "margin : 0px 0px 0px 0px"  >

<div>
<?php include ("header.php"); ?>
</div>

<div>

	<?php include ("admin_nav.php"); ?>
</div>	
 <?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
<h1 align = center> Welcome <?php echo $_SESSION['firstname'] ?> </h1>
<h2 align = center> You are logged in as admin </h2>




</body>
</html>

