<?php
    session_start();
    include  'server.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Tree</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>

   


    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-12" style=" background: linear-gradient(#d6ffd7, #57ff54); height: 100%;" >
                   <div class="container-fluid" style="margin-top: 11rem; margin-bottom: 11rem;">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="card" style="width: 100%; border-radius: 20px;  background-color: #00370f; ">
                                    <form action="Login.php" method="post">
                                        <div class="container-fluid">
                                            <div class="card mt-3 mb-3" style="background-color: antiquewhite; border-radius: 30px;">
                                                <h4 class="card-title mb-2 mt-2" style="color: #00370f; ; margin-left: 10px; font-weight: bolder;">ยินดีต้อนรับเข้าสู่ระบบ</h4>
                                            </div>
                                           
                                            <div class="row">
                                                <div class="col-sm-3">

                                                </div>
                                                <div class="col-sm-3">
                                                    <img  class="rounded-circle mt-3" src="Image/login.JPG" style="width: 190px; height: 190px; ">
                                                </div>
                                                <div class="col-sm-3">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 mt-3">
                                            <label for="Email" class="form-label" style="margin-left: 2rem; color:#fff;">Email</label>
                                            <input class="form-control" id="Email" name="Email"  style="width:80%; margin-left: 2rem;" placeholder="กรอกอีเมลล์ของคุณ....">
                                        </div>
                                        <div class="mb-3 mt-3 ">
                                            <label for="Password" class="form-label" style="margin-left: 2rem; color:#fff;">Password</label>
                                            <input class="form-control" id="Password" name="Password" style="width:80%; margin-left: 2rem;" placeholder="กรอกรหัสของคุณ....">
                                        </div>

                                        <button class="btn mb-3" type="submit" name="login" style=" width: 180px; margin-left: 2rem;  color:#fff; background: linear-gradient(#beffbf, #024e01);">Login >></button>

                                        <?php

                                                if(isset($_POST['login'])){
                                                    $Email = $_POST['Email'];
                                                    $Password = $_POST['Password'];

                                                    $sql = "SELECT * FROM admintree WHERE Email='$Email' AND Password='$Password'";

                                                    $result = mysqli_query($conn,$sql);

                                                    if(mysqli_num_rows($result) === 1){
                                                        $row = mysqli_fetch_assoc($result);

                                                        if($row['Email'] === $Email && $row['Password'] === $Password) {
                                                            $_SESSION['Email'] = $row['Email'];
                                                            $_SESSION['Password'] = $row['Password'];
                                                            $_SESSION['adminid'] = $row['adminid'];

                                                            header("Location:addcateTree.php");

                                                            exit();
                                                        }
                                                    }
                                                }


                                                ?>

                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                
                            </div>

                          
                        </div>
                   </div>
            </div>
        </div>
    </div>
</body>
</html>