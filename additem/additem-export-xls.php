<?php
include "../condb.php";
if (isset($_GET['act'])) {
	if ($_GET['act'] == 'excel') {
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=export.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>xls</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<br /><br /><br />
				<h4> ข้อมูลข้าว </h4>

				<p>
					<a href="?act=excel" class="btn btn-primary"> Export->Excel </a>
				</p>
				<table class='table'>
					<thead>
						<tr class="info">
							<th>ลำดับ</th>
							<th>ชื่อสินค้า</th>
							<th>จำนวน</th>
							<th>ราคา</th>
							<th>รูปภาพ</th>
							<th>ชื่อผู้ขาย</th>
							<th>ประเภทสินค้า</th>
							<th>ความชื้น</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$sql = " SELECT * FROM item ORDER BY ItemID ASC ";
						$q = mysqli_query($con, $sql);
						while ($f = mysqli_fetch_assoc($q)) {
							$member = $f['Member'];
							$itemtypeid = $f['ItemTypeID'];
						?>
							<tr>
								<td><?php echo $no; ?> </td>
								<td><?php echo $f['ItemName']; ?> </td>
								<td><?php echo $f['Amount']; ?> </td>
								<td><?php echo $f['Price']; ?> </td>
								<td>
									<img src="<?php echo $f['imageFileName']; ?>" onerror="this.onerror=null; this.src='Logo.png'" width="auto" height="50">
								</td>
								<td>
									<?php
									if ($member == 0) {
										echo $f['seller'];
									} else {
										$user = " SELECT * FROM user where member_id =  $member ";
										$quser = mysqli_query($con, $user);
										while ($f1 = mysqli_fetch_assoc($quser)) {
											echo $f1['hname'];
										}
									}
									?>
								</td>
								<td>
									<?php
									$itemt = " SELECT * FROM item_type where item_type_id = $itemtypeid  ";
									$qitemt = mysqli_query($con, $itemt);
									while ($f2 = mysqli_fetch_assoc($qitemt)) {
										echo $f2['item_type_name'];
									}
									?>
								</td>
								<td><?php echo $f['Moisture']; ?></td>

							</tr>

						<?php
							$no++;
						}

						echo "</table>";
						mysqli_close($con);
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>