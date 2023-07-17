<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
    echo '
    <div class="dashboard p-4 text-center">
    <div class="container">
    <h1>PRODUCTS</h1>
    <div class="row" style="cursor:pointer;">
    ';
    $x = "";
    if (isset($_GET["id"]) == true && $_GET["id"] != "") {
        $x = "WHERE cat_id=" . $_GET["id"];
    }
    $r = $con->query("SELECT*FROM product $x ORDER BY id DESC ");
    while ($sel = $r->fetch_array(MYSQLI_ASSOC)) {
        echo '
    <div class="col-lg-3 col-md-6 pt-5">
    <div class="card h-100 d-flex flex-column">
  <img src="' . $sel["image"] . '" class="card-img-top" alt="..." style="height:50%">
  <div class="card-body text-center" style="height:35%">
    <h5 class="card-title">' . $sel["name"] . '</h5>
    <p class="card-text">' . $sel["component"] . '</p>
  </div>
  <ul class="list-group list-group-flush" style="height:15%">
    <li class="list-group-item text-center">' . $sel["price"] . ' AED</li>
  </ul>
</div>  
    </div>


    ';
    }
    echo '
    </div>
    </div>
    </div>
    ';
    ?>

    <script src="../js/all.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>