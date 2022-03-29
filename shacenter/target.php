<?php include 'include/config.php';?>
<?php
if($adminid == false){
header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="our-table">
		<table>
			<tr style="background-color: #2aa99e;">
				<td>ناوی نەخۆش</td>
				<td>دکتۆرەکان</td>
				<td>بەروار</td>
				<td>خەرجی</td>
				<td>تارگێت</td>
				<td>داخلکردن</td>
			</tr>
			<tr>
				<form method="POST" action="modal/target.inc.php">
					<td><input type="text" name="sickname"></td>
					<td><select name="doctorname">
						<option>د.شارا</option>
						<option>د.سەیف</option>
						<option>د.رعد</option>
					</select></td>
					<td><input type="date" name="date"></td>
					<td><input type="text" name="cost"></td>
					<td><input type="text" name="targ"></td>
					<td><button name="targetbtn">داخلکرن</button></td>
				</form>
			</tr>
		</table>
	</div>
	<div class="show-our-table">
		<table>
			<tr style="background-color: #FC813C;">
				<td>ناوی نەخۆش</td>
				<td>دکتۆرەکان</td>
				<td>بەروار</td>
				<td>خەرجی</td>
				<td>تارگێت</td>
				<td>کردار</td>
				<td>سڕینەوە</td>
			</tr>
			<?php
			$TargetQuery = mysqli_query($db , "SELECT * FROM `target` ORDER BY `id` DESC");
			while($TargetRow = mysqli_fetch_assoc($TargetQuery)){?>
				<tr>
					<td><?php echo sec($TargetRow['sickname']);?></td>
					<td><?php echo sec($TargetRow['doctorname']);?></td>
					<td><?php echo sec($TargetRow['date']);?></td>
					<td><?php echo sec($TargetRow['cost']);?></td>
					<td><?php echo sec($TargetRow['target']);?></td>
					<td data-bs-toggle="modal" data-bs-target="#edit<?php echo sec($TargetRow['id']);?>">دەستکاری</td>
					<td>
						<form method="POST" action="modal/target.inc.php">
							<input type="hidden" name="deletid" value="<?php echo sec($TargetRow['id']);?>">
							<button name="deletetarget">سڕینەوە</button>
						</form>
					</td>
				</tr>
				<!-- Modal -->
				<div class="modal fade" id="edit<?php echo sec($TargetRow['id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="sickedit">
									<form method="POST" action="modal/target.inc.php">
										<input type="hidden" name="editexid" value="<?php echo sec($TargetRow['id']);?>">
										<div>
											<h4>ناوی نەخۆش: </h4>
											<input type="text" name="namedit" value="<?php echo sec($TargetRow['sickname']);?>">
										</div>
										<div>
											<h4>دکتۆرەکان: </h4>
											<input type="text" name="doctoeedit" value="<?php echo sec($TargetRow['doctorname']);?>">
										</div>
										<div>
											<h4>بەروار: </h4>
											<input type="date" name="dateedit" value="<?php echo sec($TargetRow['date']);?>">
										</div>
										<div>
											<h4>خەرجی: </h4>
											<input type="text" name="costedit" value="<?php echo sec($TargetRow['cost']);?>">
										</div>
										<div>
											<h4>تارگێت: </h4>
											<input type="text" name="targetedit" value="<?php echo sec($TargetRow['target']);?>">
										</div>
										<div>
											<button name="edittarget">بگۆرە</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</table>
	</div>
	</body>
	</html>

