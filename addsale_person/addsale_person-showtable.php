
<table class='table'>
    <tr>
        <td>บัตรประชาชน</td>
        <td>ชื่อ</td>
        <td>นามสกุล</td>
        <td>ประเภทข้าว</td>
        <td>จำนวนข้าว</td>
        <td>วันที่</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
    </tr>
    <?php

    $sql = " SELECT * FROM sales_person ORDER BY sale_p_id ASC ";
    $q = mysqli_query($con, $sql);
    while ($f = mysqli_fetch_assoc($q)) {
    ?>
        <tr>
            <td><?php echo $f['sale_p_id']; ?> </td>
            <td><?php echo $f['sale_p_name']; ?> </td>
            <td><?php echo $f['sale_p_lname']; ?> </td>
            <td><?php echo $f['item_type_id']; ?> </td>
            <td><?php echo $f['sale_p_qtyitem']; ?> </td>
            <td><?php echo $f['datetime']; ?> </td>

            <td><a href='addsale_person-editform.php?sale_p_id=<?php echo $f['sale_p_id']; ?>' class="btn btn-warning">แก้ไข</a></td>
            <td><a href='addsale_person-del.php?sale_p_id=<?php echo $f['sale_p_id']; ?>' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

        </tr>

    <?php
    }

    echo "</table>";
    mysqli_close($con);
    ?>