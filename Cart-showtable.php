<div class="table-responsive">
  <table class="table">
    <tr>
        <td>ลำดับ</td>
        <td>ชื่อสินค้า</td>
        <td>จำนวน</td>
        <td>ราคา</td>
        <td>ลบ</td>
    </tr>
    <?php
$totalsum = 0;
    $sql = " SELECT * FROM cart ORDER BY Cartno ASC ";
    $q = mysqli_query($con, $sql);
    //$no = 1;
    while ($f = mysqli_fetch_assoc($q)) {
    ?>
        <tr>
        <td><?php echo $f['Cartno']; ?> </td>
            <td><?php echo $f['ItemName']; ?> </td>
            <td> <input type="text" class="form-control" value="<?php echo $f['QTY']; ?> "> </td>
            <td><?php echo $f['TotalPrice']; ?> </td>
            <td><a href='Cart-del.php?Cartno=<?php echo $f['Cartno']; ?>' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

        </tr>

    <?php
         $totalsum += $f['TotalPrice'];
    }

    echo "</table>";
    mysqli_close($con);
    ?>
  <h1>ราคารวม : <?php echo $totalsum ;?></h1>
</div>