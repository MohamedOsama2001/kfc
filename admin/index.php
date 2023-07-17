<?php
require_once("../connection.php");
$r=$con->query("SELECT*FROM orders");
$orders=$r->num_rows;
$orders_money=0;
if($r->num_rows>0)
{
    while($sel=$r->fetch_array(MYSQLI_ASSOC))
    {
        $price=$sel["total_price"];
        $orders_money+=$price;
    }
}
$r1=$con->query("SELECT*FROM categories");
$categories=$r1->num_rows;
$r2=$con->query("SELECT*FROM product");
$products=$r2->num_rows;
$r3=$con->query("SELECT*FROM messages");
$messages=$r3->num_rows;
$r4=$con->query("SELECT*FROM users WHERE user_type='admin'");
$adm_users=$r4->num_rows;
$r5=$con->query("SELECT*FROM users WHERE user_type='user'");
$nor_users=$r5->num_rows;
$r6=$con->query("SELECT*FROM users");
$accounts=$r6->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once("header.php")?>
    <div class="dashboard p-4 text-center">
        <h1>DASHBOARD</h1>
        <div class="container mt-3">
        <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="box text-center bg-white border border-dark p-4 mb-2">
            <b><?php echo $orders;?></b><br>
            <b class="text-danger">Order Placed</b>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="box text-center bg-white border border-dark p-4 mb-2">
            <b><?php echo $orders_money;?> AED</b><br>
            <b class="text-danger">Orders Money</b>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="box text-center bg-white border border-dark p-4 mb-2">
            <b><?php echo $categories;?></b><br>
            <b class="text-danger">Categories Added</b>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="box text-center bg-white border border-dark p-4 mb-2">
            <b><?php echo $products;?></b><br>
            <b class="text-danger">Products Added</b>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="box text-center bg-white border border-dark p-4 mb-2">
            <b><?php echo $messages;?></b><br>
            <b class="text-danger">Messages</b>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="box text-center bg-white border border-dark p-4 mb-2">
            <b><?php echo $adm_users;?></b><br>
            <b class="text-danger">Admin Users</b>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="box text-center bg-white border border-dark p-4 mb-2">
            <b><?php echo $nor_users;?></b><br>
            <b class="text-danger">Normal Users</b>
            </div>
            
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="box text-center bg-white border border-dark p-4 mb-2">
            <b><?php echo $accounts;?></b><br>
            <b class="text-danger">Total Accounts</b>
            </div>
            
        </div>

        </div>
        </div>
    </div>
<script src="../js/all.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
    
</body>
</html>