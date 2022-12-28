 <?php include 'condb.php'; ?>
 <form name="form1" method="post" action="check_login.php">
   <h1>Login System</h1>
   <p><input name="username" type="text" id="username" placeholder="ชื่อผู้ใช้" class="form-control"></p>
   <p><input name="password" type="password" id="password" placeholder="รหัสผ่าน" class="form-control"></p>
   <p><input type="submit" name="Submit" value="เข้าสู่ระบบ" class="btn btn-primary"></p>
 </form>