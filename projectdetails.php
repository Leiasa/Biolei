<?php
//page should have title company/ owner name contact info description maybe link to profile page
//button to apply


include 'dbconnect.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    include 'dbconnect.php';
    $id = $_GET["id"];
    $sql = "SELECT first FROM users WHERE login_id='$id'";
    $result = mysql_query($sql);
    $firstname = mysql_result($result, 0);
}

$proid = $_GET["proid"];
$sql = "SELECT * FROM projects WHERE id='$proid'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);

$title = $row['title'];
$owner = $row['owner'];
$des = $row['description'];  
$emailid = $row['login_id'];

$sql = "SELECT email FROM login WHERE id='$emailid'";
$result = mysql_query($sql);
$email = mysql_result($result, 0);
?>

<!DOCTYPE html>
<html>
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
    <link href="assets/css/bootstrapProjects.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLE CSS -->
     <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

</head>
<body>
<section style="padding-top: 200px; padding-bottom: 200px;">
<div class="container">
   <?php include 'navbar.php'; ?>
	<p>
	<h2 style="margin-top: 100px;"><?php echo $title?></h2>
	<h5 style="padding-bottom: 50px;"><?php echo $owner ?></h5>
	<h5><?php echo $des ?></h5>

	<h5> Please email <?php echo $email ?> to apply</h5>
	</p>
	

	</div>
	</section>
	   <?php include 'footer.php'; ?>

</body>
</html>
