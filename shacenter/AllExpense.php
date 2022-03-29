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
<body style="background-color: #ecf0f3; height: 100%;">
	<div class="headre-of-page-with-search-serach" style="margin-top: 50px;">
		<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<input type="text" name="search" placeholder="بگەرێ...">
			<button>بگەرێ</button>
		</form>
	</div>
	<!-- DATA SEARCH -->
	<?php
	if(isset($_GET['search'])){
		$Data = sec($_GET['search']);
		$SearchQuery = mysqli_query($db , "SELECT * FROM `expense` WHERE `goods` LIKE '%$Data%' OR `summoney` LIKE '%$Data%' OR `company` LIKE '%$Data%' OR `date` LIKE '%$Data%'");
		if(mysqli_num_rows($SearchQuery) > 0){?>
			<div class="show-our-table">
				<div class="day-of-expense">
					<h1>ئەنجامی گەران</h1>
				</div>
				<table>
					<tr style="background-color: #2aa99e;">
						<td>جوری کەلوپەل</td>
						<td>ناوی کۆمپانیا</td>
						<td>رۆژ</td>
						<td>کۆی گشتی</td>
						<td>واصل</td>
						<td>تێبینی</td>
						<td>کردار</td>
						<td>سڕینەوە</td>
					</tr>
					<?php
					$sum = 0;
					while($SearchRow = mysqli_fetch_assoc($SearchQuery)){
						$sum += sec($SearchRow['summoney']);?>
						<tr>
							<td><?php echo sec($SearchRow['goods']);?></td>
							<td><?php echo sec($SearchRow['company']);?></td>
							<td><?php echo sec($SearchRow['date']);?></td>
							<td><?php echo sec($SearchRow['summoney']);?></td>
							<td data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo sec($SearchRow['id']);?>"><?php echo sec($SearchRow['continued']);?></td>
							<td><?php echo sec($SearchRow['notes']);?></td>
							<td data-bs-toggle="modal" data-bs-target="#edit<?php echo sec($SearchRow['id']);?>">دەستکاری</td>
							<td>
								<form method="POST" action="modal/expense.inc.php">
									<input type="hidden" name="deletid" value="<?php echo sec($SearchRow['id']);?>">
									<button name="deleteexp">سڕینەوە</button>
								</form>
							</td>
						</tr>
						<!-- Modal -->
						<div class="modal fade" id="exampleModal<?php echo sec($SearchRow['id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<center>
											<form method="POST" action="modal/expense.inc.php">
												<input type="hidden" name="expid" value="<?php echo sec($SearchRow['id']);?>">
												<select name="edcontinued">
													<option disabled><?php echo sec($SearchRow['continued']);?></option>
													<option>قەرز</option>
													<option>واصل</option>
												</select>
												<br>
												<br>
												<button name="editexp">بگۆرە</button>
											</form>
										</center>
									</div>
								</div>
							</div>
						</div>

						<!-- Modal -->
						<div class="modal fade" id="edit<?php echo sec($SearchRow['id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<div class="sickedit">
											<form method="POST" action="modal/expense.inc.php">
												<input type="hidden" name="editexid" value="<?php echo sec($SearchRow['id']);?>">
												<div>
													<h4>جوری کەلوپەل: </h4>
													<input type="text" name="goodedit" value="<?php echo sec($SearchRow['goods']);?>">
												</div>
												<div>
													<h4>ناوی کۆمپانیا: </h4>
													<input type="text" name="companyedit" value="<?php echo sec($SearchRow['company']);?>">
												</div>
												<div>
													<h4>رۆژ: </h4>
													<input type="date" name="editdate" value="<?php echo sec($SearchRow['date']);?>">
												</div>
												<div>
													<h4>کۆی گشتی: </h4>
													<input type="text" name="editmoney" value="<?php echo sec($SearchRow['summoney']);?>">
												</div>
												<div>
													<h4>تێبینی: </h4>
													<input type="text" name="editnotes" value="<?php echo sec($SearchRow['notes']);?>">
												</div>
												<div>
													<button name="editallexp">بگۆرە</button>
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
				<br>
				<a href="AllExpense.php">بگەرێوە</a>
			</div>
			<?php 
		}else{?>
			<h1 style="color: red; font-size: 26px; text-align: center; direction: rtl;"> هیچ داتایێک نییە بەو ناوە....</h1>
			<br>
			<center><a href="AllExpense.php">بگەرێوە</a></center>
		<?php }
		exit();
	}
	?>
	<!-- END DATA SEARCH -->
	<div class="show-our-table">
		<div class="day-of-expense">
			<h1>لیستی خەرجیەکان</h1>
		</div>
		<table>
			<tr style="background-color: #2aa99e;">
				<td>جوری کەلوپەل</td>
				<td>ناوی کۆمپانیا</td>
				<td>رۆژ</td>
				<td>کۆی گشتی</td>
				<td>واصل</td>
				<td>تێبینی</td>
				<td>کردار</td>
				<td>سڕینەوە</td>
			</tr>
			<?php
			$sum = 0;
			$ExpQuery = mysqli_query($db , "SELECT * FROM `expense` ORDER BY `id` DESC");
			while($ExpRow = mysqli_fetch_assoc($ExpQuery)){
				$sum += sec($ExpRow['summoney'])?>
				<tr>
					<td><?php echo sec($ExpRow['goods']);?></td>
					<td><?php echo sec($ExpRow['company']);?></td>
					<td><?php echo sec($ExpRow['date']);?></td>
					<td><?php echo sec($ExpRow['summoney']);?></td>
					<td data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo sec($ExpRow['id']);?>"><?php echo sec($ExpRow['continued']);?></td>
					<td><?php echo sec($ExpRow['notes']);?></td>
					<td data-bs-toggle="modal" data-bs-target="#edit<?php echo sec($ExpRow['id']);?>">دەستکاری</td>
					<td>
						<form method="POST" action="modal/expense.inc.php">
							<input type="hidden" name="deletid" value="<?php echo sec($ExpRow['id']);?>">
							<button name="deleteexp">سڕینەوە</button>
						</form>
					</td>
				</tr>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal<?php echo sec($ExpRow['id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<center>
									<form method="POST" action="modal/expense.inc.php">
										<input type="hidden" name="expid" value="<?php echo sec($ExpRow['id']);?>">
										<select name="edcontinued">
											<option disabled><?php echo sec($ExpRow['continued']);?></option>
											<option>قەرز</option>
											<option>واصل</option>
										</select>
										<br>
										<br>
										<button name="editexp">بگۆرە</button>
									</form>
								</center>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="edit<?php echo sec($ExpRow['id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="sickedit">
									<form method="POST" action="modal/expense.inc.php">
										<input type="hidden" name="editexid" value="<?php echo sec($ExpRow['id']);?>">
										<div>
											<h4>جوری کەلوپەل: </h4>
											<input type="text" name="goodedit" value="<?php echo sec($ExpRow['goods']);?>">
										</div>
										<div>
											<h4>ناوی کۆمپانیا: </h4>
											<input type="text" name="companyedit" value="<?php echo sec($ExpRow['company']);?>">
										</div>
										<div>
											<h4>رۆژ: </h4>
											<input type="date" name="editdate" value="<?php echo sec($ExpRow['date']);?>">
										</div>
										<div>
											<h4>کۆی گشتی: </h4>
											<input type="text" name="editmoney" value="<?php echo sec($ExpRow['summoney']);?>">
										</div>
										<div>
											<h4>تێبینی: </h4>
											<input type="text" name="editnotes" value="<?php echo sec($ExpRow['notes']);?>">
										</div>
										<div>
											<button name="editallexp">بگۆرە</button>
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



</body>
</html>