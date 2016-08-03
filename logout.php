<?php

 session_destroy();

 unset($_SESSION['user']);

 $_SESSION['loggedin'] = false;

 unset($_SESSION['loggedin']);

 header("Location: home.php");

?>