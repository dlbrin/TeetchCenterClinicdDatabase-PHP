<?php
include '../include/config.php';

if(isset($_POST['sickbtn'])){
	$name = sec($_POST['name']);
	$phone = sec($_POST['phone']);
	$date = sec($_POST['date']);
	$problem = sec($_POST['problem']);
	$doctorname = sec($_POST['doctorname']);
	$firstmoney = sec($_POST['firstmoney']);
	$lastmoney = sec($_POST['lastmoney']);

	if(empty($name) || empty($phone)){
		$_SESSION['empty'] = 'تکایە هەموو خاڵێک پر بکەوە';
		header('Location: ../regester.php');
	}else{
		$SickQuery = mysqli_query($db , "INSERT INTO `sicktable`(`name` , `phone` , `date` , `nameofdoctor` , `problem` , `firstmoney` , `lastmoney` , `visit`) VALUES('$name' , '$phone' , '$date' , '$doctorname' , '$problem' , '$firstmoney' , '$lastmoney' , '1')");
		if($SickQuery){
			$_SESSION['secc'] = 'سەرکەوتوو بوو';
			header('Location: ../regester.php');
		}
	}
}

if(isset($_POST['editsick'])){
	$namedoc = sec($_POST['namedoc']);
	$editid = sec($_POST['editid']);
	$editdate = sec($_POST['editdate']);
	$editfirst = sec($_POST['editfirst']);
	$editlast = sec($_POST['editlast']);
	$editproblem = sec($_POST['editproblem']);
	$editvisit = sec($_POST['editvisit']);

	$EditQuery = mysqli_query($db , "INSERT INTO `editsicktables`(`sickid` , `date` , `problem` , `firstmoney` , `lastmoney` , `visit`) VALUES('$editid' , '$editdate' , '$editproblem' , '$editfirst' , '$editlast' , '$editvisit')");
	if($EditQuery){
		header("Location: ../doctorsick.php?doctor=$namedoc");
	}
}

if(isset($_POST['ceditsick'])){
	$cnamedoc = sec($_POST['cnamedoc']);
	$ceditid = sec($_POST['ceditid']);
	$ceditname = sec($_POST['ceditname']);
	$ceditnum = sec($_POST['ceditnum']);
	$ceditdate = sec($_POST['ceditdate']);
	$ceditfirst = sec($_POST['ceditfirst']);
	$ceditlast = sec($_POST['ceditlast']);
	$ceditproblem = sec($_POST['ceditproblem']);
	$ceditvisit = sec($_POST['ceditvisit']);

	$EditQuery = mysqli_query($db , "UPDATE `sicktable` SET `name` = '$ceditname' , `phone` = '$ceditnum' , `date` = '$ceditdate' , `problem` = '$ceditproblem' , `firstmoney` = '$ceditfirst' , `lastmoney` = '$ceditlast' , `visit` = '$ceditvisit' WHERE `id` = '$ceditid'");
	if($EditQuery){
		header("Location: ../doctorsick.php?doctor=$cnamedoc");
	}
}

if(isset($_POST['eeditsick'])){
	$eeditid = sec($_POST['eeditid']);
	$eeditdate = sec($_POST['eeditdate']);
	$eeditfirst = sec($_POST['eeditfirst']);
	$eeditlast = sec($_POST['eeditlast']);
	$eeditproblem = sec($_POST['eeditproblem']);
	$eeditvisit = sec($_POST['eeditvisit']);

	$ChangeQuery = mysqli_query($db , "UPDATE `editsicktables` SET `date` = '$eeditdate' , `problem` = '$eeditproblem' , `firstmoney` = '$eeditfirst' , `lastmoney` = '$eeditlast' , `visit` = '$eeditvisit' WHERE `id` = '$eeditid'");
	if($ChangeQuery){
		header("Location: ../editdoctorsic.php?id=$eeditid");
	}
}

if(isset($_POST['deletesick'])){
	$deletid = sec($_POST['deletid']);
	$deletedoc = sec($_POST['deletedoc']);

	$DeleteQuery = mysqli_query($db , "DELETE FROM `sicktable` WHERE `id` = '$deletid'");
	if($DeleteQuery){
		header("Location: ../doctorsick.php?doctor=$deletedoc");
	}
}

if(isset($_POST['edeletesick'])){
	$edeletid = sec($_POST['edeletid']);

	$DeleteQuery = mysqli_query($db , "DELETE FROM `editsicktables` WHERE `id` = '$edeletid'");
	if($DeleteQuery){
		header("Location: ../editdoctorsic.php?id=$edeletid");
	}
}
?>