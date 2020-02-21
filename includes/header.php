<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <!-- <a href="index.php"class="navbar-brand" >-->
                <br>

                    <img src="assets/img/logo.png" />
                

            </div>
<?php

if($_SESSION['login'])
{
    
?> 

            <!--<div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>-->
            <div class="right-div">
                <ul id="menu-top" class="nav navbar-nav navbar-right" >

              
                                <!--<a href="#" style="text-decoration:none" "font-size:10px" "color:#d9534f" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Account</a>-->

                                <img src="upload pics/<?php echo $_SESSION['image']; ?>"   onerror="this.src='assets/img/images.png';" 
                               width="70" height="70" class="dropdown-toggle" id="ddlmenu/item" data-toggle="dropdown" 
                               style='border-radius: 80%'/>
                                <ul class="dropdown-menu dropdown-menu-center" role="menu" aria-labelledby="ddlmenuItem" style="margin-right:5%";>
           
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php">My Profile</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout</a></li>

                                </ul>
                            </ul>
                            </div>
          
            <div class="right-div">

                           <!--
                            while($rows=mysql_fetch_assoc($_SESSION['image']))
                            {

                                $im=$rows['imagee'];
                                 echo "<img src='$im'>";
                            }
                            ?>-->
                            <!--<img src="upload pics/<?php echo $_SESSION['image']; ?>"   onerror="this.src='assets/img/images.png';" 
                               width="50" height="50" style='border-radius: 50%;'/>-->

                               

            </div>

            <?php }?>
        </div>
    </div>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login'])
{
?>    
<section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active">DASHBOARD</a></li>
                           
                          
   <!--<li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php">My Profile</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
                                </ul>
                            </li>-->
                            <li><a href="issued-books.php">Issued Books</a></li>
                            <li><a href="books-available.php">Books Availabilty</a></li>

                          

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php } else { ?>
        <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                          
                            <li><a href="adminlogin.php">Admin Login</a></li>
                            <li><a href="signup.php">User Signup</a></li>
                             <li><a href="index.php">User Login</a></li>
                          

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php } ?>