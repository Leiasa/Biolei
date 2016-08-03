<?php
session_start();
include 'dbconnect.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    
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
    <link href="assets/css/bootstrapProjects.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLE CSS -->
     <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body> 
    <!--NAV BAR SECTION-->
    <?php include 'navbar.php'; ?>



<section class="headline-sec">
        <div class="overlay">
        <div class="container">    
        <div class="row">
        <div class="col-md-4">
                <h3> Software Developers <i class="fa fa-angle-double-right "></i> </h3>
          
      <form method="post">
        <input id="searchtextbox" style="margin: 0px 50px 50px 700px;" type="text" class="form-control input-cls" placeholder="Find A Project" name="text"/> 
        
    
        <button  name="searchbtn" id="searchbtn" style="margin: -110px 0px 50px 1010px;" type="submit" class="w3-btn btn-info btn-lg btn-set w3-black"> <i class="fa fa-search"></i> </button>
        
       
        </div>
        </div>    
        </div> 
        </div>


    </section>
           
    <div class="container">

        <?php 
    if(!isset($_POST['searchbtn']))
      {  
        $sql = "SELECT * FROM users WHERE jobType = 3 OR jobType = 5  OR jobType = 6 OR jobType = 7";
        $res = mysql_query($sql);
        while($row = mysql_fetch_array($res))
        { 
            $viewid = $row['login_id'];
            $first = $row['first'];
            $last = $row['last'];   
        ?>    
            <div class="row">
        
            <div class="col-md-5">
                 
                <h5><?php echo $first." ". $last ?></h5>
                <a class="btn btn-primary" style="background-color:teal;" href="viewprofile.php?id=<?php echo $id ?>&viewid=<?php echo $viewid?>"> View Profile <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <hr>
        <?php
        }
       }
       else{
        $text = mysql_real_escape_string($_POST['text']);

        $sql = "SELECT * FROM users WHERE first LIKE '%$text%' OR last LIKE '%$text%'";
        $res = mysql_query($sql);
        while($row = mysql_fetch_array($res))
        { 
            $viewid = $row['login_id'];
            $first = $row['first'];
            $last = $row['last'];   
        ?>    
            <div class="row">
        
            <div class="col-md-5">
                 
                <h5><?php echo $first." ". $last ?></h5>
                <a class="btn btn-primary" style="background-color:teal;" href="viewprofile.php?id=<?php echo $id ?>&viewid=<?php echo $viewid?>"> View Profile <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <hr>
        <?php
        }

       } 
        ?>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

    </div>




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
   
