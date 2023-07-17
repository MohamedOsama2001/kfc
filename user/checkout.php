<?php
require_once("../connection.php");
session_start();
$user_id=$_SESSION["user_id"];
if(isset($user_id)!=true)
{
    header("location:../index.php");
}
require_once("header.php");
?>
<div class="titlle d-flex align-items-center justify-content-center p-3 pb-3">
    <div class="text-center text-light">
        <h3><span>Home/</span> Checkout</h3>
    </div>
</div>
<div class="cart p-4">
        <?php
        $grandtotal=0;
        $r=$con->query("SELECT*FROM cart WHERE user_id='$user_id'");
        if($r->num_rows>0)
        {
            while($sel=$r->fetch_array(MYSQLI_ASSOC))
            {
                $subtotal=$sel["pro_quantity"]*$sel["pro_price"];
                $grandtotal+=$subtotal;
                echo'
                <b class="d-block text-center border border-dark p-1 mb-1">'.$sel["pro_name"].'('.$sel["pro_price"].' AED x '.$sel["pro_quantity"].')</b>
                ';
            }
        }

        ?>
<div class="d-flex align-items-center justify-content-center mt-4 mb-4">
    <div class="text-center text-light">
        <h4>Grand Total = <?php echo $grandtotal; ?> AED</h4>
    </div>
</div>
<div class="d-flex align-items-center justify-content-center">
    <div class="text-center border border-dark p-5">
        <h3>Place Your Order</h3>
        <form action="cart.php" method="post" name="myform">
            <input type="text" placeholder="Name:" id="name" name="name" class="w-100 p-2 mb-2 text-black-50 fs-4 border border-none">
            <input type="text" placeholder="Email:" id="email" name="email" class="w-100 p-2 mb-2 text-black-50 text-black-50 fs-4 border border-none">
            <input type="text" placeholder="Phone:" id="phone" name="phone" class="w-100 p-2 mb-2 text-black-50 text-black-50 fs-4 border border-none">
            <input type="text" placeholder="Street Address:" id="stadd" name="st_add" class="w-100 p-2 mb-2 text-black-50 text-black-50 fs-4 border border-none">
            <input type="text" placeholder="City:" name="city" id="city" class="w-100 p-2 mb-2 text-black-50 text-black-50 fs-4 border border-none">
            <input type="text" placeholder="Country:" name="country" id="country" class="w-100 p-2 mb-2 text-black-50 text-black-50 fs-4 border border-none">
            <input type="hidden" id="cn" placeholder="Card Number:" class="w-100 p-2 mb-2 text-black-50 text-black-50 fs-4 border border-none">
            <div class="text-center;" id="div1"></div>
            <input type="hidden" id="ed" placeholder="Expiry Date:mon/year" class="w-100 p-2 mb-2 text-black-50 text-black-50 fs-4 border border-none">
            <div class="text-center;" id="div2"></div>
            <input type="hidden" id="cvv" placeholder="CVV:" class="w-100 p-2 mb-2 text-black-50 text-black-50 fs-4 border border-none">
            <div class="text-center;" id="div3"></div>
            <input type="radio" name="method" value="cash on delivery" onclick="card1();"> <b>cash on delivery</b>
            <input type="radio" name="method" value="credit card" onclick="card();"> <b>credit card</b><br>
            <input type="button" value="Order Now" class="main-btn mt-3" onclick="order();">
        </form>
    </div>
</div>

</div>

<?php require_once("footer.php"); ?>
