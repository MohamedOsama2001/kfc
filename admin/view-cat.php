<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Categories</title>
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
echo'
<div class="dashboard p-4 text-center">
<div class="container">
<h1>View Categories</h1>
<div class="row">
';
$r=$con->query("SELECT*FROM categories");
while($sel=$r->fetch_array(MYSQLI_ASSOC))
{
    echo'
    <div class="col-lg-4 col-md-6 pt-5">
    <a href="view-pro.php?id='.$sel["id"].'">
    <div class="box bg-white">
    <img class="img-fluid" src="'.$sel["image"].'" alt="">
    <h4 class="pb-3">'.$sel["name"].'</h4>
    </div>
    </a>    
    </div>


    ';
}
echo'</div>
</div>
</div>';
?>
<script src="../js/all.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>