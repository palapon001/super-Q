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
          <div class="input-group mb-3">
            <input type="text" name="ip<?php echo $no; ?>" id="ip<?php echo $no; ?>" class="form-control" placeholder="กรอกจำนวนสินค้า" required>
            <span class="input-group-text">x<?php echo $f['TotalPrice']; ?> บาท</span>
          </div>
        </td>
        <td>
          <div class="input-group mb-3">
            <form id="lines-form-1">
              <input class="form-control" id="i<?php echo $no; ?>" name="total<?php echo $no; ?>" type="text" value="0" disabled>
            </form>
          </div>


        </td>
        <td><a href='Cart-del.php?Cartno=<?php echo $f['Cartno']; ?>' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

      </tr>
      <script>
        $('input[name=ip<?php echo $no; ?>]').on('keyup', function() {
          var qty = this.value;;
          var tot = 0;
          $('input[name=total<?php echo $no; ?>]').val(qty * <?php echo $f['TotalPrice']; ?>);
          $("form#lines-form-1 :input").each(function() {
            tot += Number($(this).val());
          });
          $('#tot-qty').text(tot);
        });
      </script>
    <?php
      $no++;
    }

    echo "</table>";
    ?>
    <h1>
      ราคารวม : <div id="tot-qty">0</div>
    </h1>

</div>