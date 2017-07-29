<?php
	include("../admin/include/dbConnection.php");
	$currentUser = mysqli_fetch_array(mysqli_query($connection, "SELECT `firstName`, `lastName` FROM `photographer` WHERE `photographerId` = '" . $_GET["photographerIdTo"] . "'"));
	mysqli_query($connection, "INSERT INTO `chat`(`photographerIdFrom`, `photographerIdTo`, `message`, `date`) VALUES('" . $_GET["photographerIdFrom"] . "', '" . $_GET["photographerIdTo"] . "', '" . $_GET["message"] . "', now())");
?>