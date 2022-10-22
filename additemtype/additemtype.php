<?php session_start();
if (!$_SESSION["id"]) {  //check session
    Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
} else {
    echo '<a href="logout.php">Log out</a>';
}
include 'condb.php';
mysqli_query($con, "SET NAMES UTF8");
?>

<form neme="form" method="post" action="additemtype-add.php">
    <label>เพิ่ม itemtype : </label>
    <input type="text" name="itemtypename"  placeholder="name" />
    <input type="submit" neme="save" value="save" />
</form>

<table>
    <tr>
        <td>item_type_id</td>
        <td>item_type_name</td>
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
            <td><a href='additemtype-editform.php?item_type_id= <?php echo $f['item_type_id']; ?> ' class="">แก้ไข</a></td>
            <td><a href='additemtype-del.php?item_type_id= <?php echo $f['item_type_id']; ?> ' class="" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

        </tr>

    <?php
        $no++;
    }

    echo "</table>";
    mysqli_close($con);
    ?>