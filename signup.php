<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['signup']))
{
//code for captach verification
/*if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {  */  
//Code for student ID
$count_my_page = ("studentid.txt");
$hits = file($count_my_page);
$hits[0]++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp); 
$StudentId= $hits[0];   
$target="upload pics/".basename($_FILES['image']['name']);
$rollno=$_POST['rollnum'];
$fname=$_POST['fullanme'];
$dob=$_POST['dob'];
$year=$_POST['year'];
$branch=$_POST['branch'];
$mobileno=$_POST['mobileno'];
$email=$_POST['email']; 
$password=md5($_POST['password']); 
$imagee=$_FILES['image']['name'];
$status=1;
$sql="INSERT INTO  tblstudents(StudentId,RollNum,FullName,DateOfBirth,Year,Branch,MobileNumber,EmailId,Password,Image,Status) VALUES(:StudentId,:rollno,:fname,:dob,:year,:branch,:mobileno,:email,:password,:imagee,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':StudentId',$StudentId,PDO::PARAM_STR);
$query->bindParam(':rollno',$rollno,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->bindParam(':branch',$branch,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':imagee',$imagee,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    echo '<script>alert("Your Registration is successfull and your student id is  "+"'.$StudentId.'");</script>';
    //echo '<script>alert("Your Registration is successfull and your student id is  "+"'.$imagee.'");</script>';
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";

    if(move_uploaded_file(($_FILES)['image']['tmp_name'],$target)){
        echo "<div><center><h1>uploaded</h1></center></div?";
        //echo "<script>alert('Your Registration is successfull and your student id is');</script>";

    }
    else{
        echo "error in uploading";
    }
    //echo '<script>alert("Your Registration is successfull and your student id is  "+"'.$StudentId.'");</script>';
    
//echo '<script>alert("Your Registration successfull and your student id is  "+"'.$imagee.'") </script>';
    
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
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
    <title>Online Library Management System | Student Signup</title>
    <link rel = "icon" href =  "assets/img/book.jpg" type = "image/x-icon">
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
//redirect to login page
}
</script>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script>    

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">User Signup Form</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           SINGUP FORM
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post" enctype="multipart/form-data" autocomplete ="off" onSubmit="return valid();">
<div class="form-group" >
<label>Roll Number</label>
<input class="form-control" type="text" name="rollnum" placeholder="Enter Roll no"  maxlength="10"  required />
</div>
<div class="form-group" >
<label>Full Name</label>
<input class="form-control" type="text" name="fullanme" placeholder="Enter Full Name"  required />
</div>
<div class="form-group" >
<label>Date Of Birth</label>
<input class="form-control" type="date"name="dob",placeholder="Enter DOB",maxlength=10 required/>
<!--<script type="text/javascript">
    $(function(){
        $("#in_dob").datepicker({dateFormat: 'yy-mm-dd', yearRange:'-25:+0', changeYear:true,changeMonth:true});
    });</script>-->

    

</div>
<div class="form-group" >
<label>Year</label>
<input class="form-control" type="text" name="year" placeholder="Enter Year"  required />
</div>
<div class="form-group" >
<label>Branch</label>
<input class="form-control" type="text" name="branch" placeholder="Enter Branch"  required />
</div>

<div class="form-group">
<label>Mobile Number</label>
<input class="form-control" type="text" name="mobileno" placeholder="Enter phnno"maxlength="10"  required />
</div>
                                        
<div class="form-group">
<label>Email ID</label>
<input class="form-control" type="email" name="email" placeholder="Enter Email"id="emailid" onBlur="checkAvailability()"  required  />
   <span id="user-availability-status" style="font-size:12px;"></span> 
</div>

<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" placeholder="Enter Password"  required  />
</div>

<div class="form-group">
<label>Confirm Password </label>
<input class="form-control"  type="password" name="confirmpassword" placeholder="Enter Confirm Password"  required  />
</div>
<div class="form-group">
<label>Image </label>
<input class="form-control"  type="file" name="image" placeholder="Upload Image" />
</div>
 <!--<div class="form-group">
<label>Verification code : </label>
<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">-->
</div>                           
<button type="submit" name="signup" class="btn btn-danger" id="submit" >Register Now</button>
                                    </form>
                            </div>
                        </div>
                            </div>  
        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
