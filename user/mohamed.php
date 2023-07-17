<?php
require_once("../connection.php");
session_start();
$user_id=$_SESSION["user_id"];
if(isset($user_id)!=true)
{
    header("location:../index.php");
}
if(isset($_POST["update"])==true)
{
    $cart_id=$_POST["cart_id"];
    $pro_quantity=$_POST["pro_quantity"];
    $con->query("UPDATE cart SET pro_quantity='$pro_quantity' WHERE id='$cart_id'");
    $message[]="Item Quantity Updated!";
}
if(isset($_POST["delete"])==true)
{
    $cart_id=$_POST["cart_id"];
    $con->query("DELETE FROM cart WHERE id='$cart_id' AND user_id='$user_id'");
    $message[]="Item Is Delete From Cart!";

}
if(isset($_POST["del_all"])==true)
{
    $con->query("DELETE FROM cart WHERE user_id='$user_id'");
}
if(isset($_POST["name"])==true && $_POST["name"]!="")
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $st_add=$_POST["st_add"];
    $city=$_POST["city"];
    $country=$_POST["country"];
    $method=$_POST["method"];
    $date=date('d M Y');
    date_default_timezone_set("Africa/Cairo");
    $time=date('h:i A');
    $total_price=0;
    $total_items[]='';
    $r1=$con->query("SELECT*FROM cart WHERE user_id='$user_id'");
    if($r1->num_rows>0)
    {
        while($select=$r1->fetch_array(MYSQLI_ASSOC))
        {
            $total_items[]=$select["pro_name"].'('.$select["pro_quantity"].')';
            $item_price=($select["pro_quantity"]*$select["pro_price"]);
            $total_price+=$item_price;

        }
    }
    $items=implode(', ',$total_items);
    $r2=$con->query("SELECT*FROM orders WHERE name='$name' AND email='$email' AND phone='$phone' AND st_add='$st_add' AND city='$city' AND country='$country' AND total_items='$items' AND total_price='$total_price' AND method='$method' ");
    if($total_price==0)
    {
        $message[]="Your Cart Is Empty!";
    }
    else
    {
        if($r2->num_rows>0)
        {
            $message[]="Order Already Placed!";
        }
        else
        {
            $con->query("INSERT INTO orders VALUES(null,'$user_id','$name','$email','$phone','$st_add','$city','$country','$items','$total_price','$method','$date','$time')");
            $message[]="order placed successfully!";
            $con->query("DELETE FROM cart WHERE user_id='$user_id'");
        }
    }
}
require_once("header.php");
?>
<div class="titlle d-flex align-items-center justify-content-center p-3 pb-3">
    <div class="text-center text-light">
        <h3><span>Home/</span> Cart</h3>
    </div>
</div>
            <?php
            $grnadtotal=0;
            $r=$con->query("SELECT*FROM cart WHERE user_id='$user_id'");
            echo'
            <div class="cart">
            ';
            if($r->num_rows>0)
            {
                echo'
                <div class="container">
                <div class="row">';
                while($sel=$r->fetch_array(MYSQLI_ASSOC))
                {
                    $subtotal=$sel["pro_quantity"]*$sel["pro_price"];
                    $grnadtotal+=$subtotal;
                    echo'
                    <div class="col-lg-3 col-md-4">
                    <div class="card text-center mb-3">
                    <img src="'.$sel["pro_image"].'" class="card-img-top" alt="...">
                    <div class="card-body">
                    <b>'.$sel["pro_name"].'</b>
                    <h6>'.$subtotal.' AED<h6>
                    <form action="cart.php" method="post">
                    <input type="hidden" name="cart_id" value="'.$sel["id"].'">
                    <input type="number" value="'.$sel["pro_quantity"].'" name="pro_quantity"><br>
                    <input type="submit" value="Update" class="main-btn mt-2 p-1" name="update">
                    ';
                    ?>
                    <input type="submit" value="Delete" class="main-btn p-1" name="delete" onclick="return confirm('delete this item from cart?');"> 
                    <?php
                    echo'
                    </form>
                    </div>
                    </div>
                    </div>
                    ';
                }
                echo'
                </div>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                ';?>
                <form action="cart.php" method="post">
                <input type="submit" value="Delete All Items" name="del_all" class="main-btn p-1 mb-2" onclick="return confirm('delete all items from cart?');">
                </form>
                <?php
                echo'
                </div>
                <div class="d-flex align-items-center justify-content-center border border-dark p-2">
                <div class="text-center text-light">
                <h4>Grand Total= '.$grnadtotal.' AED</h4>
                <a href="products.php" class="main-btn p-1">Continue Shopping</a>
                <a href="checkout.php" class="main-btn p-1">Proceed To Checkout</a>
                </div>
                </div>
                ';
            }
            else
            {
                echo'
                <div class="d-flex align-items-center justify-content-center">
                <div class="text-center mb-5 mt-5">
                <h3 class="border border-dark p-3 mb-3">Your Cart Is Empty!</h3>
                <a href="products.php" class="main-btn p-1">Continue Shopping</a>
                </div>
                </div>
                ';
            }
            echo'
            </div>
            ';
            ?>
<?php require_once("footer.php"); ?>