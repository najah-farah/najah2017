<?php
	include("admin/include/dbConnection.php");
	mysqli_query($connection, "UPDATE `photographer` SET `login` = 'NO' WHERE `photographerId` = '" . $_SESSION["photographerId"] . "'");
	unset($_SESSION["photographerId"]);
	header("Location:index.php");
?>