<!DOCTYPE html>
<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name){
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}
?>



<html>
<head>
	<title>Welcome to Stopify!</title>


	<link rel="stylesheet" type="text/css" href="assets/css/register.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php 

	if(isset($_POST['registerButton'])){
		echo '<script>
				$(document).ready(function(){
					console.log("registerButton was pressed");
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function(){
					console.log("loginButton was pressed");
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';

	}

	?>
	<script>
		$(document).ready(function(){
			
			$("#loginForm").show();
			$("#registerForm").hide();
		});
	</script>

	<div id="background">

		<div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username:</label>
						<input id="loginUsername"  type="text" name="loginUsername" placeholder="e.g. BartSimpson" value="<?php getInputvalue('loginUsername') ?>" required>

					</p>
					<p>
						<label for="loginPassword">Password:</label>
						<input id="loginPassword"  type="password" name="loginPassword" placeholder="Your Password" required>

					</p>
					
					<button type = "submit" name="loginButton">Log in</button>

					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account yet? Sign up here.</span>
					</div>

				</form>


				<form id="registerForm" action="register.php" method="POST">
					<h2>Create your free account</h2>
					<p>
						<?php echo $account->getError(Constants::$userNameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Username:</label>
						<input id="username"  type="text" name="username" placeholder="e.g. bartSimpson" value="<?php getInputValue('username') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">First name:</label>
						<input id="firstName"  type="text" name="firstName" placeholder="e.g. Bart" value="<?php getInputValue('firstName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="lastName">Last Name:</label>
						<input id="lastName"  type="text" name="lastName" placeholder="e.g. Simpson" value="<?php getInputValue('lastName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email:</label>
						<input id="email"  type="email" name="email" placeholder="e.g. bart.Simpson@gmail.com" value="<?php getInputValue('email') ?>" required>
					</p>

					<p>
						<label for="email2">Confirm Email:</label>
						<input id="email2"  type="email" name="email2" placeholder="e.g. bart.Simpson@gmail" value="<?php getInputValue('email2') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">Password:</label>
						<input id="password"  type="password" name="password" placeholder="Your Password" required>
					</p>

					<p>
						<label for="password2">Confirm password:</label>
						<input id="password2"  type="password" name="password2" placeholder="Confirm Password" required>
					</p>
					
					<button type = "submit" name="registerButton">Sign up</button>

					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Log in here.</span>
					</div>

				</form>
			</div>
			<div id="loginText">
				<h1>Get that good music, asap!</h1>
				<h2>Listen to that new new for free!</h2>
				<ul>
					<li>Find that music that really gets you going</li>
					<li>Get that hype playlist ready for any and everything</li>
					<li>Follow your favorite artist for their new drops</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>