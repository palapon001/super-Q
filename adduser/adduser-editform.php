<?php
session_start();

include 'condb.php';

$user_id = mysqli_real_escape_string($con, $_GET['user_id']);

//2. query ข้อมูลจากตาราง: 
$sql = "SELECT * FROM user WHERE user_id='$user_id' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql ");
$row = mysqli_fetch_array($result);
extract($row);
?>

        <form method="post" action="adduser-edit-db.php">
            <h3 >แก้ไขข้อมูล <?php echo $user_id; ?> </h3>
            <table  align="center">
                <tr>
                    <td> name :</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>"  />
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />

                    </td>
                </tr>
                <tr>

                <tr>
                    <td> lname </td>
                    <td>
                        <input name="lname" value="<?php echo $lname; ?>" type="text" id="password">
                    </td>





            </table>
            <button type="button" onclick="history.back() "> ยกเลิก </button>
            <input type="submit"  value="แก้ไข">
        </form>



    </div>


</body>

</html>