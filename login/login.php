<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="backimg">
<div class="redup"></div>
<div class="window">
<form class="login" method="POST" action="login_proses.php">
	<h1>LOGIN USER</h1>
	<input type="text" name="username" placeholder="User Name" autocomplete="off">
	<input type="password" name="password" placeholder="Password" id="myInput">
	<input type="checkbox" onclick="myFunction()"> <label style="color:#808080;">Show Password</label>
	<input type="submit" name="login" value="LOGIN">
</form>
<br>
<small>Copyright &copy <?= date("Y") ?> By.</small> <a href="">siswa</a>
</div>

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