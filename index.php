<?php
	$pageName = "Home";
	include("admin/include/dbConnection.php");
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<title>PhotoShare | <?php echo $pageName; ?></title>
	<meta name="description" content="PhotoShare | <?php echo $pageName; ?>" />
	<meta name="keywords" content="PhotoShare | <?php echo $pageName; ?>" />
	<meta name="author" content="PhotoShare | <?php echo $pageName; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="css/base.css"/>
	<link rel="stylesheet" href="css/skeleton.css"/>
	<link rel="stylesheet" href="css/layout.css"/>
	<link rel="stylesheet" href="css/font-awesome.css" />
	<link rel="stylesheet" href="css/ionicons.min.css"/>
	<link rel="stylesheet" href="css/retina.css"/>
	
	<link rel="shortcut icon" href="admin/img/favicon.ico">
	
	<script type="text/javascript" src="js/modernizr.custom.js"></script>
	<?php
	if(isset($_SESSION["photographerId"]))
	{
	?>
	<style type="text/css">
		.chat_box{
			position:fixed;
			right:20px;
			bottom:0px;
			width:250px;
			z-index:9999;
		}
		.chat_body{
			background:white;
			height:400px;
			padding:5px 0px;
		}

		.chat_head,.msg_head{
			background:#f39c12;
			color:white;
			padding:15px;
			font-weight:bold;
			cursor:pointer;
			border-radius:5px 5px 0px 0px;
		}

		.msg_box{
			position:fixed;
			bottom:-5px;
			width:250px;
			background:white;
			border-radius:5px 5px 0px 0px;
			z-index:9999;
		}

		.msg_head{
			background:#3498db;
		}

		.msg_body{
			background:white;
			height:200px;
			font-size:12px;
			padding:15px;
			overflow:auto;
			overflow-x: hidden;
		}
		.msg_input{
			width:100%;
			border: 1px solid white;
			border-top:1px solid #DDDDDD;
			-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
			-moz-box-sizing: border-box;    /* Firefox, other Gecko */
			box-sizing: border-box;  
		}

		.close{
			float:right;
			cursor:pointer;
		}
		.minimize{
			float:right;
			cursor:pointer;
			padding-right:5px;
			
		}

		.useronline{
			position:relative;
			padding:10px 30px;
		}
		.useronline:hover{
			background:#f8f8f8;
			cursor:pointer;

		}
		.useronline:before{
			content:'';
			position:absolute;
			background:#2ecc71;
			height:10px;
			width:10px;
			left:10px;
			top:15px;
			border-radius:6px;
		}
		
		.useroffline{
			position:relative;
			padding:10px 30px;
		}
		.useroffline:hover{
			background:#f8f8f8;
			cursor:pointer;

		}
		.useroffline:before{
			content:'';
			position:absolute;
			background:#f34e4e;
			height:10px;
			width:10px;
			left:10px;
			top:15px;
			border-radius:6px;
		}

		.msg_a{
			position:relative;
			background:#FDE4CE;
			padding:10px;
			min-height:10px;
			margin-bottom:5px;
			margin-right:10px;
			border-radius:5px;
		}
		.msg_a:before{
			content:"";
			position:absolute;
			width:0px;
			height:0px;
			border: 10px solid;
			border-color: transparent #FDE4CE transparent transparent;
			left:-20px;
			top:7px;
		}


		.msg_b{
			background:#EEF2E7;
			padding:10px;
			min-height:15px;
			margin-bottom:5px;
			position:relative;
			margin-left:10px;
			border-radius:5px;
			word-wrap: break-word;
		}
		.msg_b:after{
			content:"";
			position:absolute;
			width:0px;
			height:0px;
			border: 10px solid;
			border-color: transparent transparent transparent #EEF2E7;
			right:-20px;
			top:7px;
		}
	</style>
	<?php
	}
	?>
	
