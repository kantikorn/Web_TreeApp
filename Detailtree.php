<?php
    session_start();
    include 'server.php';

    $cate= $_GET['id'];




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tree</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .col-sm-7{
  position: relative;
  width: 50%;
}

.image {
  display: block;
  width: 300px;
  height:300px;
  
}

.overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: #cfffc7ec;
  overflow: hidden;
  width: 0;
  height: 100%;
  transition: .5s ease;
}

.col-sm-7:hover .overlay {
  width: 100%;
}

.text {
  white-space: nowrap; 
  color: rgb(126, 126, 126);
  font-size: 20px;
  font-weight: bolder;
  position: absolute;
  overflow: hidden;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
    </style>
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-sm" style="background-color: #00370f; ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size: 20px; font-weight: bolder; color: #fff;">ข้อมูลรายการต้นไม้</a>
            <button class="btn" type="button" style="background-color: antiquewhite; color:#656565;" data-bs-toggle="collapse" data-bs-target="#navadmin">
               Click
            </button>

            <div class="collapse navbar-collapse" id="navadmin">
                <ul class="navbar-nav me-auto">
                    <form action="addcateTree.php" method="post">
                        <li class="nav-item" style="margin-left: 10px;">
                           <a class="btn" style="background-color: antiquewhite; color:#656565;" href="Showtree.php">HOME</a>
                        </li>
                    </form>
                    
                </ul>
            </div>

        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">
            <?php
                $sqldetail = "SELECT * FROM `tree` WHERE `cateid` = $cate ";
                    if($result = $conn -> query($sqldetail)){
                        while($row = $result -> fetch_assoc()){
                            echo '
                            <div class="col-12 col-lg-6">
                            <div class="card mt-3" style="width:100%; background-color: antiquewhite;">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-sm-7 mt-3 mb-3">
                                            <img src="'.$row['image'].'" alt="Avatar" class="image">
                                            <div class="overlay">
                                                <div class="text">ต้นไม้ด่างไทย</div>
                                            </div>
                                        </div>
                                        <div class="col-12col-sm-5 col-lg-4 mt-3 mb-3">
                                            <h5 class="card-text" style="width:120%;">ชื่อวิทยาศาสตร์:'.$row['namesi'].'</h5>
                                            <hr>
                                            <p class="card-text">องค์: '.$row['aong'].'</p>
                                         
                                            <p class="card-text">ลักษณะ: '.$row['nature'].' </p>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                       
                            
                        </div>
                            ';
                        }
                    }

            ?>
           
            </div>
        </div>
        
</body>
</html>