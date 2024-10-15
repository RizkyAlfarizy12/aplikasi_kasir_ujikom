<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Rizky Pharmacy</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<style>
		body {
			margin: 0;
			font-family: 'Poppins', sans-serif;
			background: linear-gradient(135deg, #b0e5d5, #f5fdf8);
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

		.window {
			background-color: white;
			border-radius: 15px;
			padding: 40px;
			box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
			width: 380px;
			text-align: center;
			transition: transform 0.3s ease;
		}

		.window:hover {
			transform: scale(1.02);
		}

		.redup {
			width: 100%;
			height: 4px;
			background-color: #28a745;
			margin-bottom: 20px;
			border-radius: 15px 15px 0 0;
		}

		h1 {
			color: #28a745;
			font-weight: 600;
			margin-bottom: 25px;
		}

		.logo-container {
			display: flex;
			justify-content: center;
			align-items: center;
			margin-bottom: 30px;
		}

		.logo-container img {
			max-width: 80%;
			height: auto;
		}

		input[type="text"], input[type="password"] {
			width: 100%;
			padding: 12px 20px;
			margin: 15px 0;
			border: 1px solid #ccc;
			border-radius: 8px;
			box-sizing: border-box;
			font-size: 16px;
			background-color: #f9f9f9;
			transition: all 0.3s ease;
			position: relative;
		}

		input[type="text"]:focus, input[type="password"]:focus {
			border-color: #28a745;
			background-color: #fff;
			box-shadow: 0 0 8px rgba(40, 167, 69, 0.2);
			outline: none;
		}

		.form-icon {
			position: absolute;
			left: 10px;
			top: 50%;
			transform: translateY(-50%);
			color: #28a745;
		}

		input[type="submit"] {
			width: 100%;
			background-color: #28a745;
			color: white;
			padding: 12px;
			border: none;
			border-radius: 8px;
			font-size: 16px;
			font-weight: 600;
			cursor: pointer;
			transition: all 0.3s ease;
		}

		input[type="submit"]:hover {
			background-color: #218838;
			box-shadow: 0 8px 15px rgba(33, 136, 56, 0.2);
		}

		label {
			color: #606060;
			font-size: 14px;
			display: inline-block;
			margin-top: 10px;
			cursor: pointer;
		}

		small {
			color: #606060;
			display: block;
			margin-top: 20px;
		}

		a {
			text-decoration: none;
			color: #28a745;
			font-weight: 600;
		}

		a:hover {
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<div class="window">
		<form class="login" method="POST" action="login_proses.php">
			<div class="logo-container">
				<img src="foto.png" alt="Pharmacy Logo">
			</div>
			<h1>Login to toko obat</h1>
			<div style="position:relative;">
				<i class="fas fa-user form-icon"></i>
				<input type="text" name="username" placeholder="User Name" autocomplete="off" required style="padding-left: 35px;">
			</div>
			<div style="position:relative;">
				<i class="fas fa-lock form-icon"></i>
				<input type="password" name="password" placeholder="Password" id="myInput" required style="padding-left: 35px;">
			</div>
			<input type="checkbox" onclick="myFunction()">
			<label>Show Password</label>
			<input type="submit" name="login" value="LOGIN">
		</form>
		<small>&copy; <?= date("Y") ?> Rizky . All rights reserved.</small>
	</div>

	<script>
		function myFunction() {
			var x = document.getElementById("myInput");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
</body>
</html>
