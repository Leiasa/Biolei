// Author: Leiasa Horanic
<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    include 'dbconnect.php';
    $id = $_GET["id"];
    $sql = "SELECT first FROM users WHERE login_id='$id'";
    $result = mysql_query($sql);
    $firstname = mysql_result($result, 0);
}

?>

<!DOCTYPE html>
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
    <!--NAV BAR SECTION-->
    <?php include 'navbar.php'; ?>

    <!--Title SECTION -->
    <section id="home-sec">
        <div class="overlay text-center">
            <h1><strong>Biolei</strong></h1>
            <hr class="hr-set"/>
            <p>Find Someone With the Experience You Need </p>
        </div>
    </section>

    <!--SERVICES SECTION END-->
    <section id="services-sec">
        <h5><center>Who Are You Looking For?</center></h5>
        <div class="container">
            <div class="row text-center" >
            <div class="col-md-4">
                <a href="dataanalyst.php?id=<?php echo $id ?>"><i class="fa fa-line-chart fa-5x icon-custom-1 color-1" style="color:teal"></i></a>
                <h3>Data Analyst</h3>
                <p>
                Are you looking for someone to transform your data into readable outputs or help analyze your data? Search our Data Analyst 
                </p>
            </div>
            <div class="col-md-4">
                <a href="webdeveloper.php?id=<?php echo $id ?>"><i class="fa fa-globe fa-5x icon-custom-1 color-1" style="color:teal" ></i></a>
                <h3>Web Developer </h3>
                <p>
                Are you looking for someone to build and design a website? Search our Web Developers
                </p>
            </div>
            <div class="col-md-4">
                <a href="software.php?id=<?php echo $id ?>"><i class="fa fa-file-code-o fa-5x icon-custom-1 color-1" style="color:teal"></i></a>
                <h3>Software Developer</h3>
                <p>
                Are you looking for someone to design a specific tool? Search our Software Developers
                </p>
            </div>
            </div>
        </div>
    </section>

    <!--FIND PROJECT SECTION-->
	<section id="findProject-sec">
        <div class="container">
            <center>
                <h1> Explore Available Jobs</h1>
                <a href="projects.php?id=<?php echo $id ?>" class="w3-btn btn-info btn-lg btn-set w3-teal">Find Project</a>
                <h2> Why work as a freelancer? <a href="about.php?id=<?php echo $id ?>">Click here to find out</a></h2>
            </center>
        </div>
    </section>

    <!-- FOOTER  -->
    <?php include 'footer.php'; ?>


    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
