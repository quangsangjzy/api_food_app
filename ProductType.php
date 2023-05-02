<?php
$conn = new mysqli('localhost', 'root', '', 'db_app');

$productType = array();
if($conn){
    $sql = "SELECT * FROM product_type";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $productType[$i]['id'] = $row['id'];
            $productType[$i]['name'] = $row['name'];
            $productType[$i]['image'] = $row['image'];
            $i++;
        }
        $encode_data = json_encode($productType, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        echo $encode_data;
        file_put_contents('./API/productType.json', $encode_data);
    }else{
        echo "That bai";
    }
}
?>