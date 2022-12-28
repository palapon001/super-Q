<?php
session_start();

include '../condb.php';

$ItemID = mysqli_real_escape_string($con, $_GET['ItemID']);

//2. query ข้อมูลจากตาราง: 
$sql = "SELECT * FROM item WHERE ItemID='$ItemID' ";
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

    <div class="card mt-3">
        <div class="card-body">
            <h3 class="card-title">แก้ไขข้อมูล <?php echo $ItemName; ?> </h3>
            <p class="card-text">
            <form method="post" action="additem-edit-db.php">

                <input class="mt-3 form-control" type="text" name="ItemName" value="<?php echo $ItemName; ?>" />

                <input class="mt-3 form-control" type="text" name="Amount" value="<?php echo $Amount; ?>" />

                <input class="mt-3 form-control" type="text" name="Price" value="<?php echo $Price; ?>" />

                <input class="mt-3 form-control" type="text" name="imageFileName" value="<?php echo $imageFileName; ?>" />

                <?php include 'selectProductType.php' ; ?>



                <input type="hidden" name="ItemID" value="<?php echo $ItemID; ?>" />


                <button type="button" class='mt-3 btn btn-danger' onclick="history.back() "> ยกเลิก </button>
                <input type="submit" class='mt-3 btn btn-warning' value="แก้ไข">
            </form>
            </p>

        </div>
    </div>



</body>

</html>