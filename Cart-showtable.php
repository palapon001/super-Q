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
    $totalsum = 0;
    $sql = " SELECT * FROM cart ORDER BY Cartno ASC ";
    $q = mysqli_query($con, $sql);
    while ($f = mysqli_fetch_assoc($q)) {
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $f['ItemName']; ?> </td>
        <td>
          <input type="text" id="the_input_id<?php echo $no; ?>" class="form-control" value="" required>
        </td>
        <td>
          <script type='text/javascript' src='//code.jquery.com/jquery-1.11.0.js'></script>

          <script type='text/javascript'>
            $(function() {

              $('#the_input_id<?php echo $no; ?>').keyup(function() {
                updateTotal();
              });

              var updateTotal = function() {
                var input1 = parseInt($('#the_input_id<?php echo $no; ?>').val());
                var totals = parseFloat(input1 * <?php echo $f['TotalPrice']; ?>) || 0;
                $('#total<?php echo $no; ?>').text(totals);
                var sum = document.getElementById("#total<?php echo $no; ?>").value;  
                $('#totalsum').text(sum);
              };

            });
          </script>

          <div name="pree" id="total<?php echo $no; ?>" value="">
            <?php echo $f['TotalPrice']; ?>
          </div>


        </td>
        <td><a href='Cart-del.php?Cartno=<?php echo $f['Cartno']; ?>' class="btn btn-danger" onclick="return confirm('ต้องการจะลบหรือไม่')">ลบ</a></td>

      </tr>

    <?php
      $totalsum += $f['TotalPrice'];
      $no++;
    }

    echo "</table>";

    ?>
    <h1>
      ราคารวม :
      <div id="totalsum">

      </div>
    </h1>

</div>