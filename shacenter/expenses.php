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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<div class="allex">
		<a href="AllExpense.php">کلیک بکە بۆ بینینی هەموو خەرجیەکان</a>
	</div>
	<div class="our-table">
		<table>
			<tr style="background-color: #2aa99e;">
				<td>جوری کەلوپەل</td>
				<td>ناوی کۆمپانیا</td>
				<td>رۆژ</td>
				<td>کۆی گشتی</td>
				<td>واصل</td>
				<td>تێبینی</td>
				<td>داخلکردن</td>
			</tr>
			<tr>
				<form method="POST" action="modal/expense.inc.php">
					<td><input type="text" name="type_of_expense"></td>
					<td><input type="text" name="name_of_company"></td>
					<td><input type="date" name="date_of_expense"></td>
					<td><input type="number" name="sum_of_money"></td>
					<td><select name="continued">
						<option>واصل</option>
						<option>قەرز</option>
					</select></td>
					<td><input type="text" name="notes"></td>
					<td><button name="expbtn">داخلکرن</button></td>
				</form>
			</tr>
		</table>
	</div>
	<div class="show-our-table">
		<div class="day-of-expense">
			<h1>خەرجیەکانی ئەمرۆ: <?php echo date('Y/m/d');?></h1>
		</div>
		<table>
			<tr style="background-color: #FC813C;">
				<td>جوری کەلوپەل</td>
				<td>ناوی کۆمپانیا</td>
				<td>رۆژ</td>
				<td>کۆی گشتی</td>
				<td>واصل</td>
				<td>تێبینی</td>
			</tr>
			<?php
			$sum = 0;
			$OurDate = date('Y/m/d');
			$ExpQuery = mysqli_query($db , "SELECT * FROM `expense` WHERE `date` = '$OurDate' ORDER BY `id` DESC");
			while($ExpRow = mysqli_fetch_assoc($ExpQuery)){
				$sum += sec($ExpRow['summoney'])?>
				<tr>
					<td><?php echo sec($ExpRow['goods']);?></td>
					<td><?php echo sec($ExpRow['company']);?></td>
					<td><?php echo sec($ExpRow['date']);?></td>
					<td><?php echo sec($ExpRow['summoney']);?></td>
					<td><?php echo sec($ExpRow['continued']);?></td>
					<td><?php echo sec($ExpRow['notes']);?></td>
				</tr>
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