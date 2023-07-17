<?php
require_once("connection.php");
session_start();
if(isset($_POST["email"])==true && $_POST["email"]!=0)
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    $r=$con->query("SELECT*FROM users WHERE email='$email' AND password='$password' ");
    if(mysqli_num_rows($r)>0)
    {
        $sel=$r->fetch_array(MYSQLI_ASSOC);
        if($sel["user_type"]=='admin')
        {
            $_SESSION["admin_id"]=$sel["id"];
            $_SESSION["admin_name"]=$sel["name"];
            $_SESSION["admin_email"]=$sel["email"];
            header("location:admin/index.php");

        }
        elseif($sel["user_type"]=='user')
        {
            $_SESSION["user_id"]=$sel["id"];
            $_SESSION["user_name"]=$sel["name"];
            $_SESSION["user_email"]=$sel["email"];
            header("location:user/index.php");
        
        }

    }
    else{
        $message[]="invalid email or password!";
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
            <h2>Login Now</h2>
                <form action="index.php" method="post">
                    <div class="col-12">
                    <input type="text" name="email" placeholder="Enter Your Email:" class="w-100 p-2 mt-2">
                    </div>
                    <div class="col-12">
                    <input type="password" name="password" placeholder="Enter Your Password:" class="w-100 p-2 mt-3">
                    </div>
                    <input type="submit" value="Login Now" class="main-btn mt-3 mb-3">
                    <h6>don't have an account? <span><a href="register.php">register now</a></span></h6>

                </form>
            </div>
        </div>
    </div>    
<script src="js/all.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
    
</body>
</html>