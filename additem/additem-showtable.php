<table class='table'>
    <tr>
        <td>ลำดับ</td>
        <td>ชื่อสินค้า</td>
        <td>จำนวน</td>
        <td>ราคา</td>
        <td>รูปภาพ</td>
        <td>ชื่อผู้ขาย</td>
        <td>ประเภทสินค้า</td>
        <td>ความชื้น</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
    </tr>
    <?php
    $no = 1;
    $sql = " SELECT * FROM item ORDER BY ItemID ASC ";
    $q = mysqli_query($con, $sql);
    while ($f = mysqli_fetch_assoc($q)) {
        $member = $f['Member'];
        $itemtypeid = $f['ItemTypeID'];
    ?>
        <tr>
            <td><?php echo $no; ?> </td>
            <td><?php echo $f['ItemName']; ?> </td>
            <td><?php echo $f['Amount']; ?> </td>
            <td><?php echo $f['Price']; ?> </td>
            <td>
                <img src="<?php echo $f['imageFileName']; ?>" onerror="this.onerror=null; this.src='Logo.png'" width="auto" height="50">
            </td>
            <td>
                <?php
                if ($member == 0) {
                    echo $f['seller'];
                } else {
                    $user = " SELECT * FROM user where member_id =  $member ";
                    $quser = mysqli_query($con, $user);
                    while ($f1 = mysqli_fetch_assoc($quser)) {
                        echo $f1['hname'];
                    }
                }
                ?>
            </td>
            <td>
            <?php
                    $itemt = " SELECT * FROM item_type where item_type_id = $itemtypeid  ";
                    $qitemt = mysqli_query($con, $itemt);
                    while ($f2 = mysqli_fetch_assoc($qitemt)) {
                        echo $f2['item_type_name'];
                    }
                ?>
            </td>
            <td><?php echo $f['Moisture']; ?></td>
            <td><a href='additem-editform.php?ItemID=<?php echo $f['ItemID']; ?> ' class="btn btn-warning">แก้ไข</a></td>
            <td><a href='additem-del.php?ItemID=<?php echo $f['ItemID']; ?> ' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

        </tr>

    <?php
        $no++;
    }

    echo "</table>";
    mysqli_close($con);
    ?>