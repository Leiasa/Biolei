<?php
session_start();
include 'dbconnect.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    
    $id = $_GET["id"];
    $viewid = $_GET["viewid"];
    $sql = "SELECT first FROM users WHERE login_id='$id'";
    $result = mysql_query($sql);
    $firstname = mysql_result($result, 0);
}


$sql = "SELECT * FROM users WHERE login_id='$viewid'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
$vfirstname = $row['first'];
$vlastname = $row['last'];

/*TODO IMAGE
$image = $row['image'];

header("Content-type: image/jpg");
echo $image; */


$sql = "SELECT email FROM login WHERE id='$viewid'";
$res = mysql_query($sql);
$email = mysql_result($res, 0);

?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Biolei</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>
    <!-- Navigation -->
    <?php include 'navbar.php'; ?>
    
    <div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <div id="firstcard" class="panel panel-default profile-panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 text-center" >
                            <img src="assets/img/user.jpg" class="img-circle user-image">
                        </div>
                        <div class="col-sm-9 col-xs-12 user-info-box">
                            
                            <h3 class="user-name"><?php echo $vfirstname . " " . $vlastname; ?> </h3>
                            <p><strong>Contact<span class="user-dept"> </span></strong></p>
                            <p><span class="user-year"> Email: <?php echo $email ?>  </span> </p>
                            <div id="more-info-panel" class="collapse out">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="panel panel-default academic-panel">
                <div class="panel-body">
                    <h3><i class="fa fa-book fa-lg"></i> Academic History</h3>
                    <hr class="colorgraph">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                            
                                <th>Insitution</th>
                                <th>Degree</th>
                                <th>Year</th>
                              
                            </tr>
                        </thead>
                        <?php
                                $sql = "SELECT * FROM academics WHERE login_id='$viewid'";
                                $res = mysql_query($sql);
                                while($row = mysql_fetch_array($res))
                                {
                                    $school = $row['school'];
                                    $degree = $row['degree'];
                                    $year = $row['year'];
                            ?>
                                <tbody>
                                <tr>
                                <td><?php echo $school ?></td>
                                <td><?php echo $degree ?></td>
                                <td><?php echo $year ?></td>
                                </tr>
                                </tbody>
                            <?php
                                }    
            
            ?>
                        
                    </table>
                </div>
            </div>
            
            <div class="panel panel-default projects-panel">
                <div class="panel-body">
                    <h3><i class="fa fa-folder-open fa-lg"></i> Projects</h3>
                    <hr class="colorgraph">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                              
                                <th>Name</th>
                                <th>Description</th>
                                <th></th>
                                <th></th>
                                <th>Dates</th>
                               
                            </tr>
                        </thead>
                         <?php
                                $sql = "SELECT * FROM completedprojects WHERE login_id='$viewid'";
                                $res = mysql_query($sql);
                                while($row = mysql_fetch_array($res))
                                {
                                    $projectid = $row['project_id'];
                                    $date = $row['date'];
                                    $result = mysql_query("SELECT * FROM projects WHERE id='$projectid'");
                                    $title = $row['title'];
                                    $des = $row['des'];

                                   
                            ?>
                                <tbody>
                                <tr>
                                <td><?php echo $title ?></td>
                                <td><?php echo $des ?></td>
                                <td><?php echo $date ?></td>
                                </tr>
                                </tbody>
                            <?php
                                }    
            
            ?>
                    </table>
                </div>
            </div>
            
            <div class="panel panel-default achievements-panel">
                <div class="panel-body">
                    <h3><i class="fa fa-trophy fa-lg"></i> Experience</h3>
                    <hr class="colorgraph">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Company </th>
                                <th>Position</th>
                                <th>Dates</th>
                                
                            </tr>
                        </thead>
                         <?php
                                $sql = "SELECT * FROM experience WHERE login_id='$viewid'";
                                $res = mysql_query($sql);
                                while($row = mysql_fetch_array($res))
                                {
                                    $company = $row['company'];
                                    $position = $row['position'];
                                    $start = $row['start'];
                                    $end = $row['end'];
                            ?>
                                <tbody>
                                <tr>
                                <td><?php echo $school ?></td>
                                <td><?php echo $degree ?></td>
                                <td><?php echo $start." - ". $end ?></td>
                                </tr>
                                </tbody>
                            <?php
                                }    
            
            ?>
                    </table>
                </div>
            </div>
        </div>
    
            
        </div>
        </div>
      </body>

</html>
