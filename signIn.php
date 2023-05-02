<?php
// require "connect.php";
$conn = mysqli_connect("localhost", "root", "", "db_app");

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$username = $obj['username'];
$pass = $obj['pass'];
$phone = $obj['phone'];

$query = "SELECT * FROM user";
$query_ouput = mysqli_query($conn, $query);

$cout = mysqli_num_rows($query_ouput);
$query1 = $conn->query("INSERT INTO user VALUES ('', '$phone', '$pass', '$username', '','')");
$query_ouput1 = array('result' => 'ok');
$arr = array('result'=> 'ok');
echo json_encode($arr);
?>