<table class='table'>
    <tr>
    <td>ลำดับ</td>
        <td>เลขบัครประชาชน</td>
        <td>คำนำหน้าชื่อ</td>
        <td>ชื่อ</td>
        <td>นามสกุล</td>
        <td>เบอร์</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
    </tr>
    <?php

    $sql = " SELECT * FROM user ";
    $q = mysqli_query($con, $sql);
    $no = 1;
    while ($f = mysqli_fetch_assoc($q)) {
        if($f['member_id'] == '0' ){
            continue;
        }
    ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $f['member_id']; ?> </td>
            <td><?php echo $f['hname']; ?> </td>
            <td><?php echo $f['name']; ?> </td>
            <td><?php echo $f['lname']; ?> </td>
            <td><?php echo $f['tel']; ?> </td>
            <td><a href='adduser-editform.php?user_id=<?php echo $f['member_id']; ?>' class="btn btn-warning">แก้ไข</a></td>
            <td><a href='adduser-del.php?user_id=<?php echo $f['member_id']; ?>' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>
        </tr>

    <?php
        $no++;
    }

    echo "</table>";
    mysqli_close($con);
    ?>