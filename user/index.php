
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
    <div class="kfc d-flex justify-content align-items-center">
        <img src="../image\12PcsLay_UAE_En_1505.jpg" width="100%" height="300px" id="img">
    </div>
    <div class="delivery p-3">
        <div class="container">
            <h4>CONTACTLESS DELIVERY</h4>
        <div class="row">
            <div class="col-lg-3 col-md-6 pt-2">
            <div class="card d-flex align-items-center justify-content-center pt-2 flex-column h-100">
                <img src="../image/mooo.png" class="card-img-top" alt="..." style="width:50px;height:50px;">
                <div class="card-body text-center">
                Our delivery drivers sanitize their hands
                </div> 
            </div>
            </div>
            <div class="col-lg-3 col-md-6 pt-2 ">
            <div class="card d-flex align-items-center justify-content-center pt-2 flex-column h-100">
                <img src="../image/mooo1.png" class="card-img-top" alt="..." style="width:50px;height:50px;">
                <div class="card-body text-center">
                All our delivery drivers wear masks and gloves
                </div> 
            </div>
            </div>
            <div class="col-lg-3 col-md-6 pt-2">
            <div class="card d-flex align-items-center justify-content-center pt-2 flex-column h-100">
                <img src="../image/mooo2.png" class="card-img-top" alt="..." style="width:50px;height:50px;">
                <div class="card-body text-center">
                All delivery bags are sanitized before and after every order
                </div> 
            </div>
            </div>
            <div class="col-lg-3 col-md-6 pt-2">
            <div class="card d-flex align-items-center justify-content-center pt-2 flex-column h-100">
                <img src="../image/mooo3.png" class="card-img-top" alt="..." style="width:50px;height:50px;">
                <div class="card-body text-center">
                Takeaway food bags will be sealed with tape
                </div> 
            </div>
            </div>
        </div>    
            
        </div>
        </div>
    </div>
    <?php require_once("footer.php");?>
