<?php
include('mysqlcon.php');

if (isset($_GET['save_print'])) {
     $item = $_POST['item'];
     $transaction = $_POST['transaction_id'];
     $date = $_POST['date'];
     $title = $_POST['title'];
     $amount = $_POST['amount']; 
     $phone = $_POST['phone'];
     $pay_type = $_POST['pay_type']; 

     $query = "INSERT INTO `transactions` (item_id, transaction, date, title, amount, phone, pay_type) VALUES 
     ('$item', '$transaction', '$date', '$title', '$amount', '$phone', '$pay_type')";
     $result = mysqli_query($con, $query);
     if ($result) {
         $data = 'Transaction saved successfully!';
     } else {
         $data = 'Error: '. mysqli_error($con);
     }
     echo json_encode(['status' => 'success', 'message' => $data]);
     exit;
}


if(isset($_GET['save_item_btn'])){
     $item_name = $_POST['item_item'];
     $item_price = $_POST['item_price'];
     $query = "INSERT INTO `items` (item_name, item_price) VALUES ('$item_name', '$item_price')";
     $result = mysqli_query($con, $query);
     if($result){
         $data = 'Item saved successfully!';
     } else {
         $data = 'Error: '. mysqli_error($con);
     }
     echo json_encode(['status' =>'success','message' => $data]);
     exit;
}
