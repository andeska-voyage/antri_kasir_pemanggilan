<?php
//set time zone location sesuai negara, jadikan Asia Jakarta
date_default_timezone_set('Asia/Jakarta');

//**************************start koneksi ***************************//

//set koneksi ke server sesuai host, user, password dan database
$server="103.125.49.34";
$user="sik_sept2026";
$pass="NzmJpnTxaamSmXi7";
$database="sik_sept2026";

//koneksikan ke server
$conect=mysqli_connect($server,$user,$pass,$database) or die('Error Connection Network');

// **************************end koneksi *********************************//

//*********************pengaturan lainnya*****************************//

//buat parameter untuk mempercepat penulisan url misal https://www.develindo.com atau http://localhost/folderwebanda

$hostname="http://localhost:8080/phpmyadmin/index.php?route=/database/structure&db=sik_13feb24";

?>
