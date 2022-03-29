<?php
session_start();
$db = mysqli_connect('localhost' , 'root' , '' , 'shacenter');
if(!$db){
	echo "داتابەیس نیە !";
}

date_default_timezone_set("Asia/Baghdad");
// Set Kurdish font in mysqli
$db->query("SET NAMES utf8");
$db->query("SET CHARACTER SET utf8");
mysqli_set_charset($db, 'utf8');

// Security Conf
function sec($data){
    global $db;
    $data = mysqli_real_escape_string($db,htmlspecialchars($data));
    return $data;
}

if(isset($_SESSION['adminid'])){
    $adminid = $_SESSION['adminid'];
}
?>