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
    <title>Add category Tree</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-sm" style="background-color: #00370f; ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size: 20px; font-weight: bolder; color: #fff;">ยินดีต้อนรับ ผู้ดูเเลระบบ</a>
            <button class="btn" type="button" style="background-color: antiquewhite; color:#656565;" data-bs-toggle="collapse" data-bs-target="#navadmin">
               Click
            </button>

            <div class="collapse navbar-collapse" id="navadmin">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item" style="margin-left: 10px;">
                        <button class="btn" style="background-color: antiquewhite; color:#656565;"  type="button" data-bs-toggle="offcanvas" data-bs-target="#menu">เมนูจัดการ</button>
                    </li>
                    <form action="addcateTree.php" method="post">
                        <li class="nav-item" style="margin-left: 10px;">
                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#logout">ออกจากระบบ</button>
                        </li>
                    </form>
                    
                </ul>
            </div>

        </div>
    </nav>


    <div class="modal fade" id="logout">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(255, 120, 120);">
                   
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>


                <div class="modal-body"  style="background-color: rgb(255, 120, 120);">
                    <form action="addcateTree.php" method="post">
                        <h5 class="mb-5 mt-5" style="color:#fff; font-size: 30px; margin-left: 3rem;">คุณต้องการออกจากระบบใช่ไหม</h5> 
                        
                        <div class="modal-footer"   style="background-color: rgb(255, 120, 120);">
                            <button class="btn btn-outline-success" type="submit" name="conlog">Confirm</button>
                            <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancle</button>
                        </div>

                        <?php
                            if(isset($_POST['conlog'])){
                                session_unset();
                                session_destroy();
                                header("Location: login.php");
                            }
                        ?>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="offcanvas offcanvas-start" id="menu" style="width: 300px;"> 
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">เมนูจัดการสำหรับเเอดมิน</h5>
            <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">
            <img class="rounded-circle" src="image/menu.JPG" style="width:260px; height: 250px;">
            <hr>
            <button class="btn mt-3 mb-3" style="background-color: rgb(255, 145, 0); width: 220px;" data-bs-toggle="modal" data-bs-target="#addcate"><i class="fa-solid fa-pen-to-square" style="margin-right: 5px;"></i>เพิ่มประเภทต้นไม้ +</button>
            <br>
            <a class="btn mt-3 mb-3" style="background-color: rgb(255, 145, 0); width: 220px;" href="previewTree.php"><i class="fa-solid fa-pen-to-square" style="margin-right: 5px;"></i>ดูข้อมูลต้นไม้ +</a>
        </div>
    </div>



    <div class="modal fade" id="addcate">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: antiquewhite;">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight: bolder; color: #00370f;">เพิ่มหมวดหมู่ต้นไม้</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="card" style=" background-color: #00370f; ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                               
                                </div>
                                <div class="col-sm-5 mt-2" style="margin-left: -1rem; ">
                                  
                                   <img class="rounded-circle" src="image/catetree.JPG" style="width: 200px; height: 200px; ">
                                </div>
                
                                <div class="col-sm-7" style="margin-left: 1rem;">
                                    <form action="addcateTree.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3 mt-3">
                                            <label for="category" class="form-label" style="color:#fff;">หมวดหมู่ต้นไม้</label>
                                            <input class="form-control" id="category" name="category" style="width: 80%;" placeholder="หมวดหมู่ต้นไม้.....">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="imgtree" class="form-label" style="color:#fff;">รูปถาพหมวดหมู่</label>
                                            <input type="file" class="form-control" id="imgtree" name="imgtree" >
                                        </div>

                                      
                                        
                                        <div class="mb-3">
                                            <button class="btn" style="background: linear-gradient(#beffbf, #024e01); color:#fff; width: 100%;" type="submit" name="addtree">เพิ่มข้อมูล</button>
                                        </div>
                                      

                                        </div>

                                        <?php
                                                if(isset($_POST['addtree'])){
                                                    $filename = $_FILES['imgtree']["name"];
                                                    $dir = "image/".$filename;
                                                    $catename = $_POST['category'];

                                                    $sqladd ="INSERT INTO `catetree`(`cateid`, `catename`, `image`) VALUES (NULL,'$catename','$dir')";
                                                    $result = mysqli_query($conn , $sqladd);

                                                    echo "<meta http-equiv='refresh' content='0'>";
                                                }
                                        ?>
                                    </form>


                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container-fluid mt-3">
        <div class="row">
                    <?php
                        $sqlcate = "SELECT * FROM `catetree` WHERE `cateid`";
                        if($result = $conn -> query($sqlcate)){
                            while($row = $result -> fetch_assoc()){
                                echo'
                                <div class="col-12 col-lg-3 mt-3">
                                    <div class="card" style="width:100%;  background-color: antiquewhite;">
                                        <div class="container-fluid">
                                            
                                            <div class="row">
                                                <div class="col-sm-5 mt-3 mb-3">
                                                    <img class="rounded-circle" src="'.$row['image'].'" style="width:140px; height: 140px;">
                                                </div>
                                                <div class="col-sm-7 mt-3 mb-3">
                                                    <h5 class="card-title" style="margin-left: 10px;">'.$row['catename'].'</h5>
                                                    <hr>
                                                    <a class="btn" style="background-color: rgb(255, 145, 0); margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#addlist-'.$row['cateid'].'">เพิ่มรายการต้นไม้ +</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="modal fade" id="addlist-'.$row['cateid'].'">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="background-color: antiquewhite;">
                                            <div class="modal-header">
                                                <h5 class="modal-title">เพิ่มรายการต้นไม้</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                                            </div>
                            
                                            <div class="modal-body">
                                                      <div class="card" style=" background-color: #00370f; ">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                           
                                                            </div>
                                                            <div class="col-sm-6 mt-2" style="margin-left: -1rem; ">
                                                              
                                                                <img  class="rounded-circle mb-3 mt-3" src="image/catetree.JPG" style="width:230px; height:230px;  border-radius: 20px;">
                                                                
                                                            </div>
                                            
                                                            <div class="col-sm-6" style="margin-left: 1rem;">
                                                                <form action="addcateTree.php" method="post" enctype="multipart/form-data">
                                                                    <select id="cate" name="cate">
                                                                   
                                                                    <option value="'.$row['catename'].'">'.$row['catename'].'</option>
                                                        

                                                                    
                                                                    </select>
                                                                       
                                                                    <div class="mb-3 mt-3">
                                                                        <label for="treename" class="form-label" style="color:#fff;">ชื่อต้นไม้</label>
                                                                        <input class="form-control" id="treename" name="treename" style="width: 80%;" placeholder="ชื่อต้นไม้.....">
                                                                    </div>
                                                                    <div class="mb-3 mt-3">
                                                                        <label for="namesi" class="form-label" style="color:#fff;">ชื่อวิทยาศาสตร์</label>
                                                                        <input class="form-control" id="namesi" name="namesi" style="width: 80%;" placeholder="ชื่อวิทยาศาสตร์.....">
                                                                    </div>
                                                                    <div class="mb-3 mt-3">
                                                                        <label for="aong" class="form-label" style="color:#fff;">องค์</label>
                                                                        <input class="form-control" id="aong" name="aong" style="width: 80%;" placeholder="องค์.....">
                                                                    </div>
                                                                    <div class="mb-3 mt-3">
                                                                        <label for="nature" class="form-label" style="color:#fff;">ลักษณะ</label>
                                                                        <textarea class="form-control" rows="5" id="nature" name="nature"placeholder="ลักษณะ....."></textarea>
                                                                    </div>
                                                                    <div class="mb-3 mt-3">
                                                                        <label for="imglist" class="form-label" style="color:#fff;">รูปถาพต้นไม้</label>
                                                                        <input type="file" class="form-control" id="imglist" name="imglist" >
                                                                    </div>
                            
                                                                  
                                                                    
                                                                    <div class="mb-3">
                                                                        <button class="btn" style="background: linear-gradient(#beffbf, #024e01); color:#fff; width: 100%;" type="submit" name="addlist-'.$row['catename'].'">เพิ่มข้อมูล</button>
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
                                
                               
                                '; 
                            
                                if(isset($_POST['addlist-'.$row['catename'].''])){
                                    $cateid = $row['cateid'];
                                    $treename = $_POST['treename'];
                                    $namesi = $_POST['namesi'];
                                    $aong = $_POST['aong'];
                                    $nature = $_POST['nature'];
                                    $filename = $_FILES['imglist']["name"];
                                    $dir1 = "image/".$filename;
                                    

                                    $sqladdlist = "INSERT INTO `tree`(`treeid`, `cateid`, `treename`, `namesi`, `aong`, `nature`, `image`) VALUES (NULL,'$cateid','$treename','$namesi','$aong','$nature','$dir1')";
                                    $addlist = mysqli_query($conn , $sqladdlist);

                                    echo "<meta http-equiv='refresh' content='0'>";

                                    
                                }
                           
                            }
                        }
                    ?>

    
        </div>
    </div>



   



   



    

</body>
</html>