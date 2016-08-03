<?php
session_start();

include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))  { //check button clicked
    //check all fields filled out
    if(isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['first']) && !empty($_POST['first']) AND isset($_POST['last']) && !empty($_POST['last'])) { 
            $uname = mysql_real_escape_string($_POST['username']);
            $email = mysql_real_escape_string($_POST['email']);
            $upass = md5(mysql_real_escape_string($_POST['pass']));
            $upassconf = md5(mysql_real_escape_string($_POST['passconf']));
            $data = False;
            $web = False;
            $soft = False;
            $jobtype = 0;
            
            foreach ($_POST['option'] as $key) {
                if($key == 1) {
                    $data = True;
                }
                elseif ($key == 2) {
                    $web = True;
                }
                elseif ($key == 3) {
                    $soft = True;
                }
            }
            if($data AND $web AND $soft){
                $jobtype = 7;
            }
            elseif($data AND $web){
                $jobtype = 4;
            }
            elseif($web AND $soft){
                $jobtype = 5;
            }
            elseif($data AND $soft){
                $jobtype = 6;
            }
            elseif($data){
                $jobtype = 1;
            }
            elseif($web){
                $jobtype = 2;
            }
            elseif($soft){
                $jobtype = 3;
            }


            if($upass != $upassconf) { //check passwords match
            ?>
                <script>alert('error passwords do not match');</script>
            <?php
            }
            //check valid email
            elseif (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) { 
            ?>
                <script>alert('Invalid email');</script>
            <?php
            }
            //everything was good make account
            else
            {

                $sql_login = "INSERT INTO login(username, email, password) VALUES('$uname','$email','$upass')";

                $reg = mysql_query($sql_login);
                //mysql_query("INSERT INTO users(login_id, first, last, jobType) VALUES(5, 'test','test', '$jobtype')");
                    $sql = "SELECT id FROM login WHERE username='$uname'";
                    $res = mysql_query($sql);
                    $id = mysql_result($res, 0);
                    
                    $first = mysql_real_escape_string($_POST['first']);
                    $last = mysql_real_escape_string($_POST['last']);
                

                    $sql_user = "INSERT INTO users(login_id, first, last, jobType) VALUES('$id', '$first','$last', '$jobtype')";
                    
                    if(mysql_query($sql_user)){
                      ?>
                    <script>alert('USER TABLE INSERT TRUE successfully registered ');</script>
                    <?php  
                    }



                    // Email the user their activation link
                    $to = $email;              
                    $from = "auto_responder@yoursitename.com";
                    $subject = 'yoursitename Account Activation';
                    $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>yoursitename Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.yoursitename.com"><img src="http://www.yoursitename.com/images/logo.png" width="36" height="30" alt="yoursitename" style="border:none; float:left;"></a>yoursitename Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$first.',<br /><br />Click the link below to activate your account when ready:<br /><br /><a href="http://www.yoursitename.com/activation.php?id='.$id.'&u='.$uname.'&p='.$upass.'">Click here to activate your account now</a><br /><br />Login after successful activation using your:<br />* E-mail Address: <b>'.$email.'</b></div></body></html>';
                    $headers = "From: \n";
                    $headers .= "MIME-Version: 1.0\n";
                    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
                    mail($to, $subject, $message, $headers);
                    ?>
                    <script>alert('successfully registered ');</script>
                    <?php
                    header("Location:login.php");
                
               
            } 

            if(!$reg) {
                ?>
                    <script>alert('error while registering you...');</script>
                <?php
                }         
     
    }        
    else
    {
    ?>
        <script>alert('Please fill out all fields');</script>
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
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLE CSS -->
     <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
     <link rel="stylesheet" href="assets/css/signUp.css">
</head>
<body > 
   <?php include 'navbar.php'; ?>
    <!--HOME SECTION END-->
  <section id="login-sec">
	<div class="login">
		<div class="login-screen">
        <div class="login-form">           
<form method="post" action="">
			<div class="app-title">

				<h1>Create An Account</h1>
			</div>
  
 
  
  <h5 style="margin-top: 25px; margin-left: -170px;">Select Account Type:</h5>
  <div class="radio col-sm-3">
    
    

        <div class="control-group">
    <div>
      <input type="radio" name="choice-animals" id="choice-animals-cats">
      <label id="radiotext" for="choice-animals-cats">Bioinformatician</label>
    
    <div class="reveal-if-active">
        <select multiple name="option[]">
         <option value="1">Data Analyst</option>
         <option value="2">Web Developer</option>
        <option value="3">Software Design</option>
        </select>
      </div>
    </div>

    <div>
      <input type="radio" name="choice-animals" id="choice-animals-cats">
      <label id="radiotext" for="choice-animals-cats">Student</label>
    
    <div class="reveal-if-active">
        <select multiple name="option[]">
         <option value="1">Data Analyst</option>
         <option value="2">Web Developer</option>
        <option value="3">Software Design</option>
        </select>
      </div>
    </div>

    <div>
      <input type="radio" name="choice-animals" id="choice-animals-cats" required>
      <label id="radiotext" for="choice-animals-cats">Scientist</label>
    
    </div>
  </div>
  </div>

        <div class="control-group">
				<input type="text" class="login-field" value="" placeholder="first name" id="login-name" name="first">
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
        <input type="text" class="login-field" value="" placeholder="last name" id="login-last-name" name="last">
        <label class="login-field-icon fui-user" for="login-name"></label>
        </div>
               
        <div class="control-group">
        <input type="text" class="login-field" value="" placeholder="username" id="username" name="username">
        <label class="login-field-icon fui-user" for="login-name"></label>
        </div>        
                
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="email" id="email" name="email">
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="password" id="login-pass" name="pass">
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>
                
                <div class="control-group">
				<input type="password" class="login-field" value="" placeholder="confirm password" id="login-pass" name="passconf">
				<label class="login-field-icon fui-lock" for="login-pass" ></label>
				</div>


                <!-- to DO -->
				<!-- <a class="btn btn-primary btn-large btn-block" href="#">Sign Up</a> -->
	      <button type="submit" name="btn-signup" onclick="var options = ">Register</button>
        </form>
				<p> Already have an account?
                <a href="login.php">Login</a></p>
			</div>
		</div>
	</div>
    </section>


     <script type="text/javascript">
     var FormStuff = {
  
  init: function() {
    this.applyConditionalRequired();
    this.bindUIActions();
  },
  
  bindUIActions: function() {
    $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
  },
  
  applyConditionalRequired: function() {
    
    $(".require-if-active").each(function() {
      var el = $(this);
      if ($(el.data("require-pair")).is(":checked")) {
        el.prop("required", true);
      } else {
        el.prop("required", false);
      }
    });
    
  }
  
};

FormStuff.init();


 </script>  


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