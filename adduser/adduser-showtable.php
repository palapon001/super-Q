<table>
    <tr>
    <td>no.</td>
        <td>user_id</td>
        <td>ชื่อ</td>
        <td>นามสกุล</td>
        <td>เบอร์</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
    </tr>
    <?php

    $sql = " SELECT * FROM user ORDER BY user_id ASC ";
    $q = mysqli_query($con, $sql);
    $no = 1;
    while ($f = mysqli_fetch_assoc($q)) {
    ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $f['user_id']; ?> </td>
            <td><?php echo $f['name']; ?> </td>
            <td><?php echo $f['lname']; ?> </td>
            <td><?php echo $f['tel']; ?> </td>
            <td><a href='adduser-editform.php?user_id=<?php echo $f['user_id']; ?>' class="">แก้ไข</a></td>

            <td><a href='adduser-del.php?user_id=<?php echo $f['user_id']; ?>' class="" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

        </tr>

    <?php
        $no++;
    }

    echo "</table>";
    mysqli_close($con);
    ?>