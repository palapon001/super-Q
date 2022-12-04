
<table class='table'>
    <tr>
        <td>ลำดับ</td>
        <td>ชื่อประเภทสินค้า</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
    </tr>
    <?php

    $sql = " SELECT * FROM item_type ORDER BY item_type_id ASC ";
    $q = mysqli_query($con, $sql);
    $no = 1;
    while ($f = mysqli_fetch_assoc($q)) {
    ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $f['item_type_name']; ?> </td>
            <td><a href='additemtype-editform.php?item_type_id= <?php echo $f['item_type_id']; ?> ' class="btn btn-warning">แก้ไข</a></td>
            <td><a href='additemtype-del.php?item_type_id= <?php echo $f['item_type_id']; ?> ' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

        </tr>

    <?php
        $no++;
    }

    echo "</table>";
    mysqli_close($con);
    ?>