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
				<h4> ข้อมูลประเภทข้าว </h4>

				<p>
					<a href="?act=excel" class="btn btn-primary"> Export->Excel </a>
				</p>
				<table class='table'>
					<thead>
						<tr class="info">
							<th>ลำดับ</th>
							<th>ชื่อประเภทข้าว</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$sql = " SELECT * FROM item_type ORDER BY item_type_id ASC ";
						$q = mysqli_query($con, $sql);
						$no = 1;
						while ($f = mysqli_fetch_assoc($q)) {
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $f['item_type_name']; ?> </td>
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