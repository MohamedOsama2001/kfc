<?php
require_once("connection.php");
if(isset($_POST["name"])==true && $_POST["name"]!="")
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $user_type=$_POST["user_type"];
    $r=$con->query("SELECT*FROM users WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($r)>0)
    {
        $message[]="user already exist click on login now!";
    }
    else
    {
        if($cpassword != $password)
        {
            $message[]="confirm password not matched!";
        }
        else
        {
            $con->query("INSERT INTO users VALUES(null,'$name','$email','$password','$user_type')");
            if($con->affected_rows!=0)
            {
                header("location:index.php");
            }
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
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
    <script>
        function val()
        {
            n=document.getElementById("name").value;
            e=document.getElementById("email").value;
            p=document.getElementById("password").value;
            cp=document.getElementById("cpassword").value;
            if(n=="" || e=="" || p=="" || cp=="")
            {
                alert("empty field");
            }
            else
            {
                document.myform.submit();
            }
        }
    </script>
</head>
<body style="background-color: var(--bodycolor);">
<?php
if(isset($message))
{
    foreach($message as $message)
    echo'
    <div class="message m-2 d-flex justify-content-center align-items-center fs-2 p-5 border border-dark position-relative">
        <span>'.$message.'</span>
        <i class="fas fa-times position-absolute m-2" onclick="this.parentElement.remove();" style="top:0;right:0;"></i>
    </div>
    ';
}
?>
    <div class="login d-flex justify-content-center align-items-center">
        <div class="text-center">
            <div class="form p-5 m-5">
            <h2>Register Now</h2>
                <form action="register.php" method="post" name="myform">
                    <div class="col-12">
                    <input type="text" name="name" id="name" placeholder="Enter Your Name:" class="w-100 p-2 mt-3">
                    </div>
                    <div class="col-12">
                    <input type="text" name="email" id="email" placeholder="Enter Your Email:" class="w-100 p-2 mt-3">
                    </div>
                    <div class="col-12">
                    <input type="password" name="password" id="password" placeholder="Enter Your Password:" class="w-100 p-2 mt-3">
                    </div>
                    <div class="col-12">
                    <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Your Password:" class="w-100 p-2 mt-3">
                    </div>
                    <div class="w-100">
                        <select class="mt-3 w-50" name="user_type">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                    <input type="button" value="Register Now" class="main-btn mt-3 mb-3" onclick="val()">
                    <h6>already have an account? <span><a href="index.php">login now</a></span></h6>

                </form>
            </div>
        </div>
    </div>    
<script src="js/all.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
    
</body>
</html>