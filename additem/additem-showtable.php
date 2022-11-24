
<table>
    <tr>
        <td>itemid</td>
        <td>itemname</td>
        <td>amount</td>
        <td>price</td>
        <td>img</td>
        <td>itemtypeid</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
    </tr>
    <?php

    $sql = " SELECT * FROM item ORDER BY ItemID ASC ";
    $q = mysqli_query($con, $sql);
    $no = 1;
    while ($f = mysqli_fetch_assoc($q)) {
    ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $f['ItemName']; ?> </td>
            <td><?php echo $f['Amount']; ?> </td>
            <td><?php echo $f['Price']; ?> </td>
            <td><?php echo $f['imageFileName']; ?> </td>
            <td><?php echo $f['ItemTypeID']; ?> </td>
            <td><a href='additemtype-editform.php?item_type_id= <?php echo $f['item_type_id']; ?> ' class="">แก้ไข</a></td>
            <td><a href='additemtype-del.php?item_type_id= <?php echo $f['item_type_id']; ?> ' class="" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

        </tr>

    <?php
        $no++;
    }

    echo "</table>";
    mysqli_close($con);
    ?>