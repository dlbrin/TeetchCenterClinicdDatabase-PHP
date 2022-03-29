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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<div class="show-our-table">
		<table>
			<tr style="background-color: #FC813C;">
				<td>بەروار</td>
				<td>پارەی پێشەکی</td>
				<td>پارەی تەواو</td>
				<td>جۆری کێشەکە</td>
				<td>سەردان</td>
				<td>کردار</td>
				<td>سڕینەوە</td>
			</tr>
			<?php
			$SickId = sec($_GET['id']);
			$ExpQuery = mysqli_query($db , "SELECT * FROM `editsicktables` WHERE `sickid` = '$SickId'");
			while($ExpRow = mysqli_fetch_assoc($ExpQuery)){?>
				<tr>
					<td><?php echo sec($ExpRow['date']);?></td>
					<td><?php echo sec($ExpRow['firstmoney']);?></td>
					<td><?php echo sec($ExpRow['lastmoney']);?></td>
					<td><?php echo sec($ExpRow['problem']);?></td>
					<td><?php echo sec($ExpRow['visit']);?></td>
					<td data-bs-toggle="modal" data-bs-target="#gorin<?php echo sec($ExpRow['id']);?>">گورین</td>
					<td>
                <form method="POST" action="modal/sickdata.inc.php">
                  <input type="hidden" name="edeletid" value="<?php echo sec($ExpRow['id']);?>">
                  <button name="edeletesick">سڕینەوە</button>
                </form>
              </td>
				</tr>
				<!-- Edit Modal -->
				<div class="modal fade" id="gorin<?php echo sec($ExpRow['id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="sickedit">
									<form method="POST" action="modal/sickdata.inc.php">
										<input type="hidden" name="eeditid" value="<?php echo sec($ExpRow['id']);?>">
										<div>
											<h4>بەروار: </h4>
											<input type="date" name="eeditdate" value="<?php echo sec($ExpRow['date']);?>">
										</div>
										<div>
											<h4>پارەی پێشەکی  : </h4>
											<input type="text" name="eeditfirst" value="<?php echo sec($ExpRow['firstmoney']);?>">
										</div>
										<div>
											<h4>پارەی تەواو : </h4>
											<input type="text" name="eeditlast" value="<?php echo sec($ExpRow['lastmoney']);?>">
										</div>
										<div>
											<h4>جۆری کێشەکە : </h4>
											<input type="text" name="eeditproblem" value="<?php echo sec($ExpRow['problem']);?>">
										</div>
										<div>
											<h4>سەردان: </h4>
											<input type="text" name="eeditvisit" value="<?php echo sec($ExpRow['visit']);?>">
										</div>
										<div>
											<button name="eeditsick">بگۆرە</button>
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