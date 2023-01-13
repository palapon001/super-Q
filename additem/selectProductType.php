<select class="form-control" name="ItemTypeID">
    <option value="0" selectdisabled>ประเภทสินค้า</option>
    <?php
    $qitem_type = mysqli_query($con, " SELECT * FROM item_type  ");
    while ($f = mysqli_fetch_assoc($qitem_type)) {
    ?>
        <option value="<?php echo $f['item_type_id']; ?>"> <?php echo $f['item_type_name']; ?> </option>
    <?php
    }
    ?>
</select>