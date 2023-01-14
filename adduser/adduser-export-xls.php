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
				<h4> ข้อมูล USER </h4>

				<p>
					<a href="?act=excel" class="btn btn-primary"> Export->Excel </a>
				</p>
				<table class='table'>
					<thead>
						<tr class="info">
							<th>ลำดับ</th>
							<th>เลขบัครประชาชน</th>
							<th>คำนำหน้าชื่อ</th>
							<th>ชื่อ</th>
							<th>นามสกุล</th>
							<th>เบอร์</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$sql = " SELECT * FROM user ";
						$q = mysqli_query($con, $sql);
						$no = 1;
						while ($f = mysqli_fetch_assoc($q)) {
							if ($f['member_id'] == '0') {
								continue;
							}
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $f['member_id']; ?> </td>
								<td><?php echo $f['hname']; ?> </td>
								<td><?php echo $f['name']; ?> </td>
								<td><?php echo $f['lname']; ?> </td>
								<td><?php echo $f['tel']; ?> </td>
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