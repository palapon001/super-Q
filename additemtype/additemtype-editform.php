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

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../HeadDetail.php';
    include '../bootstrap.php';
    ?>
</head>

<body>'
    <div class="card ">
        <div class="card-body">
            <h3 class="card-title">แก้ไขข้อมูล <?php echo $item_type_name; ?> </h3>
            <p class="card-text">
            <form method="post" action="additemtype-edit-db.php">
                <input class="mt-3 form-control" type="text" name="item_type_name" value="<?php echo $item_type_name; ?>" />
                <input type="hidden" name="item_type_id" value="<?php echo $item_type_id; ?>" />
                <button class="mt-3 btn btn-danger" type="button" onclick="history.back() "> ยกเลิก </button>
                <input type="submit" value="แก้ไข" class="mt-3 btn btn-warning">
            </form>
            </p>
        </div>
    </div>



    </div>


</body>

</html>