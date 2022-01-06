<?php
session_start();
require_once('config.php');


$username = $_POST['a_username'];
$password = $_POST['a_password'];

$sql = "SELECT * FROM administrator WHERE a_username = ? AND a_password = ? LIMIT 1";
$stmtselect  = $db->prepare($sql);
$result = $stmtselect->execute([$username, $password]);

if($result){
	$administrator = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){
		$_SESSION['adminlogin'] = $administrator;
		echo '1';
	}else{
		echo 'There no user for that combo';
	}
}else{
	echo 'There were errors connecting to database.';
}
