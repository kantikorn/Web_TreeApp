<?php
    include 'server.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Tree</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .card {
  position: relative;
  width: 50%;
}

.image {
  display: block;
  width: 100%;
  height: auto;
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

.card:hover .overlay {
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
            <a class="navbar-brand" href="#" style="font-size: 20px; font-weight: bolder; color: #fff;">Tree Sriwinit Wittayakom</a>

        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
                <?php
                
               
                    $sqlshow = "SELECT * FROM `catetree` WHERE `cateid` ";
                        if($result = $conn -> query($sqlshow)){
                            while($row = $result -> fetch_assoc()){
                                echo '
                                <div class="col-12 col-lg-3">
                                <div class="card mt-3" style="width:100%;">
                                   
                                    <img src="'.$row['image'].'" alt="Avatar" class="image">
                                        <div class="overlay">
                                       
                                        <div class="text">หมวดหมู่: '.$row['catename'].'
                                        <a class="btn" style="background-color: rgb(255, 145, 0);  margin-left: 10px;" href="Detailtree.php?id='.$row['cateid'].'" id="'.$row['cateid'].'">ดูข้อมูลความรู้</a>
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