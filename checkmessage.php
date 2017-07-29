<?php
	include("../admin/include/dbConnection.php");
	$row = mysqli_fetch_array(mysqli_query($connection, "SELECT `photographerIdFrom` FROM `chat` WHERE `photographerIdTo` = '" . $_SESSION["photographerId"] . "' ORDER BY `date` DESC LIMIT 1"));
	echo json_encode(array(mysqli_num_rows(mysqli_query($connection, "SELECT `chatId` FROM `chat` WHERE `photographerIdTo` = '" . $_SESSION["photographerId"] . "'")), $row[0]));
?>