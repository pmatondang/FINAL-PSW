<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registrasi</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/login/travelword.jpg">
        <link rel="stylesheet" href="css/loreg.css">
    </head>
    <body background='img/login/reg.png' class="bg">
        <!-- Membuat Form Registrasi -->
        <table border="0" cellpadding="0" cellspacing="0" align="center" class="tabb">
        <form action="registrasi_proses.php" method="POST" id="captcha_code">
            <tr>
                <td style="float:left;color:"><b>Nama</b></td>
                <td colspan="2"><input type="text" name="nama" placeholder=" Isi nama anda..." required></td>
            </tr>
            <tr>
                <td style="float:left;"><b>Email</b></td>
                <td colspan="2"><input type="email" name="email" placeholder=" Isi email anda ..." required></td>
            </tr>
            <tr>
                 <td style="float:left;"><b>Username</b></td>
                 <td colspan="2"><input type="text" name="username" placeholder=" Username" required></td>
            </tr>
            <tr>
                 <td style="float:left;"><b>Password</b></td>
                 <td colspan="2"><input type="password" name="password" placeholder=" Password" required></td>
            <tr>
                <td style="float:left;"><b>Repassword</b></td>
                <td colspan="2"><input type="password" name="repassword" placeholder=" Konfirmasi password" required></td>
            </tr>
            <tr>
                <td style="float:left;"><b>Captcha</b></td>
                <!-- tentukan letak script generate gambar -->
                <td><center><img src = "Registrasicaptcha.php"/></center></td>
            </tr>
                <td style="float:left;"><b>Masukkan captcha</b></td>
                <td ><input name = "captcha" type = "text" required></td></td>
            <tr>
                <td><input style="color:black" id="submit" type ="submit" name="register" id="register" value="Daftar"></td>
                <td></td>
                <td><a href="index.php">Kembali ke index</a></td>
            </tr>
        </form>
        </table>
    </body>
</html>