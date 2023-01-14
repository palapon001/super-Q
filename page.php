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
            <!-- <form class="d-flex mb-3" role="search"> 
                <input class="form-control me-2" type="search" id="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="button">Search</button>
            </form> -->

            <h2>ประเภทข้าว</h2>
            <?php
            include './condb.php';
            $sql = " SELECT * FROM item_type ORDER BY item_type_id ASC ";
            $q = mysqli_query($con, $sql);
            $no = 1;
            while ($f = mysqli_fetch_assoc($q)) {
            ?>
                <button class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $no; ?>" aria-expanded="false" aria-controls="collapseExample">
                    <?php echo $f['item_type_name']; ?>
                </button>
                <div class="collapse" id="collapseExample<?php echo $no; ?>">
                    <div class="card card-body">
                        <div class="container text-center">
                            <div class="row">
                                <?php
                                $itemt_id = $f['item_type_id'];
                                $qitem = " SELECT * FROM item where ItemTypeID = '$itemt_id' ";
                                $qi = mysqli_query($con, $qitem);
                                $no = 1;
                                while ($f = mysqli_fetch_assoc($qi)) {
                                ?>


                                    <div class="col-md-auto">
                                        <div class="card mt-3" style="width: 18rem;">
                                            <img src="<?php echo $f['imageFileName']; ?>" onerror="this.onerror=null; this.src='Logo.png'" class="card-img-top" width="200" height="200">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $f['ItemName']; ?></h5>
                                                <p class="card-text">จำนวน : <?php echo $f['Amount']; ?></p>
                                                <p class="card-text">ราคา : <?php echo $f['Price']; ?></p>
                                                <p class="card-text">
                                                    <button type="button" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" disabled>
                                                        <?php
                                                        if ($f['Member'] == 0) {
                                                            echo $f['seller'];
                                                        } else {
                                                            $iuser = $f['Member'];
                                                            $isuser = mysqli_query($con, " SELECT * FROM user where member_id = '$iuser'  ");
                                                            while ($isu = mysqli_fetch_assoc($isuser)) {
                                                                echo $isu['hname'] . " " . $isu['name'] . " " . $isu['lname'] . " " . $isu['tel'];
                                                            }
                                                        }
                                                        ?>
                                                    </button>
                                                </p>
                                                <p class="card-text">ประเภทข้าว :
                                                    <?php
                                                    $item_t_id = $f['ItemTypeID'];
                                                    $itemtypename = mysqli_query($con, " SELECT * FROM item_type where item_type_id = $item_t_id  ");
                                                    while ($a = mysqli_fetch_assoc($itemtypename)) {
                                                        echo $a['item_type_name'];
                                                    }
                                                    ?>
                                                </p>
                                                <form action="Cart_add.php" method="post">
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
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

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
                                <img src="<?php echo $f['imageFileName']; ?>" onerror="this.onerror=null; this.src='Logo.png'" class="card-img-top" width="200" height="200">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $f['ItemName']; ?></h5>
                                    <p class="card-text">จำนวน : <?php echo $f['Amount']; ?></p>
                                    <p class="card-text">ราคา : <?php echo $f['Price']; ?></p>
                                    <p class="card-text">
                                        <button type="button" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" disabled>
                                            <?php
                                            if ($f['Member'] == 0) {
                                                echo $f['seller'];
                                            } else {
                                                $iuser = $f['Member'];
                                                $isuser = mysqli_query($con, " SELECT * FROM user where member_id = '$iuser'  ");
                                                while ($isu = mysqli_fetch_assoc($isuser)) {
                                                    echo $isu['hname'] . " " . $isu['name'] . " " . $isu['lname'] . " " . $isu['tel'];
                                                }
                                            }
                                            ?>
                                        </button>
                                    </p>
                                    <p class="card-text">ประเภทข้าว :
                                        <?php
                                        $item_t_id = $f['ItemTypeID'];
                                        $itemtypename = mysqli_query($con, " SELECT * FROM item_type where item_type_id = $item_t_id  ");
                                        while ($a = mysqli_fetch_assoc($itemtypename)) {
                                            echo $a['item_type_name'];
                                        }
                                        ?>
                                    </p>
                                    <form action="Cart_add.php" method="post">
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