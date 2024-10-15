<?php  
// $katasandi = "12345678";
// $passwd = stripslashes(strip_tags(htmlspecialchars($katasandi,ENT_QUOTES)));
// $password = password_hash("admin",PASSWORD_DEFAULT);
// echo $password;
// echo "<br><br>";
// echo $passwd;
// if (password_verify($katasandi, $password)) {
// 	echo "Password Benar";
// } else {
// 	echo "Password Salah";
// }
$password="1234";
$passmd5=md5($password);
$passsha1=sha1($password);
$passhash = password_hash($password,PASSWORD_DEFAULT);

echo "Password : ".$password."<br>";
echo "Pass MD5 : ".$passmd5."<br>";
echo "Pass SHA1 : ".$passsha1."<br>";
echo "Pass HASH : ".$passhash."<br>";
?>