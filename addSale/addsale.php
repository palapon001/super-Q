<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../HeadDetail.php';
    include '../bootstrap.php';
    ?>
</head>

<body>
    <div class="card">
        <a href="../page.php" class="btn btn-dark "> หน้าหลัก </a>
        <div class="card-body">
            <div class="row">
                <?php
                include '../condb.php';
                $qsale = mysqli_query($con, " SELECT * FROM sale ORDER BY saledate desc ");
                while ($f = mysqli_fetch_assoc($qsale)) {
                    $saleno = $f['saleno'];
                    $qsaledetail = mysqli_query($con, " SELECT * FROM saledetail where SaleNo = '$saleno'");
                ?>
                    <div class="col-sm-6">
                        <p>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo 'รายการขายที่ ' . $f['saleno']; ?> </h5>
                            </div>
                            <p>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#<?php echo $f['saleno']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    รายละเอียด
                                </a>
                            </p>
                            <div class="collapse" id="<?php echo $f['saleno']; ?>">
                                <div class="card card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">SaleNo</th>
                                                    <th scope="col">ItemName</th>
                                                    <th scope="col">QTY</th>
                                                    <th scope="col">TotalPrice</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            while ($g = mysqli_fetch_assoc($qsaledetail)) {
                                            ?>
                                                <ul class="list-group list-group-flush">

                                                    <tbody>
                                                        <tr>
                                                            <td> <?php echo $no; ?> </td>
                                                            <td> <?php echo $g['SaleNo']; ?></td>
                                                            <?php
                                                            $ItemID = $g['ItemID'];
                                                            $qitemid = mysqli_query($con, " SELECT * FROM item where ItemID = $ItemID  ");
                                                            while ($a = mysqli_fetch_assoc($qitemid)) {
                                                            ?>
                                                                <td> <?php echo $a['ItemName']; ?></td>
                                                            <?php } ?>

                                                            <td> <?php echo $g['QTY']; ?></td>
                                                            <td> <?php echo $g['TotalPrice']; ?></td>
                                                        </tr>

                                                </ul>
                                            <?php
                                                $no++;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-body">
                                        <h5><?php echo 'ราคารวม = ' . $f['totalsum']; ?></h5>
                                        <a href="../report.php?saleno=<?php echo $saleno ; ?>" class="btn btn-success" >พิมพ์รายการ</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                        </p>
                    </div>
                <?php }
                ?>

            </div>
        </div>
    </div>
</body>

</html>