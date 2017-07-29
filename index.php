<?php
	$pageName = "Dashboard";
	include("include/dbConnection.php");
	if(isset($_SESSION["adminId"]))
	{
		header("Location:dashboard/");
	}
	
	if(isset($_POST["login"]))
	{
		$userName = isset($_POST["userName"]) ? trim($_POST["userName"]) : "";
		$password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
		
		$resultLogin = mysqli_query($connection, "SELECT * FROM `admin` WHERE `userName` = '$userName' AND `password` = '$password'");
		if(mysqli_num_rows($resultLogin) == 1)
		{
			$rowLogin = mysqli_fetch_array($resultLogin);
			$_SESSION["adminId"] = $rowLogin["adminId"];
			$_SESSION["firstName"] = $rowLogin["firstName"];
			$_SESSION["lastName"] = $rowLogin["lastName"];
			$_SESSION["profile"] = $rowLogin["profile"];
			header("Location:" . $_SERVER["PHP_SELF"]);
		}
		else
		{
			$error = "Wrong User Name or Password.";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="PhotoShare | <?php echo $pageName; ?>" />
		<meta name="keywords" content="PhotoShare | <?php echo $pageName; ?>" />
		<meta name="author" content="PhotoShare | <?php echo $pageName; ?>" />
		<link rel="shortcut icon" href="img/favicon.ico">
		<title>PhotoShare | <?php echo $pageName; ?></title>
		
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.css" rel="stylesheet" media="screen">

		<!-- Animate CSS -->
		<link href="css/animate.css" rel="stylesheet" media="screen">

		<!-- Main CSS -->
		<link href="css/main.css" rel="stylesheet" media="screen">

		<!-- Main CSS -->
		<link href="css/login.css" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="fonts/font-awesome.min.css" rel="stylesheet">

	</head>  

	<body>
		<!-- Container Fluid starts -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-push-4 col-md-4 col-sm-push-3 col-sm-6 col-sx-12">
					
					<!-- Header end -->
					<div class="login-container">
						<div class="login-wrapper animated flipInY">
							<div id="login" class="show">
								<div class="login-header">
									<h4>Photo Share Admin Panel</h4>
								</div>
								<form action="" method="post">
									<?php
									if(isset($error))
									{
									?>
									<div class="alert alert-danger no-margin">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Sorry!</strong> <?php echo $error; ?>
									</div>
									<?php
									}
									?>
									<div class="form-group has-feedback">
										<label class="control-label" for="userName">User Name</label>
										<input type="text" class="form-control" id="userName" name="userName" placeholder="User Name" value="<?php
										echo isset($_POST["userName"]) ? $_POST["userName"] : "";
										?>" required autofocus>
										<i class="fa fa-user text-info form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label class="control-label" for="passWord">Password</label>
										<input type="password" class="form-control" id="passWord" name="password" placeholder="*********" value="<?php
										echo isset($_POST["password"]) ? $_POST["password"] : "";
										?>" required >
										<i class="fa fa-key text-danger form-control-feedback"></i>
									</div>
									<input type="submit" value="Login" name="login" class="btn btn-danger btn-lg btn-block">
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Container Fluid ends -->
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>

		<script type="text/javascript">
			(function($) {
				// constants
				var SHOW_CLASS = 'show',
					HIDE_CLASS = 'hide',
					ACTIVE_CLASS = 'active';
				
				$('a').on('click', function(e){
					e.preventDefault();
					var a = $(this),
					href = a.attr('href');
				
					$('.active').removeClass(ACTIVE_CLASS);
					a.addClass(ACTIVE_CLASS);

					$('.show')
					.removeClass(SHOW_CLASS)
					.addClass(HIDE_CLASS)
					.hide();
					
					$(href)
					.removeClass(HIDE_CLASS)
					.addClass(SHOW_CLASS)
					.hide()
					.fadeIn(550);
				});
			})(jQuery);
		</script>
	</body>
</html>