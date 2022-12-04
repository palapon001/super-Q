
<table class='table'>
    <tr>
        <td>ลำดับ</td>
        <td>ชื่อสินค้า</td>
        <td>จำนวน</td>
        <td>ราคา</td>
        <td>รูปภาพ</td>
        <td>ประเภทสินค้า</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
    </tr>
    <?php

    $sql = " SELECT * FROM item ORDER BY ItemID ASC ";
    $q = mysqli_query($con, $sql);
    while ($f = mysqli_fetch_assoc($q)) {
    ?>
        <tr>
            <td><?php echo $f['ItemID']; ?> </td>
            <td><?php echo $f['ItemName']; ?> </td>
            <td><?php echo $f['Amount']; ?> </td>
            <td><?php echo $f['Price']; ?> </td>
            <td>
                <img src="<?php echo $f['imageFileName']; ?> " width="auto" height="50" >
            </td>
            <td><?php echo $f['ItemTypeID']; ?> </td>
            <td><a href='additem-editform.php?ItemID=<?php echo $f['ItemID']; ?> ' class="btn btn-warning">แก้ไข</a></td>
            <td><a href='additem-del.php?ItemID=<?php echo $f['ItemID']; ?> ' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

        </tr>

    <?php
    }

    echo "</table>";
    mysqli_close($con);
    ?>