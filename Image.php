<?php
$conn = new mysqli('localhost', 'root', '', 'db_app');

$imageProduct = array();
if($conn){
    $sql = "SELECT * FROM image";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $imageProduct[$i]['id'] = $row['id'];
            $imageProduct[$i]['link'] = $row['link'];
            $imageProduct[$i]['id_product'] = $row['id_product'];
            $i++;
        }
        $encode_data = json_encode($imageProduct, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('./API/image.json', $encode_data);
    }else{
        echo "That bai";
    }
}
?>