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

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../HeadDetail.php';
    include '../bootstrap.php';
    ?>
</head>

<body>
    <div class="card ">
        <div class="card-body">
            <h3 class="card-title">แก้ไขข้อมูล <?php echo $sale_p_name; ?> </h3>
            <p class="card-text">

            <form method="post" action="addsale_person-edit-db.php">
                <input class="mt-3 form-control" type="text" name="sale_p_id" value="<?php echo $sale_p_id; ?>" />
                <input class="mt-3 form-control" type="text" name="user_id" value="<?php echo $user_id; ?>" />
                <input class="mt-3 form-control" type="text" name="sale_p_name" value="<?php echo $sale_p_name; ?>" />
                <input class="mt-3 form-control" type="text" name="sale_p_lname" value="<?php echo $sale_p_lname; ?>" />
                <input class="mt-3 form-control" type="text" name="item_type_id" value="<?php echo $item_type_id; ?>" />
                <input class="mt-3 form-control" type="text" name="sale_p_qtyitem" value="<?php echo $sale_p_qtyitem; ?>" />
                <input class="mt-3 form-control"type="datetime-local" name="datetime" value="<?php echo $datetime; ?>" />
                <button type="button" class="mt-3 btn btn-danger" onclick="history.back() "> ยกเลิก </button>
                <input type="submit" class="mt-3 btn btn-warning" value="แก้ไข">
            </form>


            </p>
        </div>
    </div>


</body>

</html>