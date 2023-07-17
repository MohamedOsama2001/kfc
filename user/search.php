<?php
require_once("../connection.php");
session_start();
$user_id = $_SESSION["user_id"];
if (isset($user_id) != true) {
    header("location:../index.php");
}
if (isset($_POST["pro_id"]) == true && $_POST["pro_id"] != 0) {
    $pro_id = $_POST["pro_id"];
    $pro_name = $_POST["pro_name"];
    $pro_iamge = $_POST["pro_image"];
    $pro_price = $_POST["pro_price"];
    $r = $con->query("SELECT*FROM cart WHERE pro_id='$pro_id' AND user_id='$user_id' AND pro_name='$pro_name'");
    if ($r->num_rows > 0) {
        $message[] = "already added to cart!";
    } else {
        $con->query("INSERT INTO cart VALUES(null,'$pro_id','$user_id','$pro_name','$pro_price','$pro_iamge','1')");
        $message[] = "product added to cart!";
    }
}
require_once("header.php");
?>
<div class="titlle d-flex justify-content-center align-items-center p-3 pb-3">
    <div class="text-center text-light">
        <h3><span>Home/ </span>Search</h3>
    </div>
</div>
<?php
echo '<div class="search pb-5">';
if (isset($_GET["search"]) == true && $_GET["search"] != "") {
    $s = $_GET["search"];
    $r = $con->query("SELECT*FROM product WHERE name LIKE '%$s%' OR component LIKE '%$s%'");
    if ($r->num_rows > 0) {
        echo '
                <div class="container">
                <div class="row">
                ';
        while ($sel = $r->fetch_array(MYSQLI_ASSOC)) {
            echo '
                    <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card h-100 d-flex flex-column">
      <img src="' . $sel["image"] . '" class="card-img-top" alt="..." style="height:50%">
      <div class="card-body text-center" style="height:30%">
        <h5 class="card-title">' . $sel["name"] . '</h5>
        <p class="card-text">' . $sel["component"] . '</p>
      </div>
      <ul class="list-group list-group-flush" style="height:10%">
        <li class="list-group-item text-center">' . $sel["price"] . ' AED</li>
      </ul>
      <div class="card-body text-center" style="height:10%">
      <form action="search.php" method="post">
                    <input type="hidden" name="pro_id" value="' . $sel["id"] . '">
                    <input type="hidden" name="pro_name" value="' . $sel["name"] . '">
                    <input type="hidden" name="pro_price" value="' . $sel["price"] . '">
                    <input type="hidden" name="pro_image" value="' . $sel["image"] . '">
                    <input type="submit" value="ADD TO CART" class="main-btn">
                    </form>
      </div>
    </div>
    </div>
                    ';
        }
        echo '
                </div>
                </div>
                ';
    } else {
        echo '
                <div class="d-flex justify-content-center align-items-center">
                <div class="text-center">
                <h3 class="border border-dark p-3 mb-5 mt-5">Not Found!</h3>
                </div>
                </div>
                ';
    }
} else {
    echo '
            <div class="d-flex justify-content-center align-items-center">
            <div class="text-center">
            <h3 class="border border-dark p-3 mb-5 mt-5">Enter the name you want to search!</h3>
            </div>
            </div>
            ';
}
echo '</div>';
?>
<?php require_once("footer.php"); ?>