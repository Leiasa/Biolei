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
if (isset($_POST['submitbtn']))
{
    if(isset($_POST['title']) && !empty($_POST['title']) AND isset($_POST['owner']) && !empty($_POST['owner']) AND isset($_POST['contact']) && !empty($_POST['contact'])) { 
            $title = mysql_real_escape_string($_POST['title']);
            $owner = mysql_real_escape_string($_POST['owner']);
            $contact = mysql_real_escape_string($_POST['contact']);
            $des = mysql_real_escape_string($_POST['des']);
            $req = mysql_real_escape_string($_POST['req']);
            $payment = mysql_real_escape_string($_POST['payment']);

            $sql = "INSERT INTO projects(login_id, title, owner, description, qualifications, payment) VALUES ('$id', '$title', '$owner', '$des', '$req', '$payment')";
            if (mysql_query($sql))
            {
                ?>
                <script>alert('Project Was Successfully Added');</script>
            <?php
            }

            

//insert project into projects table
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
    <link href="assets/css/style.css" rel="stylesheet" >
    <link rel="stylesheet" href="assets/css/profile.css">
     <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"/>
    <link rel="stylesheet" href="assets/css/1-col-portfolio.css"/>
</head>
<body > 
            <?php include 'navbar.php'; ?>
            <section>
                <div class="container">
           

            <form action="" method="post">
                <div class="modal-header">
        
                    <h4 class="modal-title" id="edit-profile">Create New Project</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-name">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-name" name="title" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-dept">Company</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-dept" name="owner" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-dept">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-dept" name="des" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-dept">Requirements</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-dept" name="req">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-dept">Payment</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-dept" name="payment">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-dept">Contact</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-dept" name="contact" required>
                        </div>
                    </div>
                  </div>
                  <button  name ="submitbtn" id="submitbtn" type="submit" class="w3-btn btn-info btn-lg btn-set w3-black"> Create </button>
  
                
                  
            </form>
            </div>
             </section>
   

           <?php include 'footer.php'; ?>
</body>
</html>
         