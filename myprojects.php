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
        <p>
            <h3> My Projects  <i class="fa fa-angle-double-right "></i></h3>
        
    
       <a href="projects.php?id=<?php echo $id ?>"> <button  id="addbtn" style="margin: -20px 0px 50px 700px;"class="w3-btn btn-info btn-lg btn-set w3-black"> View All Projects</button></a>
  
        <a href="addproject.php?id=<?php echo $id ?>"><button  id="addbtn" style="margin: -115px 50px 50px 1000px;"class="w3-btn btn-info btn-lg btn-set w3-black" > Create New Project</button></a>
        </p>
        </div>
         
    </section>
    <!--HOME SECTION END-->
    <section>


<div class="container">
        <?php 

        $sql = "SELECT * FROM projects WHERE login_id='$id'";
        $res = mysql_query($sql);
        if(mysql_num_rows($res) > 0)
        {	
        	?>
        <h2><strong> Owned Projects:</strong></h2>
        <hr class="hr-set" COLOR="teal" SIZE="100">
        <hr COLOR="teal" SIZE="100">
        <!-- Project One -->
        <?php 

        	
	        while($row = mysql_fetch_array($res))
	        { 
	            $title = $row['title'];
	            $owner = $row['owner'];
	            $des = $row['description'];   
	        ?>    
	            <div class="row">
	        
	            <div class="col-md-5">
	                <h2><strong> <?php echo $title ?></strong></h2>
	                <h5><?php echo $owner ?></h5>
	                <p><?php echo $des ?></p>
	                <a class="btn btn-primary" style="background-color:teal;" href="projectdetails.php?id=<?php echo $id ?>"> View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
	            </div>
	        </div>
	        <hr>
	        <?php
        	}
    	}
    	else {
    		?>
    		<div class="row">
	        
	        <div class="col-md-5">
    		<h2><strong> No Owned Projects</strong></h2>
    		</div>
    		</div>
    	<?php	
    	}
        /*
        $sql = "SELECT * FROM projects WHERE login_id='$id'";
        $res = mysql_query($sql);
        if(mysql_num_rows($res) > 0)
        {	
        	?>
        <h2><strong> Project In Progress:</strong></h2>
        <hr class="hr-set" COLOR="teal" SIZE="100">
        <hr COLOR="teal" SIZE="100">
        <!-- Project One -->
        <?php 

        	
	        while($row = mysql_fetch_array($res))
	        { 
	            $title = $row['title'];
	            $owner = $row['owner'];
	            $des = $row['description'];   
	        ?>    
	            <div class="row">
	        
	            <div class="col-md-5">
	                <h2><strong> <?php echo $title ?></strong></h2>
	                <h5><?php echo $owner ?></h5>
	                <p><?php echo $des ?></p>
	                <a class="btn btn-primary" style="background-color:teal;" href="projectdetails.php?id=<?php echo $id ?>"> View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
	            </div>
	        </div>
	        <hr>
	        <?php
        	}
    	}
    	else {
    		?>
    		<div class="row">
	        
	       	<hr class="hr-set">
    		<h2><strong> You Are Not Working On Any Projects</strong></h2>
    		</div>
    		</div>
    	<?php	
    	}
    	*/
        ?>

</div>
</section>
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
