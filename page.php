<?php session_start();
if (!$_SESSION["id"]) {  //check session
    Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include 'bootstrap.php';
    include 'Nav.php';
    ?>
    <div class="card">
        <div class="card-body">
            <h2>ประเภทข้าว</h2>
            <?php
            include './condb.php';
            $sql = " SELECT * FROM item_type ORDER BY item_type_id ASC ";
            $q = mysqli_query($con, $sql);
            $no = 1;
            while ($f = mysqli_fetch_assoc($q)) {
            ?>
                <button class="btn btn-danger"><?php echo $f['item_type_name']; ?> </button>
            <?php
                $no++;
            }
            ?>
            <p>
            <div class="container text-center">
                <div class="row">
                    <?php
                    $sql1 = " SELECT * FROM item ORDER BY itemid ASC ";
                    $q = mysqli_query($con, $sql1);
                    $no = 1;
                    while ($f = mysqli_fetch_assoc($q)) {
                    ?>

                      
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcnaYCELk-MeSCeUkQVdw0pyy2JnncIvS8FA&usqp=CAU" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $f['ItemName']; ?></h5>
                                    <p class="card-text">รายละเอียด</p>
                                    <a href="#" class="btn btn-primary">ใส่ตะกร้า</a>
                                </div>
                            </div>
                        </div>
                       


                    <?php
                        $no++;
                    }
                    mysqli_close($con);
                    ?>

                </div>
            </div>
            </p>
        </div>
    </div>



</body>
<script src="./menu.js"></script>

</html>