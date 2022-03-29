<?php
include '../include/config.php';

if(isset($_POST['labbtn'])){
	$sickname = sec($_POST['sickname']);
	$teethtype = sec($_POST['teethtype']);
	$teethprice = sec($_POST['teethprice']);
	$allsum = sec($_POST['allsum']);
	$date = sec($_POST['date']);
	$namelab = sec($_POST['namelab']);
	$notes = sec($_POST['notes']);

	if(empty($sickname) || empty($teethtype) || empty($teethprice) || empty($date)){
		$_SESSION['EmptyExp'] = "هەموو خاڵیک پر بکەوە";
		header('Location: ../lab.php');
	}else{
		$ExpeQuery = mysqli_query($db , "INSERT INTO `lab`(`sickname` , `teethtype` , `teethprice` , `allsum` , `date` , `namelab` , `notes`) VALUES('$sickname' , '$teethtype' , '$teethprice' , '$allsum' , '$date' , '$namelab' , '$notes')");
		if($ExpeQuery){
			header('Location: ../lab.php');
		}
	}

}


if(isset($_POST['editlab'])){
	$editexid = sec($_POST['editexid']);
	$namedit = sec($_POST['namedit']);
	$typeedit = sec($_POST['typeedit']);
	$priceedit = sec($_POST['priceedit']);
	$sumedit = sec($_POST['sumedit']);
	$dateedit = sec($_POST['dateedit']);
	$labnedit = sec($_POST['labnedit']);
	$editnotes = sec($_POST['editnotes']);

	$EditExpQuery = mysqli_query($db , "UPDATE `lab` SET `sickname` = '$namedit' , `teethtype` = '$typeedit' , `teethprice` = '$priceedit' , `allsum` = '$sumedit' , `date` = '$dateedit' , `namelab` = '$labnedit' , `notes` = '$editnotes' WHERE `id` = '$editexid'");
	if($EditExpQuery){
		header('Location: ../lab.php');
	}
}

if(isset($_POST['deletelab'])){
	$deletid = sec($_POST['deletid']);

	$DeleteQuery = mysqli_query($db , "DELETE FROM `lab` WHERE `id` = '$deletid'");
	if($DeleteQuery){
		header('Location: ../lab.php');
	}
}

?>