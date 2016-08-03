
<?php

session_start();
include 'dbconnect.php';

if(isset($_POST['btn-login']))
{
    $username = mysql_real_escape_string($_POST['username']);
    $upass = mysql_real_escape_string($_POST['password']);
    $res=mysql_query("SELECT * FROM login WHERE username='$username'");
    $row=mysql_fetch_array($res);
    if($row['password']==md5($upass))    
    {
        $_SESSION['loggedin'] = true;
        $id = $row['id'];
        $_SESSION['user'] = $id;
        header("Location: home.php?id=".$id);
    }
    else
    {
    ?>
        <script>alert('wrong details');</script>
    <?php
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
     <link rel="stylesheet" href="assets/css/logIn.css">
</head>
<body > 
   
 <?php include 'navbar.php'; ?>

    <!--HOME SECTION END-->
  <section id="login-sec">
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>

			<div class="login-form">
			    <form method="post">
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="username" id="login-name" name = "username">
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="password" id="login-pass" name="password">
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>
				<button type="submit" name="btn-login">login</button>
				<!--<a class="btn btn-primary btn-large btn-block" type="submit" name="btn-login">login</a>-->
			    </form>	
				<a class="login-link" href="#">Forgot your password?</a>
				<p> Don't have an account?
                <a href="signup.php">Sign Up</a></p>
			</div>
		</div>
	</div>
    </section>
    
    <?php include 'footer.php'; ?>

     <!-- COPY TEXT SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
