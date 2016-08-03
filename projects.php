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


if(isset($_POST['addbtn']))
{
   if($id!="") 
    { 
        header("Location: addproject.php?id=".$id);
    } 
    else 
    { 
        ?>
        <script>alert('You Must Be Logged In To Create A Project');</script>
    <?php
    } 
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
    <link rel="stylesheet" href="assets/css/1-col-portfolio.css">
</head>
<body > 
            <?php include 'navbar.php'; ?>

    <!--MENU SECTION END-->
   <section class="headline-sec">
        <div class="overlay">
        <p>
            <h3> Projects  <i class="fa fa-angle-double-right "></i></h3>
            <form method="post">
        <input id="searchtextbox" style="margin: 0px 50px 50px 700px;" type="text" class="form-control input-cls" placeholder="Find A Project" name="text"/> 
        
    
        <button  name="searchbtn" id="searchbtn" style="margin: -110px 0px 50px 1010px;" type="submit" class="w3-btn btn-info btn-lg btn-set w3-black"> <i class="fa fa-search"></i> </button>
        
        <button  name="addbtn" id="addbtn" style="margin: 0px 50px 50px 700px;"class="w3-btn btn-info btn-lg btn-set w3-black">Create New Project</button>
        </form>
        </p>
        </div>
         
    </section>
           
<!--          <ul>
            <li>Projects <i class="fa fa-angle-double-right "></i></li>
       <li> <input type="text" class="form-control input-cls"/>   </li> 
       <li> <button type="submit" class="w3-btn btn-info btn-lg btn-set w3-black"> <i class="fa fa-search"></i> </button> </li>
   
              </ul>-->
      

    <!--HOME SECTION END-->
      <!-- Page Content -->
    <div class="container">


        <!-- Project One -->
        <?php 
        if(!isset($_POST['searchbtn'])){
        $sql = "SELECT * FROM projects";
        $res = mysql_query($sql);
        while($row = mysql_fetch_array($res))
        { 
            $proid = $row['id'];
            $title = $row['title'];
            $owner = $row['owner'];
            $des = $row['description'];   
        ?>    
            <div class="row">
        
            <div class="col-md-5">
                <h2><strong> <?php echo $title ?></strong></h2>
                <h5><?php echo $owner ?></h5>
                <p><?php echo $des ?></p>
                <a class="btn btn-primary" href="projectdetails.php?id=<?php echo $id ?>&proid=<?php echo $proid ?>"> View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <hr>
        <?php
        }
        }
        else {
    $text = mysql_real_escape_string($_POST['text']); ?> 
<h2><strong> Searched for "<?php echo $text ?>" </strong></h2> <?php
    $sql = "SELECT * FROM projects WHERE title LIKE '%$text%' OR owner LIKE '%$text%' OR description LIKE '%$text%'";
    $res = mysql_query($sql);
        while($row = mysql_fetch_array($res))
        { 
            $proid = $row['id'];
            $title = $row['title'];
            $owner = $row['owner'];
            $des = $row['description'];   
        ?>    
            <div class="row">
        
            <div class="col-md-5">
                <h2><strong> <?php echo $title ?></strong></h2>
                <h5><?php echo $owner ?></h5>
                <p><?php echo $des ?></p>
                <a class="btn btn-primary" href="projectdetails.php?id=<?php echo $id ?>&proid=<?php echo $proid ?>"> View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
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

    <?php include 'footer.php' ?>

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