</head>
<body class="royal_preloader">	
	
	<div id="royal_preloader"></div>
	<?php
	if(isset($_SESSION["photographerId"]))
	{
	?>
	<div class="chat_box">
		<div class="chat_head"> Chat Box</div>
		<div class="chat_body">
		<?php
		$chatResult = mysqli_query($connection, "SELECT * FROM `photographer` WHERE `status` = 'ON' AND `photographerId` != '" . $_SESSION["photographerId"] . "' ORDER BY `loginTime` DESC");
		while($chatRow = mysqli_fetch_array($chatResult))
		{
		?>
			<div chat-from="<?php echo $_SESSION["photographerId"]; ?>" chat-to="<?php echo $chatRow["photographerId"]; ?>" class="<?php echo $chatRow["login"] == "YES" ? "useronline" : "useroffline"; ?>"> <?php echo $chatRow["firstName"] . " " . $chatRow["lastName"]; ?> </div>
		<?php
		}
		?>
		</div>
	</div>
	<span id="spanUserChat">
	</span>
	<input type="hidden" id="totalMessage" value="<?php echo mysqli_num_rows(mysqli_query($connection, "SELECT `chatId` FROM `chat` WHERE `photographerIdTo` = '" . $_SESSION["photographerId"] . "'")); ?>" />
	<?php
	}
	?>
	<svg class="hidden">
		<symbol id="shape" viewBox="0 0 200 100">
			<title>shape</title>
			<path d="M 6.144,74.1 C 20.4,107.4 70.13,94.33 94.22,95.74 121.3,97.41 130.8,101.1 154.7,99.38 178.6,97.72 201.9,78.95 199.4,46.86 197.1,14.96 174.9,4.781 161.4,1.827 147.9,-1.128 119.8,8.284 105.6,8.766 85.34,9.449 81.91,7.628 51.08,2.334 17.26,-3.482 -8.105,40.84 6.144,74.1 Z" />
		</symbol>
	</svg>

		<nav id="menu-wrap" class="menu-back cbp-af-header">
			<div class="menu">
				<a href="index.php" ><div class="logo"></div></a>
				<ul>
					<li>
						<a class="shadow-hover <?php echo $pageName == "Home" ? "curent-shadow" : ""; ?>" href="index.php">Home</a>
					</li>
					<li>
						<a class="shadow-hover <?php echo $pageName == "Photos" ? "curent-shadow" : ""; ?>" href="#" >Photos</a>
						<ul>
						<?php
						$resultMenu = mysqli_query($connection, "SELECT `photographerId`, `firstName`, `lastName` FROM `photographer` WHERE `status` = 'ON' ORDER BY `firstName`, `lastName`");
						while($rowMenu = mysqli_fetch_array($resultMenu))
						{
						?>
							<li><a class="<?php echo isset($_GET["pgid"]) ? ($_GET["pgid"] == $rowMenu["photographerId"] ? "curent-multi-page" : "") : ""; ?>" href="photos.php?pgid=<?php echo $rowMenu["photographerId"]; ?>"><?php echo $rowMenu["firstName"] . " " . $rowMenu["lastName"]; ?></a></li>
						<?php
						}
						?>
						</ul>
					</li>
					<?php
					if(isset($_SESSION["photographerId"]))
					{
						$rowCurrent = mysqli_fetch_array(mysqli_query($connection, "SELECT `firstName`, `lastName` FROM `photographer` WHERE `photographerId` = '" . $_SESSION["photographerId"] . "'"));
					?>
					<li>
						<a style="color: #f39c12; text-shadow: 0px 0px 1px #FFF;" class="shadow-hover <?php echo $pageName == "My Photo's" ? "curent-shadow" : ""; ?>" href="myphotos.php"><?php
						echo $rowCurrent["firstName"] . " " . $rowCurrent["lastName"] . " (My Photo's)";
						?></a>
					</li>
					<li>
						<a style="color: #f39c12; text-shadow: 0px 0px 1px #FFF;" class="shadow-hover" href="logout.php">Logout</a>
					</li>
					<?php
					}
					else
					{
					?>
					<li>
						<a class="shadow-hover <?php echo $pageName == "Login" ? "curent-shadow" : ""; ?>" href="login.php">Login</a>
					</li>
					<li>
						<a class="shadow-hover <?php echo $pageName == "Register" ? "curent-shadow" : ""; ?>" href="register.php">Register</a>
					</li>
					<?php
					}
					?>
					<li>
						<a class="shadow-hover <?php echo $pageName == "Search" ? "curent-shadow" : ""; ?>" href="search.php">Search</a>
					</li>
				</ul>
			</div>
		</nav>

	<div class="section-block full-height background-color-blue">
		<div class="home-text fade-elements">
			<div class="container">
				<div class="twelve columns">
					<h1 class="cd-headline letters type">It's <span class="cross-out">not</span> your <span class="cross-out">average</span><br>Photo 
						<span class="cd-words-wrapper waiting">
							<b class="is-visible">grapher</b>
							<b>grapher</b>
						</span>
					</h1>
				</div>
			</div>
		</div>
						
		<div class="home-link fade-elements">
			<div class="container">
				<div class="twelve columns">
					<a href="#top-scroll" data-gal="m_PageScroll2id" data-ps2id-offset="78"><div class="link-down tipped" data-title="scroll down"  data-tipper-options='{"direction":"top","follow":"true","margin":25}'></div></a>	
				</div>
			</div>						
		</div>
	</div>
		
	<div class="section-block background-color-blue" id="top-scroll">
		<div class="morph-wrap">
			<svg class="morph" width="1400" height="770" viewBox="0 0 1400 770">
				<path d="M 262.9,252.2 C 210.1,338.2 212.6,487.6 288.8,553.9 372.2,626.5 511.2,517.8 620.3,536.3 750.6,558.4 860.3,723 987.3,686.5 1089,657.3 1168,534.7 1173,429.2 1178,313.7 1096,189.1 995.1,130.7 852.1,47.07 658.8,78.95 498.1,119.2 410.7,141.1 322.6,154.8 262.9,252.2 Z"/>
			</svg>
		</div>
		<?php
		$result = mysqli_query($connection, "SELECT * FROM `photographer` WHERE `status` = 'ON' ORDER BY `firstName`, `lastName`");
		while($row = mysqli_fetch_array($result))
		{
		?>
		<div class="content-wrap padding-top-bottom content--layout-1">
			<div class="content content--layout" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
				<div class="content__mask"></div>
				<img class="content__img" src="images/photographer/<?php echo $row["profile"]; ?>" alt="Some image" />
				<h3 class="content__title"><?php echo $row["firstName"] . " " . $row["lastName"]; ?></h3>
				<a href="photos.php?pgid=<?php echo $row["photographerId"]; ?>" class="content__link"><svg class="decoshape" width="100%" height="100%" preserveAspectRatio="none"><use xlink:href="#shape"></use></svg><div class="chaffle" data-lang="en">Discover</div></a>
			</div>
		</div>
		<?php
		}
		?>
		<div class="section-block padding-top-bottom content--layout-5">
			<div class="container footer">
				<div class="one-fifth column" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
					<p>Photo Share</p>
					<p>-----------</p>
				</div>
				<div class="one-fifth column" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
					<p>Address</p>
					<p>Country</p>
				</div>
				<div class="one-fifth column mail-phone" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
					<a href="tel:1234567890"><p class="chaffle" data-lang="en">1234567890</p></a>
					<a href="mailto:email@domain.com"><p class="chaffle" data-lang="en">email@domain.com</p></a>
				</div>
				<div class="two-fifths column" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
					<div class="social-footer">
						<ul class="list-social-footer">
							<li class="icon-footer tipped" data-title="Twitter"  data-tipper-options='{"direction":"top","follow":"true","margin":25}'>
								<a href="#"><span class="fa-twitter"></span></a>
							</li>
							<li class="icon-footer tipped" data-title="Github"  data-tipper-options='{"direction":"top","follow":"true","margin":25}'>
								<a href="#"><span class="fa-github"></span></a>
							</li>
							<li class="icon-footer tipped" data-title="Pinterest"  data-tipper-options='{"direction":"top","follow":"true","margin":25}'>
								<a href="#"><span class="fa-pinterest"></span></a>
							</li>
							<li class="icon-footer tipped" data-title="Facebook"  data-tipper-options='{"direction":"top","follow":"true","margin":25}'>
								<a href="#"><span class="fa-facebook"></span></a>
							</li>
						</ul>	
					</div>
				</div>
			</div>	
		</div>
		<div class="content--related"></div>
	</div>

	<script type="text/javascript" src="js/jquery-2.1.1.js"></script>	
	<script type="text/javascript" src="js/royal_preloader.min.js"></script>
	<script type="text/javascript" src="js/retina.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.js"></script>	
	<script type="text/javascript" src="js/header-anime.js"></script>
	<script type="text/javascript" src="js/tipper.js"></script>
	<script type="text/javascript" src="js/letters.js"></script> 
	<script type="text/javascript" src="js/scrolltoid.js"></script> 
	<script type="text/javascript" src="js/scrollReveal.js"></script>
	<script type="text/javascript" src="js/jquery.chaffle.min.js"></script>
	<script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
	<script type="text/javascript" src="js/anime.min.js"></script>
	<script type="text/javascript" src="js/scrollMonitor.js"></script>
	<script type="text/javascript" src="js/animation-home-1.js"></script> 

	<script type="text/javascript" src="js/custom-home-1.js"></script> 
	<?php
	if(isset($_SESSION["photographerId"]))
	{
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on("click", ".chat_head", function(){
				$('.chat_body').slideToggle('slow');
			});
			$(document).on("click", ".msg_head", function(){
				$('.msg_wrap').slideToggle('slow');
			});
			$(document).on("click", ".close", function(){
				$('.msg_box').hide();
			});
			$(document).on("click", ".useronline,.useroffline", function(){
				loadChat($(this).attr("chat-from"),$(this).attr("chat-to"));
			});
			$(document).on("keypress", "textarea", function(e){
				if (e.keyCode == 13) {
					e.preventDefault();
					var msg = $(this).val();
					$(this).val("");
					if(msg != "")
					{
						$.ajax({
							url: "ajax/saveuserchat.php",
							type: "get",
							data:{
								"photographerIdFrom":<?php echo $_SESSION["photographerId"]; ?>,
								"photographerIdTo":$("#chat-with").val(),
								"message":msg
							},
							success: function (data){
								loadChat(<?php echo $_SESSION["photographerId"]; ?>,$("#chat-with").val());
								$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
							}
						});
					}
				}
			});
			
		});
		function loadChat(from,to)
		{
			$.ajax({
				url: "ajax/selectuserchat.php",
				type: "get",
				data:{
					"photographerIdFrom":from,
					"photographerIdTo":to
				},
				success: function (data){
					$("#spanUserChat").html(data);
					$('.msg_wrap').show();
					$('.msg_box').show();
				}
			});
		}
		function checkNewMessage()
		{
			$.ajax({
					url: "ajax/checkmessage.php",
					type: "get",
					data:{
						"photographerIdTo":<?php echo $_SESSION["photographerId"]; ?>
					},
					success: function (data){
						var jsonData = JSON.parse(data);
						if(jsonData[0] != $("#totalMessage").val())
						{
							$("#totalMessage").val(jsonData[0]);
							loadChat(<?php echo $_SESSION["photographerId"]; ?>,jsonData[1]);
						}
					}
				});
		}
		setInterval("checkNewMessage()",1000);
	</script>
	<?php
	}
	?>
</body>
</html>