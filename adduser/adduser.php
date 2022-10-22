<?php session_start();
if (!$_SESSION["id"]) {  //check session
    Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
} else {
    echo '<a href="logout.php">Log out</a>';
}
include 'condb.php';
mysqli_query($con, "SET NAMES UTF8");
?>

<form neme="form" method="post" action="adduser-add.php">
    <label>เพิ่ม user : </label>
    <input type="text" name="name"  placeholder="name" />
    <input type="text" name="lname"  placeholder="lname" >
    <input type="submit" neme="save" value="save" />
</form>

<table>
    <tr>
        <td>user_id</td>
        <td>name</td>
        <td>lname</td>
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
            <td><?php echo $f['name']; ?> </td>
            <td><?php echo $f['lname']; ?> </td>
            <td><a href='adduser-editform.php?user_id= <?php echo $f['user_id']; ?> ' class="">แก้ไข</a></td>

            <td><a href='adduser-del.php?user_id= <?php echo $f['user_id']; ?> ' class="" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

        </tr>

    <?php
        $no++;
    }

    echo "</table>";
    mysqli_close($con);
    ?>