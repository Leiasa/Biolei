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

if (isset($_POST['changebtn'])) {

     $first = mysql_real_escape_string($_POST['first-name ']);
     $last = mysql_real_escape_string($_POST['last-name']);
     $email = mysql_real_escape_string($_POST['email']);
     $school = mysql_real_escape_string($_POST['school']);
     $degree = mysql_real_escape_string($_POST['degree']);
     $schoolyear = mysql_real_escape_string($_POST['schoolyear']);
     $company = mysql_real_escape_string($_POST['company']);
     $position = mysql_real_escape_string($_POST['position']);
     $start = mysql_real_escape_string($_POST['start']);
     $end = mysql_real_escape_string($_POST['end']);

 $schooltablesql = "INSERT INTO academics(login_id, school, degree, year) VALUES ('$id', '$school', '$degree', '$year')";
 mysql_query($schooltablesql);

 $experiencesql = "INSERT INTO experience(login_id, company, position, start, end) VALUES ('$id', '$company', '$position', '$start', '$end')";
mysql_query($experiencesql);

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Biolei</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<!-- <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="edit-profile-label"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" action="" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="edit-profile">Edit Profile</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-name">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-name" name="first-name" placeholder="Full Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-dept">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-dept" name="last-dept" placeholder="Department" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-enrollment-no">Institution</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-enrollment-no" name="school" placeholder="Enrollment Number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-admission-year">Year</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="user-admission-year" name="schoolyear" placeholder="Admission Year" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-course">Degree</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-course" name="degree" placeholder="Course" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-email">Company</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="user-email" name="company" placeholder="E-mail Address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-phone">Position</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-phone" name="position" placeholder="Contact Number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-phone">Start Date</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-phone" name="start" placeholder="Contact Number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user-phone">End Date</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="user-phone" name="end" placeholder="Contact Number" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button name="changebtn" type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        
    </div>

      </body>

</html>