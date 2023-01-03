<p>
    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Dashboard System
    </a>
</p>
<p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <div class="row mb-2">
            <div class="col-sm-6 mb-2">
                <div class="card text-bg-warning">
                    <div class="card-body">
                        <h2 class="card-title">
                            <?php
                            include 'condb.php';
                            $quser = mysqli_query($con, " SELECT * FROM user  ");
                            $no = 0;
                            while ($f = mysqli_fetch_assoc($quser)) {
                                $no++;
                            }
                            echo $no;
                            ?>
                        </h2>
                        <p class="card-text">จำนวนสมาชิก</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card text-bg-primary">
                    <div class="card-body">
                        <h2 class="card-title">
                            <?php
                            include 'condb.php';
                            $qitem = mysqli_query($con, " SELECT * FROM item  ");
                            $no = 0;
                            while ($f = mysqli_fetch_assoc($qitem)) {
                                $no++;
                            }
                            echo $no;
                            ?>
                        </h2>
                        <p class="card-text">จำนวน สินค้า</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6 mb-2">
                <div class="card text-bg-danger">
                    <div class="card-body">
                        <h2 class="card-title">
                            <?php
                            include 'condb.php';
                            $qitemtype = mysqli_query($con, " SELECT * FROM item_type  ");
                            $no = 0;
                            while ($f = mysqli_fetch_assoc($qitemtype)) {
                                $no++;
                            }
                            echo $no;
                            ?>
                        </h2>
                        <p class="card-text">จำนวน ประเภทสินค้า</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card text-bg-success">
                    <div class="card-body">
                        <h2 class="card-title">
                            <?php
                            include 'condb.php';
                            $qsales_person = mysqli_query($con, " SELECT * FROM sales_person  ");
                            $no = 0;
                            while ($f = mysqli_fetch_assoc($qsales_person)) {
                                $no++;
                            }
                            echo $no;
                            ?>
                        </h2>
                        <p class="card-text">จำนวน การรับซื้อข้าว</p>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="card text-bg-info">
                        <div class="card-body">
                            <h2 class="card-title">
                                <?php
                                //
                                include 'condb.php';
                                $qsale = mysqli_query($con, " SELECT * FROM sale  ");
                                $no = 0;
                                while ($f = mysqli_fetch_assoc($qsale)) {
                                    $no++;
                                }
                                echo $no;
                                ?>
                            </h2>
                            <p class="card-text">จำนวน รายการขาย</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</p>