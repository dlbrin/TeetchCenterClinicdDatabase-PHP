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
				<td>جوری ددان</td>
				<td>نرخی ددان</td>
				<td>کۆی گشتی</td>
				<td>رۆژ</td>
				<td>ناوی تاقیگە</td>
				<td>تێبینی</td>
				<td>داخلکردن</td>
			</tr>
			<tr>
				<form method="POST" action="modal/lab.inc.php">
					<td><input type="text" name="sickname"></td>
					<td><input type="text" name="teethtype"></td>
					<td><input type="text" name="teethprice"></td>
					<td><input type="text" name="allsum"></td>
					<td><input type="date" name="date"></td>
					<td><input type="text" name="namelab"></td>
					<td><input type="text" name="notes"></td>
					<td><button name="labbtn">داخلکرن</button></td>
				</form>
			</tr>
		</table>
	</div>
	<div class="show-our-table">
		<table>
			<tr style="background-color: #FC813C;">
				<td>ناوی نەخۆش</td>
				<td>جوری ددان</td>
				<td>نرخی ددان</td>
				<td>کۆی گشتی</td>
				<td>رۆژ</td>
				<td>ناوی تاقیگە</td>
				<td>تێبینی</td>
				<td>کردار</td>
				<td>سڕینەوە</td>
			</tr>
			<?php
			$sum = 0;
			$ExpQuery = mysqli_query($db , "SELECT * FROM `lab` ORDER BY `id` DESC");
			while($ExpRow = mysqli_fetch_assoc($ExpQuery)){
				$sum += sec($ExpRow['allsum'])?>
				<tr>
					<td><?php echo sec($ExpRow['sickname']);?></td>
					<td><?php echo sec($ExpRow['teethtype']);?></td>
					<td><?php echo sec($ExpRow['teethprice']);?></td>
					<td><?php echo sec($ExpRow['allsum']);?></td>
					<td><?php echo sec($ExpRow['date']);?></td>
					<td><?php echo sec($ExpRow['namelab']);?></td>
					<td><?php echo sec($ExpRow['notes']);?></td>
					<td data-bs-toggle="modal" data-bs-target="#edit<?php echo sec($ExpRow['id']);?>">دەستکاری</td>
					<td>
						<form method="POST" action="modal/lab.inc.php">
							<input type="hidden" name="deletid" value="<?php echo sec($ExpRow['id']);?>">
							<button name="deletelab">سڕینەوە</button>
						</form>
					</td>
				</tr>
				<!-- Modal -->
				<div class="modal fade" id="edit<?php echo sec($ExpRow['id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="sickedit">
									<form method="POST" action="modal/lab.inc.php">
										<input type="hidden" name="editexid" value="<?php echo sec($ExpRow['id']);?>">
										<div>
											<h4>ناوی نەخۆش: </h4>
											<input type="text" name="namedit" value="<?php echo sec($ExpRow['sickname']);?>">
										</div>
										<div>
											<h4>جوری ددان	: </h4>
											<input type="text" name="typeedit" value="<?php echo sec($ExpRow['teethtype']);?>">
										</div>
										<div>
											<h4>نرخی ددان: </h4>
											<input type="text" name="priceedit" value="<?php echo sec($ExpRow['teethprice']);?>">
										</div>
										<div>
											<h4>کۆی گشتی: </h4>
											<input type="text" name="sumedit" value="<?php echo sec($ExpRow['allsum']);?>">
										</div>
										<div>
											<h4>رۆژ: </h4>
											<input type="date" name="dateedit" value="<?php echo sec($ExpRow['date']);?>">
										</div>
										<div>
											<h4>ناوی تاقیگە: </h4>
											<input type="text" name="labnedit" value="<?php echo sec($ExpRow['namelab']);?>">
										</div>
										<div>
											<h4>تێبینی	: </h4>
											<input type="text" name="editnotes" value="<?php echo sec($ExpRow['notes']);?>">
										</div>
										<div>
											<button name="editlab">بگۆرە</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<tr>
				<td style="color: #022069;">کۆی گشتی: </td>
				<td style="color: #022069;"><?php echo $sum?> دولار</td>
			</tr>
		</table>
	</div>
	<?php
	if(isset($_SESSION['EmptyExp'])){?>
		<script>
			swal({
				title: "<?php echo $_SESSION['EmptyExp']; ?>",
				icon: "error",
				button: "باشە",
			});
		</script>
		<?php unset($_SESSION['EmptyExp']); } ?>
	</body>
	</html>