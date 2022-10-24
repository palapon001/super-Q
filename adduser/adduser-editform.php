<?php
session_start();

include '../condb.php';

$user_id = mysqli_real_escape_string($con, $_GET['user_id']);

//2. query ข้อมูลจากตาราง  : 
$sql = "SELECT * FROM user WHERE user_id='$user_id' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql ");
$row = mysqli_fetch_array($result);
extract($row);
?>

<form method="post" action="adduser-edit-db.php">
    <h3>แก้ไขข้อมูล <?php echo $user_id; ?> </h3>
    <table align="center">
        <tr>
            <td> user id  </td>
            <td>
                <input name="user_id" value="<?php echo $user_id; ?>" type="text">
            </td>
        </tr>

        <tr>
            <td> คำนำหน้า :</td>
            <td>
                <select name="hname">
                    <option value="<?php echo $hname; ?>"  selected> <?php echo $hname; ?> </option>
                    <option value="นาย">นาย</option>
                    <option value="นางสาว">นางสาว</option>
                    <option value="นาง">นาง</option>
                </select>

            </td>
        </tr>
        <tr>
            <td> ชื่อ :</td>
            <td>
                <input type="text" name="name" value="<?php echo $name; ?>" />
            </td>
        </tr>
        <tr>

        <tr>
            <td> นามสกุล </td>
            <td>
                <input name="lname" value="<?php echo $lname; ?>" type="text">
            </td>
        </tr>

        <tr>
            <td> tel </td>
            <td>
                <input name="tel" value="<?php echo $tel; ?>" type="text">
            </td>
        </tr>





    </table>
    <button type="button" onclick="history.back() "> ยกเลิก </button>
    <input type="submit" value="แก้ไข">
</form>



</div>


</body>

</html>