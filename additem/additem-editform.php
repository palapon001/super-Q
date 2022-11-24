<?php
session_start();

include '../condb.php';

$item_type_id = mysqli_real_escape_string($con, $_GET['item_type_id']);

//2. query ข้อมูลจากตาราง: 
$sql = "SELECT * FROM item_type WHERE item_type_id='$item_type_id' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql ");
$row = mysqli_fetch_array($result);
extract($row);
?>

<form method="post" action="additemtype-edit-db.php">
    <h3>แก้ไขข้อมูล <?php echo $item_type_id; ?> </h3>
    <table align="center">
        <tr>
            <td> item_type_name :</td>
            <td>
                <input type="text" name="item_type_name" value="<?php echo $item_type_name; ?>" />
                <input type="hidden" name="item_type_id" value="<?php echo $item_type_id; ?>" />

            </td>
        </tr>
        <tr>


    </table>
    <button type="button" onclick="history.back() "> ยกเลิก </button>
    <input type="submit" value="แก้ไข">
</form>



</div>


</body>

</html>