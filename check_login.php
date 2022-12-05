<?php
session_start();
if (isset($_POST['username'])) {
  //connection
  include("condb.php");
  //รับค่า user & password
  $username = $_POST['username'];
  $password = $_POST['password'];
  //query 
  $sql = "SELECT * FROM login Where username='" . $username . "' and password='" . md5($password) . "' ";

  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $_SESSION["id"] = $row["login_id"];
    Header("Location: page.php");
  } else {
    echo "<script>";
    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
  }
} else {

  Header("Location: index.php"); //user & password incorrect back to login again

}
