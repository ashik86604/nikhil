<?php
$insert = false;
error_reporting(0);
if(isset($_POST['submit'])){
   
    $server = "localhost";
    $username = "root";
    $password = "";

    
    $con = mysqli_connect($server, $username, $password);

    
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];  

    $checkuser="select * FROM `negi`.`signup` WHERE email='$email '";
    $result1 = mysqli_query($con,$checkuser);
    $count=mysqli_num_rows($result1);
    if($count>0){   
        echo  "<script> 
        alert('account already exist');
        </script>";
    }else{
    $sql = "INSERT INTO `negi`.`signup`(`name`,`email`,`password`,`phone`,`address`,`role`) VALUES ('$name','$email','$password','$phone','$address','$role');";
  
   $result = mysqli_query($con,$sql);
    if($result == true)
    {
        header('location:login.php');
    }
        else{
    echo '<script type="text/JavaScript"> 
     alert("please select your role");
     </script>';
   }
    }
}
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/signup.css">
    <title>Sign Up</title>
    <style>
        @media (max-width:1400px) {
            
    section{
    position:relative;
    width:100%;
    height:105vh;
    display:flex;
} 
        } 
    </style>
</head>
<body>
<section>
    <div class="imgbx">
        <img src="back.jpg">
    </div>
    <div class="contentbx">
        <div class="formbx">
            <h2>SIGHUP</h2>
           <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submiting your detials and enjoy our application</p>";
        }
        
    ?>
            <form action="" method="post">
                <div class="inputbx">
                    <span>Name</span>
                    <input type="text" name="name" required="" autocomplete="off">
                </div>
                <div class="inputbx">
                    <span>User Name</span>
                    <input type="text" name="email" required="" autocomplete="off">
                </div>
                <div class="inputbx">
                    <span>Password</span>
                    <input type="text" name="password" required="" autocomplete="off">
                </div>
                <div class="inputbx">
                    <span>Phone</span>
                    <input type="tel" maxlength="10" pattern="[0-9]{10}" required="" name="phone" autocomplete="off">
                </div>
               
                <div class="inputbx">
                    <span>Address</span>
                    <input type="text" name="address" required="" autocomplete="off">
                </div>
                
                <div class="inputbx">
                    <input type="submit" name="submit">
                </div>
            </form>
                
                    
            
        </div>
    </div>
    
</section> 
<?php
global $con;
session_start();
$_SESSION['id'] = $id; 
$_SESSION['role'] = $role; 
$_SESSION['email'] = $email; 
$_SESSION['phone'] = $phone; 
$_SESSION['address'] = $address;    
$_SESSION['name'] = $name; 
$_SESSION['password'] = $password; 



?>
</body>
</html>






