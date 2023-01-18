<?php
include 'condb.php';
?>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">ทั้งหมด</button>
    </li>
    <?php
    $sql = " SELECT * FROM item_type ORDER BY item_type_id ASC ";
    $q = mysqli_query($con, $sql);
    $no = 1;
    while ($f = mysqli_fetch_assoc($q)) {
    ?>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $f['item_type_name']; ?>" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><?php echo $f['item_type_name']; ?></button>
        </li>
    <?php } ?>

</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
        <?php include 'showItem.php'; ?>
    </div>

    <?php
    $sql = " SELECT * FROM item_type ORDER BY item_type_id ASC ";
    $q = mysqli_query($con, $sql);
    $no = 1;
    while ($f = mysqli_fetch_assoc($q)) {
    ?>

    <div class="tab-pane fade" id="pills-<?php echo $f['item_type_name']; ?>" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <?php 
            include 'showitemfeattype.php';
       ?>
    </div>

    <?php } ?>
</div>
