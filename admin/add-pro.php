<?php
require_once("../connection.php");
if(isset($_POST["name"])==true && $_POST["name"]!=0)
{
    $cat_id=$_POST["cat"];
    $name=$_POST["name"];
    $comp=$_POST["comp"];
    $price=$_POST["price"];
    $image=$_FILES["image"];
    $filename="../image/".$image["name"];
    if(move_uploaded_file($image["tmp_name"],"$filename")==true)
    {
        $con->query("INSERT INTO product VALUES(null,'$cat_id','$name','$filename','$comp','$price')");
        if($con->affected_rows!=0)
        {
            header("location:index.php");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
    <script>
        function val()
        {
            n=document.getElementById("name").value;
            i=document.getElementById("image").value;
            comp=document.getElementById("comp").value;
            p=document.getElementById("price").value;
            if(n=="" || i=="" || comp=="" || p=="")
            {
                alert("Empty Field");
            }
            else
            {
                document.myform.submit();
            }

        }

    </script>
</head>
<body>
    <?php require_once("header.php")?>
    <div class="dashboard p-4 text-center">
        <div class="container">
            <h1>ADD PRODUCT</h1>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6 col-md-8">
                    <form action="add-pro.php" method="post" name="myform" enctype="multipart/form-data">
                        <div class="col-12">
                            Choose Category: 
                            <?php
                            $r=$con->query("SELECT*FROM categories");
                            echo'<select name="cat" class="p-2 mt-2 mb-2" >';
                            while($sel=$r->fetch_array(MYSQLI_ASSOC))
                            {
                                echo'
                                <option value="'.$sel["id"].'">'.$sel["name"].'</option>
                                ';
                            } 
                            echo'</select>';
                            ?>
                        </div>
                        <div class="col-12">
                            Product Name: <input type="text" class="p-2 mt-2 mb-2" id="name" name="name">
                        </div>
                        <div class="col-12">
                            Product Image: <input type="file" class="p-2 mb-2 mt-2" id="image" name="image">
                        </div>
                        <div class="col-12">
                            Product Component: <input type="text" class="p-2 mb-2 mt-2" id="comp" name="comp">
                        </div>
                        <div class="col-12">
                            Product Price: <input type="text" class="p-2 mb-2 mt-2 " id="price" name="price">
                        </div>
                        <div class="col-12 mt-2 mb-2">
                        <input type="button" value="Add" class="main-btn" onclick="val()">    
                        </div>
                    </form>
                </div>
            </div>
        </div>
<script src="../js/all.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
    
</body>
</html>    