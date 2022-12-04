<?php session_start();
if (!$_SESSION["id"]) {  //check session
    Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}
?>

<!doctype html>
<html>

<head>
    <?php
    include 'HeadDetail.php';
    ?>
</head>

<body>
    <?php

    include 'bootstrap.php';
    include 'Nav.php';
    ?>

    <div class="card">
        <div class="card-body">

            <?php
            include 'Dashboard.php';
            ?>
            <form class="d-flex mb-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
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


                        <div class="col-md-auto">
                            <div class="card mt-3" style="width: 18rem;">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTVq_1AdQgj9JVocJh8SPhVPDoQxugEO0kB-g&usqp=CAU&fbclid=IwAR1hDAjhrx60gq3dvi1Y_JdKpMkQYVMDp4u2iw78aydVSumURZux_qRObeQ" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $f['ItemName']; ?></h5>
                                    <p class="card-text">จำนวน : <?php echo $f['Amount']; ?></p>
                                    <p class="card-text">ราคา : <?php echo $f['Price']; ?></p>
                                    <form action="Cart-add.php" method="post">
                                        <input type="hidden" name="ItemName" value="<?php echo $f['ItemName']; ?>">
                                        <input type="hidden" name="QTY" value="1">
                                        <input type="hidden" name="TotalPrice" value="<?php echo $f['Price']; ?>">
                                        <input type="submit" class="btn btn-primary" value="ใส่ตะกร้า">
                                    </form>
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

</html>