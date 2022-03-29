<?php
include '../include/config.php';

if(isset($_POST['targetbtn'])){
	$sickname = sec($_POST['sickname']);
	$doctorname = sec($_POST['doctorname']);
	$date = sec($_POST['date']);
	$cost = sec($_POST['cost']);
	$targ = sec($_POST['targ']);

	if(empty($sickname) || empty($doctorname)){
		header('Location: ../target.php');
	}else{
		$TargetQuery = mysqli_query($db , "INSERT INTO `target`(`sickname` , `doctorname` , `date` , `cost` , `target`) VALUES('$sickname' , '$doctorname' , '$date' , '$cost' , '$targ')");
		if($TargetQuery){
			header('Location: ../target.php');
		}
	}

}

if(isset($_POST['edittarget'])){
	$editexid = sec($_POST['editexid']);
	$namedit = sec($_POST['namedit']);
	$doctoeedit = sec($_POST['doctoeedit']);
	$dateedit = sec($_POST['dateedit']);
	$costedit = sec($_POST['costedit']);
	$targetedit = sec($_POST['targetedit']);

	$EditExpQuery = mysqli_query($db , "UPDATE `target` SET `sickname` = '$namedit' , `doctorname` = '$doctoeedit' , `date` = '$dateedit' , `cost` = '$costedit' , `target` = '$targetedit' WHERE `id` = '$editexid'");
	if($EditExpQuery){
		header('Location: ../target.php');
	}
}

if(isset($_POST['deletetarget'])){
	$deletid = sec($_POST['deletid']);

	$DeleteQuery = mysqli_query($db , "DELETE FROM `target` WHERE `id` = '$deletid'");
	if($DeleteQuery){
		header('Location: ../target.php');
	}
}

?>


