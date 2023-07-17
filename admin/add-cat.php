<?php
require_once("../connection.php");
if(isset($_POST["name"])==true && $_POST["name"]!="")
{
    $name=$_POST["name"];
    $image=$_FILES["image"];
    $filename="../image/".$image["name"];
    if(move_uploaded_file($image["tmp_name"],"$filename")==true)
    {
        $con->query("INSERT INTO categories VALUES(null,'$name','$filename')");
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
    <title>Add Category</title>
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
            if(n=="" || i=="")
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
    <div class="dashboard p-4 d-flex justify-content-center align-items-center">
        <div class="text-center">
        <h1>ADD CATEGORY</h1>
        <form action="add-cat.php" method="post" class="p-4" name="myform" enctype="multipart/form-data">
            <div class="col-12 mb-4">
            <input type="text" name="name" placeholder="Enter Category Name: " class="p-2" id="name">
            </div>
            <div class="col-12 mb-4 text-center">
            <input type="file" name="image" class="p-2" id="image">
            </div>
            <div class="col-12 mb-4">
            <input type="button" value="Add" class="main-btn" onclick="val()">
            </div>
        </form>
        </div>
    </div>
<script src="../js/all.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
    
</body>
</html>