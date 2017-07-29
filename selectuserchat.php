<?php
	include("../admin/include/dbConnection.php");
	$currentUser = mysqli_fetch_array(mysqli_query($connection, "SELECT `firstName`, `lastName` FROM `photographer` WHERE `photographerId` = '" . $_GET["photographerIdTo"] . "'"));
?>
	<div class="msg_box" style="right:290px">
		<div class="msg_head">
			<?php echo $currentUser["firstName"] . " " . $currentUser["lastName"]; ?><div class="close">x</div>
            <input type="hidden" id="chat-with" value="<?php echo $_GET["photographerIdTo"]; ?>" />
        </div>
		<div class="msg_wrap">
			<div class="msg_body">
            <?php
			$chatResult = mysqli_query($connection ,"SELECT * FROM `chat` WHERE `photographerIdFrom` IN ('" . $_GET["photographerIdFrom"] . "', '" . $_GET["photographerIdTo"] . "') AND `photographerIdTo` IN ('" . $_GET["photographerIdFrom"] . "', '" . $_GET["photographerIdTo"] . "') ORDER BY `date` ASC");
			while($chatRow = mysqli_fetch_array($chatResult))
			{
			?>
				<div class="<?php
                echo $_SESSION["photographerId"] == $chatRow["photographerIdFrom"]  ? "msg_b" : "msg_a";
				?>"><?php echo $chatRow["message"]; ?></div>
				<div class="msg_push"></div>
			<?php
			}
			?>
            </div>
			<div class="msg_footer"><textarea class="msg_input" rows="4"></textarea></div>
		</div>
	</div>