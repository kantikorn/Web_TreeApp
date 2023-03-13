<?php
    session_start();
    include 'server.php';
    if(isset($_SESSION['adminid'])){

    } else {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Tree</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                           <a class="btn" style="background-color: antiquewhite; color:#656565;" href="addcateTree.php">HOME</a>
                        </li>
                    </form>
                    
                </ul>
            </div>

        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">
        
            <div class="card" style=" background: linear-gradient(#d6ffd7, #57ff54);">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-3 mt-3">
                            <img src="image/logo.JPG" class="rounded-circle" style="width:200px; height: 170px;">
                        </div>
                        <div class="col-12 col-lg-8 mt-5 mb-3">
                            <marquee><h4 class="card-title" style="color: #00370f; font-size: 30px; font-weight: bolder;">รายการเเละข้อมูลต้นไม้ทั้งหมด</h5></marquee>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>




   

      

    


    <div class="container-fluid mt-2 mb-2">
        <div class="row">
            <?php
                $sqltree = "SELECT tree.treeid,tree.treename,tree.namesi,tree.aong,tree.nature,tree.image,catetree.cateid,catetree.catename
                FROM tree
                INNER JOIN catetree
                ON tree.cateid = catetree.cateid";

                if($show = $conn -> query($sqltree)){
                    while($row = $show -> fetch_assoc()){
                        echo '
                            
                        <div class="col-12 col-lg-3">
                        <div class="card" style="background-color: antiquewhite; border-radius: 20px;">
                            <div class="card-header">
                                <img src="'.$row['image'].'" style="width:100%; height: 190px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">ชื่อต้นไม้:'.$row['treename'].'</h5>
                                <hr>
                                <p class="card-text">ชื่อวิทยาศาสตร์:'.$row['namesi'].'</p>
                                <p class="card-text">องค์:'.$row['aong'].'</p>
                                <p class="card-text">ลักษณะ:'.$row['nature'].'</p>
                                <button class="btn" style="background-color: rgb(255, 145, 0); color: #fff;" data-bs-toggle="modal" data-bs-target="#edittree-'.$row['treeid'].'">เเก้ไขรายการต้นไม้</button> 
                                <button class="btn" style="background-color: rgb(204, 31, 31); color: #fff;" data-bs-toggle="modal" data-bs-target="#deletetree-'.$row['treeid'].'">ลบรายการต้นไม้</button> 
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="edittree-'.$row['treeid'].'">
                        <div class="modal-dialog">
                            <div class="modal-content" style="background-color: antiquewhite;">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight: bolder; color: #00370f;">เเก้ไขรายการต้นไม้</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                                </div>
                
                                <div class="modal-body">
                                    <div class="card" style=" background-color: #00370f; ">
                                        <div class="card" style=" background-color: #00370f; ">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                   
                                                    </div>
                                                    <div class="col-sm-6 mt-2" style="margin-left: -1rem; ">
                                                      
                                                        <img  class="rounded-circle mb-3 mt-3" src="image/login.JPG" style="width:230px; height:230px;  border-radius: 20px;">
                                                        
                                                    </div>
                                    
                                                    <div class="col-sm-6" style="margin-left: 1rem;">
                                                        <form action="previewTree.php" method="post" enctype="multipart/form-data">
                                                        
                                                            <select id="cate" name="cate">
                                                            <option value="'.$row['catename'].'">'.$row['catename'].'</option>
                                                            </select>
                                                            <div class="mb-3 mt-3">
                                                                <label for="treename" class="form-label" style="color:#fff;">ชื่อต้นไม้</label>
                                                                <input class="form-control" id="treename" name="treename" style="width: 80%;" value="'.$row['treename'].'">
                                                            </div>
                                                            <div class="mb-3 mt-3">
                                                                <label for="namesi" class="form-label" style="color:#fff;">ชื่อวิทยาศาสตร์</label>
                                                                <input class="form-control" id="namesi" name="namesi" style="width: 80%;" value="'.$row['namesi'].'">
                                                            </div>
                                                            <div class="mb-3 mt-3">
                                                                <label for="aong" class="form-label" style="color:#fff;">องค์</label>
                                                                <input class="form-control" id="aong" name="aong" style="width: 80%;" value="'.$row['aong'].'">
                                                            </div>
                                                            <div class="mb-3 mt-3">
                                                                <label for="nature" class="form-label" style="color:#fff;">ลักษณะ</label>
                                                                <textarea class="form-control" rows="5" id="nature" name="nature">'.$row['nature'].'</textarea>
                                                            </div>
                                                            <div class="mb-3 mt-3">
                                                                <label for="img" class="form-label" style="color:#fff;">รูปภาพต้นไม้</label>
                                                                <input type="file" class="form-control" id="img" name="img" >
                                                            </div>
                    
                                                          
                                                            
                                                            <div class="mb-3">
                                                                <button class="btn" style="background: linear-gradient(#beffbf, #024e01); color:#fff; width: 100%;" type="submit" name="editlist-'.$row['treeid'].'">เเก้ไขรายการ</button>
                                                            </div>
                                                          
                    
                                                            </div>
                    
                                                        </form>
                    
                    
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                </div>




                <div class="modal fade" id="deletetree-'.$row['treeid'].'">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: rgb(248, 83, 83);">
                               
                                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                            </div>
            
            
                            <div class="modal-body"  style="background-color: rgb(248, 83, 83);">
                                <form action="previewTree.php" method="post">
                                    <h5 class="mb-5 mt-5" style="color:#fff; font-size: 30px; margin-left: 3rem;">คุณต้องการลบรายการนี้ใช่ไหม</h5> 
                                    
                                    <div class="modal-footer"  style="background-color: rgb(248, 83, 83);">
                                        <button class="btn btn-success" type="submit" name="condelete-'.$row['treeid'].'">Confirm</button>
                                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancle</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
                        
                        ';
                         if(isset($_POST['editlist-'.$row['treeid'].''])){
                                    $cateid = $row['cateid'];
                                    $treeid = $row['treeid'];
                                    $treename = $_POST['treename'];
                                    $namesi = $_POST['namesi'];
                                    $aong = $_POST['aong'];
                                    $nature = $_POST['nature'];
                                    $filename = $_FILES['img']["name"];
                                    $dir1 = "image/".$filename;

                                    $sqledit1 = "UPDATE `tree` SET `cateid`='$cateid',`treename`='$treename',`namesi`='$namesi',`aong`='$aong',`nature`='$nature',`image`='$dir1' WHERE `treeid`='$treeid'";
                                    $result = mysqli_query($conn,$sqledit1);

                                   
                                    echo "<meta http-equiv='refresh' content='0'>";

                         }

                         if(isset($_POST['condelete-'.$row['treeid'].''])){
                            $iddelete = $row['treeid'];
                            $sqldelete = "DELETE FROM `tree` WHERE `treeid` = '$iddelete' ";

                            $resultde = mysqli_query($conn , $sqldelete);
                            echo "<meta http-equiv='refresh' content='0'>"; 
                        }

                    }
                }


              
            ?> 

          


        </div>
    </div>



   







   
    
</body>
</html>