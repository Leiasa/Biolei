
<?php
session_start();
include 'dbconnect.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    
    $id = $_GET["id"];
    $sql = "SELECT first FROM users WHERE login_id='$id'";
    $result = mysql_query($sql);
    $firstname = mysql_result($result, 0);
    //$firstname = "tester";
}

if(isset($_POST['submit']))
{

 	$imagename = mysql_real_escape_string($_FILES["image"]["name"]);
 	$imagedata = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
 	$imagetype = mysql_real_escape_string($_FILES["image"]["type"]);	

 	if (substr($imagetype,0,5) == "image")
 	{
 		mysql_query("UPDATE 'users' SET image = $imagedata WHERE login_id = $id");
 		echo $imagedata;
 		echo "success!";
 	}
 	else
 	{
 		echo "Only images are aloud";
 	}	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Biolei</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLE CSS -->
     <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>
	<?php include 'navbar.php'; ?>
	<section id="findProject-sec">
	<div class="container">
	<div class="row text-center" >
	<form method="post" enctype="multipart/form-data">
		<center><strong><input style="margin-top: 100px;"type="file" name="image"> </input> </strong></center>
		<input style="background-color:teal; color:white; margin-top: 50px; " type="submit" name="submit" value="Upload"></input>
	</form>
	</div>
	</div>
	</section>
	<section id="footer-sec">
	<?php include 'footer.php'; ?>
	</section>
</body>
</html>




