
<table>
    <tr>
    <td>no.</td>
        <td>user_id</td>
        <td>sale_p_name</td>
        <td>sale_p_lname</td>
        <td>item_type_id</td>
        <td>sale_p_qtyitem</td>
        <td>datetime</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
    </tr>
    <?php

    $sql = " SELECT * FROM sales_person ORDER BY sale_p_id ASC ";
    $q = mysqli_query($con, $sql);
    $no = 1;
    while ($f = mysqli_fetch_assoc($q)) {
    ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $f['user_id']; ?> </td>
            <td><?php echo $f['sale_p_name']; ?> </td>
            <td><?php echo $f['sale_p_lname']; ?> </td>
            <td><?php echo $f['item_type_id']; ?> </td>
            <td><?php echo $f['sale_p_qtyitem']; ?> </td>
            <td><?php echo $f['datetime']; ?> </td>

            <td><a href='addsale_person-editform.php?sale_p_id=<?php echo $f['sale_p_id']; ?>' class="">แก้ไข</a></td>
            <td><a href='addsale_person-del.php?sale_p_id=<?php echo $f['sale_p_id']; ?>' class="" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

        </tr>

    <?php
        $no++;
    }

    echo "</table>";
    mysqli_close($con);
    ?>