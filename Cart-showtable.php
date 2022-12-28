<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<div class="table-responsive">
 
    <table class="table">
      <tr>
        <td>ลำดับ</td>
        <td>ชื่อสินค้า</td>
        <td>จำนวน</td>
        <td>ราคา</td>
        <td>ลบ</td>
      </tr>
      <?php
      $no = 1;
      $sql = " SELECT * FROM cart ORDER BY Cartno ASC ";
      $q = mysqli_query($con, $sql);
      while ($f = mysqli_fetch_assoc($q)) {
      ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $f['ItemName']; ?> </td>
          <td>
            <input type="text" name="ip" id="ip<?php echo $no; ?>" class="form-control" value="" required>
          </td>
          <td>
            <div class="input-group mb-3 w-75">
            <form id="lines-form-1">
              <input class="form-control" id="i<?php echo $no; ?>" name="total" type="text" value="0">
            </form>
            </div>


          </td>
          <td><a href='Cart-del.php?Cartno=<?php echo $f['Cartno']; ?>' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

        </tr>

      <?php
        $no++;
      }

      echo "</table>";
      ?>
  <h1>
    ราคารวม :
    <div id="tot-qty">0</div>
  </h1>

</div>

<script>
  $('form#lines-form-1 :input').change(function() {
    var tot = 0;
    $("form#lines-form-1 :input").each(function() {
      tot += Number($(this).val());
    });
    $('#tot-qty').text(tot);
  });
</script>