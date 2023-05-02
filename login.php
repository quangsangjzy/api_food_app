<?php
require('connect.php');

$user = array();
if($conn){
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $user[$i]['id'] = $row['id'];
            $user[$i]['phone'] = $row['phone'];
            $user[$i]['password'] = $row['password'];
            $user[$i]['name'] = $row['name'];
            $user[$i]['email'] = $row['email'];
            $i++;
        }
        echo json_encode($user, JSON_PRETTY_PRINT);
    }else{
        echo "That bai";
    }
}
?>