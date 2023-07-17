<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
</head>
<body>
<?php
require_once("header.php");
require_once("../connection.php");
if(isset($_POST["delete"])==true)
{
    $id=$_POST["id"];
    $con->query("DELETE FROM messages WHERE id='$id'");
}
echo'
<div class="orders p-4 text-center">
<div class="container">
<h1>MESSAGES</h1>
<div class="row" style="cursor:pointer;">
';
$r=$con->query("SELECT*FROM messages ORDER BY id DESC");
if($r->num_rows>0)
{
    while($sel=$r->fetch_array(MYSQLI_ASSOC))
{
    echo'
    <div class="col-lg-3 col-md-6">
    <div class="box text-center border border-dark bg-light p-3 mt-3">
    <b class="text-danger">User_id:</b><b> '.$sel["user_id"].'</b><br>
    <b class="text-danger">Name:</b><b> '.$sel["name"].'</b><br>
    <b class="text-danger">Email:</b><b> '.$sel["email"].'</b><br>
    <b class="text-danger">Message:</b><b> '.$sel["message"].'</b><br>
    <form action="messages.php" method="post">
    <input type="hidden" value="'.$sel["id"].'" name="id">
    <input type="submit" value="Delete" class="main-btn p-1 mt-2" name="delete" />
    </form>

    </div>
    </div>
    ';

}
echo'
</div>
</div>
';

}
else
{
    echo'
    <div class="d-flex align-items-center justify-content-center">
    <div class="text-center mt-3">
    <h3 class="border border-dark p-3">No Messages Placed Yet!</h3>
    </div>
    </div>
    ';
}
echo'</div>';

?>    
<script src="../js/all.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>