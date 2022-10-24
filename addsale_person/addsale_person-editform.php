<?php
session_start();

include '../condb.php';

$sale_p_id = mysqli_real_escape_string($con, $_GET['sale_p_id']);

//2. query ข้อมูลจากตาราง: 
$sql = "SELECT * FROM sales_person WHERE sale_p_id='$sale_p_id' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql ");
$row = mysqli_fetch_array($result);
extract($row);
?>

<form method="post" action="addsale_person-edit-db.php">
    <h3>แก้ไขข้อมูล <?php echo $sale_p_id; ?> </h3>
    <table align="center">
        <tr>
            <td> sale_p_id :</td>
            <td>
                <input type="text" name="sale_p_id" value="<?php echo $sale_p_id; ?>" />
            </td>
        </tr>
        <tr>
            <td> user_id :</td>
            <td>
                <input type="text" name="user_id" value="<?php echo $user_id; ?>" />
            </td>
        </tr>
        <tr>
            <td> sale_p_name :</td>
            <td>
                <input type="text" name="sale_p_name" value="<?php echo $sale_p_name; ?>" />
            </td>
        </tr>
        <tr>
            <td> sale_p_lname :</td>
            <td>
                <input type="text" name="sale_p_lname" value="<?php echo $sale_p_lname; ?>" />
            </td>
        </tr>
        <tr>
            <td> item_type_id :</td>
            <td>
                <input type="text" name="item_type_id" value="<?php echo $item_type_id; ?>" />
            </td>
        </tr>
        <tr>
            <td> sale_p_qtyitem :</td>
            <td>
                <input type="text" name="sale_p_qtyitem" value="<?php echo $sale_p_qtyitem; ?>" />
            </td>
        </tr>
        <tr>
            <td> datetime :</td>
            <td>
                <input type="datetime-local" name="datetime" value="<?php echo $datetime; ?>" />
            </td>
        </tr>



    </table>
    <button type="button" onclick="history.back() "> ยกเลิก </button>
    <input type="submit" value="แก้ไข">
</form>



</div>


</body>

</html>