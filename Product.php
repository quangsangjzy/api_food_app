<?php
$conn = new mysqli('localhost', 'root', '', 'db_app');

$product = array();
if($conn){
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $product[$i]['id'] = $row['id'];
            $product[$i]['name'] = $row['name'];
            $product[$i]['id_type'] = $row['id_type'];
            $product[$i]['price'] = $row['price'];
            $i++;
        }
        $encode_data = json_encode($product, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('./API/product.json', $encode_data);
    }else{
        echo "That bai";
    }
}
?>