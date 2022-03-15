<?php 
// Initialize variables to null.
$nameError ="";
$emailError ="";
$contactError ="";

//On submitting form below function will execute

if(isset($_POST['submit'])){
	if (empty($_POST["name"])) {
		$nameError = " * Name is required";
	} else {
		$name = test_input($_POST["name"]);
// check name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$nameError = " * Only letters and white space allowed"; 
		}
	}

	if (empty($_POST["email"])) {
		$emailError = " * Email is required";
	} else {
		$email = test_input($_POST["email"]);
// check if e-mail address syntax is valid or not
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
			$emailError = " * Invalid email format";
		}
	}

	if (empty($_POST["contact"])) {
		$contactError = " * Contact Number Is Required";
	} else {
		$contact = test_input($_POST["contact"]);		
	// check if Contact Number syntax is valid or not
		if (!preg_match_all("/^(\+|\d)[0-9]{7,13}$/",$contact)) {
			$contactError = " *  Use Country Code (+91xxxxxxxxxx)"; 
		}
	}
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}	
?>

<html>
<head>
	<title>PHP - Form Validation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="./style.css">

</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 lg-bg"></div>
			<div class="col-xs-6 col-md-4 form">
				<div class="logo-area text-center"><img src="http://geekstrick.com/wp-content/uploads/2017/06/geeks-trick-1.png"/>
				</div>
			</br>
			<form name="form1" class="" method="POST" action="index.php">
				<div class="form-group">
					<label for="exampleInputName1">Name</label><span class="error">  <?php echo $nameError;?></span>
					<input type="name" class="form-control" id="exampleInputName1" name="name" value="" placeholder="Username">
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Email</label><span class="error">  <?php echo $emailError;?></span>
					<input type="email" class="form-control" id="exampleInputEmail1" name="email" value="" placeholder="Email">
				</div>

				<div class="form-group">
					<label for="exampleInputContact1">Contact <span class="span"> (+91xxxxxxxxxx)</span></label><span class="error">  <?php echo $contactError;?></span>
					<input type="number" class="form-control" id="exampleInputcontact1" name="contact" value="" placeholder="Contact No">
				</div>
				<button name="submit" value="Submit" type="submit" class="btn btn-success">Sign Up</button>
				<br><hr>
				<div class="span">
					<span>Welcome : <?php echo $_POST["name"]; ?> 
						<span class="error">  <?php echo $nameError;?></span>
					</span>
					<br>
					<span>Your email address is: <?php echo $_POST["email"]; ?>
						<span class="error">  <?php echo $emailError;?></span>
					</span>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>