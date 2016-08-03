// Author: Leiasa Horanic

<div class="navbar navbar-inverse navbar-fixed-top " >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        <?php
        if($id != "")
        {
        ?>
        <a class="navbar-brand" href="home.php?id=<?php echo $id ?>" ><strong style=""></strong> Biolei </a>
        </div>
            <div class="navbar-collapse collapse move-me">
            <ul class="nav navbar-nav navbar-right set-links">
                <li><a href="home.php?id=<?php echo $id ?>">Welcome <?php echo $firstname ?> </a></li>
                <li><a href="myprojects.php?id=<?php echo $id ?>">Projects</a></li>
                <li><a href="profile.php?id=<?php echo $id ?>">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            </div>
        <?php
        }
        else 
        { 
        ?>  
        <a class="navbar-brand" href="home.php" ><strong style=""></strong> Biolei </a>
        </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right set-links">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                </ul>
            </div>
        <?php
        }
        ?>
    </div>

</div>