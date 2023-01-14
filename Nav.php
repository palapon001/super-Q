 <div class="collapse" id="navbarToggleExternalContent">
     <div class="bg-dark p-4">
         <h5 class="text-white h4">Menu</h5>
         <a class='btn btn-primary mb-1' href="./addSale/addsale.php">แสดงรายการขาย</a>
         <a class='btn btn-primary mb-1' href="./adduser/adduser.php">จัดการ สมาชิก</a>
         <a class='btn btn-primary mb-1' href="./additem/additem.php">จัดการ สินค้า</a>
         <a class='btn btn-primary mb-1' href="./additemtype/additemtype.php">จัดการ ประเภทสินค้า</a>
         <a href="logout.php" class="btn btn-danger mb-1">ออกจากระบบ</a>
     </div>
 </div>
 <nav class="navbar navbar-dark bg-dark">
     <div class="container-fluid">
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <a class="navbar-brand" href="page.php">SYSTEM</a>
         <?php include 'Cart.php'; ?>
     </div>
 </nav>