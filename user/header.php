<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
  <script>
    function order() {
      name = document.getElementById("name").value;
      email = document.getElementById("email").value;
      phone = document.getElementById("phone").value;
      sad = document.getElementById("stadd").value;
      city = document.getElementById("city").value;
      country = document.getElementById("country").value;
      Cardnumber = document.getElementById('cn').value;
      ExpirayDate = document.getElementById('ed').value;
      Cvv = document.getElementById('cvv').value;
      cardn = /^[4|5|7][0-9]{3}[-][0-9]{4}[-][0-9]{4}[-][0-9]{4}$/;
      expd = /(([0][0-9])|([1][0-2]))[/][2][0][2-9]{2}$/;
      cv = /[0-9][0-9][0-9]/;
      if (name == "" || email == "" || phone == "" || sad == "" || city == "" || country == "") {
        alert("Empty Field!");
      } else {
        if (cardn.test(Cardnumber) == true && expd.test(ExpirayDate) == true && cv.test(Cvv) == true) {
          document.myform.submit();
        }
        if (cardn.test(Cardnumber) == true) {
          document.getElementById('div1').innerHTML = "Valid Number";
          document.getElementById('div1').style.color = "green";
        } else {
          document.getElementById('div1').innerHTML = "Wrong Card Number";
          document.getElementById('div1').style.color = "red";
        }
        if (expd.test(ExpirayDate) == true) {
          document.getElementById('div2').innerHTML = "Valid Date";
          document.getElementById('div2').style.color = "green";
        } else {
          document.getElementById('div2').innerHTML = "Invalid Date";
          document.getElementById('div2').style.color = "red";
        }
        if (cv.test(Cvv) == true) {
          document.getElementById('div3').innerHTML = "Valid CVV";
          document.getElementById('div3').style.color = "green";
        } else {
          document.getElementById('div3').innerHTML = "Invalid CVV";
          document.getElementById('div3').style.color = "red";
        }
      }
    }

    function card() {
      document.getElementById("cn").type = "text";
      document.getElementById("ed").type = "text";
      document.getElementById("cvv").type = "text";

    }

    function card1() {
      document.getElementById("cn").type = "hidden";
      document.getElementById("ed").type = "hidden";
      document.getElementById("cvv").type = "hidden";

    }

    function userinfo() {
      document.getElementById("userinfo").style.display = "block";
    }

    function userinfo1() {
      document.getElementById("userinfo").style.display = "none";
    }
    $i = 0;
    $image = ["../image/12PcsLay_UAE_En_1505.jpg", "../image/HotMegaDeal_UAE_En_1905.jpg", "../image/LaySuperDinner_UAE_En_1905.jpg", "../image/PUBG_AE_En_0805.jpg"];

    function slider() {
      if ($i < $image.length - 1) {
        $i++;
      } else {
        $i = 0;
      }
      document.getElementById("img").src = $image[$i];
    }
    setInterval(slider, 4000);
  </script>
</head>

<body>
  <?php
  if (isset($message)) {
    foreach ($message as $message)
      echo '
    <div class="message m-2 d-flex justify-content-center align-items-center fs-2 p-5 border border-dark position-relative">
        <span>' . $message . '</span>
        <i class="fas fa-times position-absolute m-2" onclick="this.parentElement.remove();" style="top:0;right:0;"></i>
    </div>
    ';
  }
  $total_quantity = 0;
  $r = $con->query("SELECT*FROM cart WHERE user_id='$user_id'");
  if ($r->num_rows > 0) {
    while ($sel = $r->fetch_array(MYSQLI_ASSOC)) {
      $quantity = $sel["pro_quantity"];
      $total_quantity += $quantity;
    }
  }
  $r1 = $con->query("SELECT*FROM users WHERE id='$user_id'");
  $sel1 = $r1->fetch_array(MYSQLI_ASSOC);
  ?>
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">KFC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
              require_once("../connection.php");
              $r = $con->query("SELECT*FROM categories");
              while ($sel = $r->fetch_array(MYSQLI_ASSOC)) {
                echo '
              <li><a class="dropdown-item" href="products.php?id=' . $sel["id"] . '">' . $sel["name"] . '</a></li>
              ';
              }
              ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart[<?php echo $total_quantity; ?>]</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"><i class="fa-solid fa-user user cursor-pointer" onclick="userinfo();"></i></a>
          </li>
        </ul>
        <form class="d-flex" method="get" action="search.php">
          <input class="form-control me-2" type="text" placeholder="Search" name="search">
          <input type="submit" value="Search" class="main-btn p-1">
        </form>
      </div>
    </div>
  </nav>
  <div class="userinfo justify-content-center align-items-center p-3  border border-dark" id="userinfo">
    <div class="text-center">
      <i class="fa-solid fa-xmark text-light-50 bg-white p-1 close" onclick="userinfo1();"></i><br>
      <b class="text-light">User Name: </b>
      <b class="text-white-50"><?php echo $sel1["name"]; ?></b><br><br>
      <b class="text-light">Email: </b>
      <b class="text-white-50"><?php echo $sel1["email"]; ?></b><br><br>
      <b class="text-light">new <a href="../index.php" class="text-white-50 logi">login</a>
        | <a href="../register.php" class="text-white-50 reg">register</a> | <a href="../logout.php" class="log text-white-50">logout</a></b>
    </div>
  </div>
  <script src="../js/all.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>