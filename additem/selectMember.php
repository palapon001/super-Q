<select class="form-control" name="Member">
    <?php
    $qitem_type = mysqli_query($con, " SELECT * FROM user  ");
    while ($f = mysqli_fetch_assoc($qitem_type)) {
    ?>
        <option value="<?php echo $f['member_id']?>"> <?php echo $f['hname']." ".$f['name']." ".$f['lname'];?> </option>
    <?php
    }
    ?>
</select>