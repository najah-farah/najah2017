<?php
include("admin/include/dbConnection.php");

//Get payment information from PayPal
$item_number = isset($_GET['item_number']) ? $_GET['item_number'] : ""; 
$txn_id = isset($_GET['tx']) ? $_GET['tx'] : "";
$payment_gross = isset($_GET['amt']) ? $_GET['amt'] : "";
$currency_code = isset($_GET['cc']) ? $_GET['cc'] : "";
$payment_status = isset($_GET['st']) ? $_GET['st'] : "";
$photographerId = isset($_SESSION["photographerId"]) ? $_SESSION["photographerId"] : "";

//Get product price from database
$productResult = mysqli_query($connection, "SELECT `price` FROM `photos` WHERE `photosId` = '".$item_number."'");
$productRow = mysqli_fetch_array($productResult);
$productPrice = $productRow['price'];

if(!empty($txn_id) && $payment_gross == $productPrice){
    //Check if payment data exists with the same TXN ID.
    $prevPaymentResult = mysqli_query($connection, "SELECT `paymentsId` FROM payments WHERE `txn_id` = '".$txn_id."'");

    if(mysqli_num_rows($prevPaymentResult)> 0){
        $paymentRow = mysqli_fetch_array($prevPaymentResult);
        $last_insert_id = $paymentRow['paymentsId'];
    }else{
        //Insert tansaction data into the database
        $insert = mysqli_query($connection, "INSERT INTO payments(photographerId,photosId,txn_id,payment_gross,currency_code,payment_status) VALUES('".$photographerId."','".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')");
		$row_last_id = mysqli_fetch_array(mysqli_query($connection, "SELECT `paymentsId` FROM `payments` ORDER BY `paymentsId` DESC LIMIT 1"));
        $last_insert_id = $row_last_id["paymentsId"];
    }
?>
    <h1>Your payment has been successful.</h1>
    <h1>Your Payment ID - <?php echo $last_insert_id; ?></h1>
<?php }else{ ?>
    <h1>Your payment has failed.</h1>
<?php } ?>