<?php
include 'dbconnect.php';

$id = $_GET["id"];
$sql = "SELECT * FROM users WHERE login_id='$id'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
$firstname = $row['first'];
$lastname = $row['last'];

/*TODO IMAGE
$image = $row['image'];

header("Content-type: image/jpg");
echo $image; */


$sql = "SELECT email FROM login WHERE id='$id'";
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
                            <a id="editbtn" class="btn btn-info pull-right btn-edit" href="uploadprofilepic.php?id=<?php echo $id ?>" data-toggle="modal" data-target="#edit-profile">
                                <i class="fa fa-edit"></i>
                                Edit Profile Picture
                            </a>
                             <a id="editbtn" class="btn btn-info pull-right btn-edit" href="editprofile.php?id=<?php echo $id ?>" data-toggle="modal" data-target="#edit-profile">
                                <i class="fa fa-edit"></i>
                                Edit Profile
                            </a>
                            <h3 class="user-name"><?php echo $firstname . " " . $lastname; ?> </h3>
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
                                $sql = "SELECT * FROM academics WHERE login_id='$id'";
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
                                $sql = "SELECT * FROM completedprojects WHERE login_id='$id'";
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
                                $sql = "SELECT * FROM experience WHERE login_id='$id'";
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
    
                
    

<!-- Modal -->
<div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="edit-profile-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="edit-profile">Edit Profile</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-name" name="user-name" placeholder="Full Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-dept">Department</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-dept" name="user-dept" placeholder="Department" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-year">Year</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="user-year" name="user-year" placeholder="Year" required>
                        </div>
                        <p class="visible-xs help-block"></p><!-- Spacer -->
                        <label class="col-sm-2 control-label" for="user-sem">Semester</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="user-sem" name="user-sem" placeholder="Semester" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-enrollment-no">Enrollment No.</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-enrollment-no" name="user-enrollment-no" placeholder="Enrollment Number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-admission-year">Admission Year</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="user-admission-year" name="user-admission-year" placeholder="Admission Year" required>
                        </div>
                        <p class="visible-xs help-block"></p><!-- Spacer -->
                        <label class="col-sm-2 control-label" for="user-dob">Date of Birth</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="user-dob" name="user-dob" placeholder="Date of Birth" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-course">Course</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-course" name="user-course" placeholder="Course" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-email">E-mail Address</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="user-email" name="user-email" placeholder="E-mail Address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-phone">Contact No.</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-phone" name="user-phone" placeholder="Contact Number" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        
    </div>
</div>
    </div>
        </div>
      </body>

</html>
