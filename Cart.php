<!-- Button trigger modal -->
<a type="button" class="icon" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <div class="material-symbols-outlined btn btn-primary">
    <i>shopping_cart</i>
  </div>
</a>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">ตะกร้าสินค้า</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        include 'condb.php';
        include 'Cart-showtable.php';
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        <button class="btn btn-primary" onclick="sumNumbers()">Sum</button>
        <form action="./addSale/addsale-add.php" method="post">
          <input type="submit" class="btn btn-primary" value="Payment">
        </form>
      </div>
    </div>
  </div>
</div>