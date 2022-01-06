<?php
session_start();
require_once('config.php');


$a_username = $_POST['a_username'];
$a_password = $_POST['a_password'];

$sql = "SELECT * FROM administrator WHERE password = ? LIMIT 1";
$stmtselect  = $db->prepare($sql);
$result = $stmtselect->execute([$a_username, $a_password]);

if($result){
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){
		$_SESSION['adminlogin'] = $administrator;
		echo '1';
	}else{
		echo 'There no user for that combo';
	}
}else{
	echo 'There were errors connecting to database.';
}
