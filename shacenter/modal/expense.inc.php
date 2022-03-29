<?php
include '../include/config.php';

if(isset($_POST['expbtn'])){
	$type_of_expense = sec($_POST['type_of_expense']);
	$type_of_metrial = sec($_POST['type_of_metrial']);
	$name_of_company = sec($_POST['name_of_company']);
	$date_of_expense = sec($_POST['date_of_expense']);
	$type_of_money = sec($_POST['type_of_money']);
	$sum_of_money = sec($_POST['sum_of_money']);
	$continued = sec($_POST['continued']);
	$notes = sec($_POST['notes']);

	if(empty($type_of_expense) || empty($date_of_expense)){
		$_SESSION['EmptyExp'] = "هەموو خاڵیک پر بکەوە";
		header('Location: ../expenses.php');
	}else{
		$ExpeQuery = mysqli_query($db , "INSERT INTO `expense`(`goods` , `material` , `company` , `date` , `typemoney` , `summoney` , `continued` , `notes`) VALUES('$type_of_expense' , '$type_of_metrial' , '$name_of_company' , '$date_of_expense' , '$type_of_money' , '$sum_of_money' , '$continued' , '$notes')");
		if($ExpeQuery){
			header('Location: ../expenses.php');
		}
	}

}


if(isset($_POST['editexp'])){
	$edcontinued = sec($_POST['edcontinued']);
	$expid = sec($_POST['expid']);

	$EditQuery = mysqli_query($db , "UPDATE `expense` SET `continued`='$edcontinued' WHERE `id` = '$expid'");
	if($EditQuery){
		header('Location: ../AllExpense.php');
	}
}


if(isset($_POST['editallexp'])){
	$editexid = sec($_POST['editexid']);
	$goodedit = sec($_POST['goodedit']);
	$companyedit = sec($_POST['companyedit']);
	$editdate = sec($_POST['editdate']);
	$editmoney = sec($_POST['editmoney']);
	$editnotes = sec($_POST['editnotes']);

	$EditExpQuery = mysqli_query($db , "UPDATE `expense` SET `goods` = '$goodedit' , `company` = '$companyedit' , `date` = '$editdate' , `summoney` = '$editmoney' , `notes` = '$editnotes' WHERE `id` = '$editexid'");
	if($EditExpQuery){
		header('Location: ../AllExpense.php');
	}
}

if(isset($_POST['deleteexp'])){
	$deletid = sec($_POST['deletid']);

	$DeleteQuery = mysqli_query($db , "DELETE FROM `expense` WHERE `id` = '$deletid'");
	if($DeleteQuery){
		header('Location: ../AllExpense.php');
	}
}
?>