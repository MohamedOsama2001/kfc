<?php
require_once("../connection.php");
session_start();
$user_id=$_SESSION["user_id"];
if(isset($user_id)!=true)
{
    header("location:../index.php");
}
if(isset($_POST["name"])==true && $_POST["name"]!=0)
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $msg=$_POST["message"];
    $r=$con->query("SELECT*FROM messages WHERE user_id='$user_id' AND name='$name' AND email='$email' AND message='$msg'");
    if($r->num_rows>0)
    {
        $message[]="this message already send!";
    }
    else
    {
        $con->query("INSERT INTO messages VALUES(null,'$user_id','$name','$email','$msg')");
        $message[]="your message sent successfully!";
    }
}
require_once("header.php");
?>
<div class="titlle d-flex align-items-center justify-content-center p-3 pb-3">
    <div class="text-center text-light">
        <h3><span>Home/</span> Contact Us</h3>
    </div>
</div>
<div class="cart">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center justify-content-center border border-dark p-2 mb-2 bg-white">
                    <div class="text-center">
                        <div class="icon">
                        <i class="fa-solid fa-phone text-danger"></i>
                        </div>
                        <b>Phone:</b><br>
                        <b>600522252</b>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center justify-content-center border border-dark p-2 mb-2 bg-white">
                    <div class="text-center">
                        <div class="icon">
                        <i class="fa-solid fa-envelope text-danger"></i>
                        </div>
                        <b>Email:</b><br>
                        <b>apps@americana-food.com</b>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center justify-content-center border border-dark p-2 mb-2 bg-white">
                    <div class="text-center">
                        <div class="icon">
                        <i class="fa-solid fa-shop text-danger"></i>
                        </div>
                        <b>Visit Us:</b><br>
                        <b>Executive Tower(M) - Dubai - UAE</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form d-flex align-items-center justify-content-center">
        <div class="text-center border border-dark p-5 mt-4 mb-3">
        <h3>Do You Have Any Question?</h3>
        <form action="contact.php" method="post">
        <input type="text" name="name" placeholder="Name:" class="border border-none text-black-50 fs-4 p-2 w-100 mb-2 mt-2">
        <input type="text" name="email" placeholder="Email:" class="border border-none text-black-50 fs-4 p-2 w-100 mb-2">
        <input type="text" name="message" placeholder="Your Message:" class="border border-none text-black-50 fs-4 p-2 w-100 mb-2">
        <input type="submit" value="Send" class="main-btn p-1 mt-2">
        </form>
        </div>
    </div>
</div>

<?php require_once("footer.php"); ?>
