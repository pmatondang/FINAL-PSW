<!DOCTYPE html>
<html>
    <head>
        <title>Paket Wisata Kelompok 5</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/login/travelword.jpg">
        <link rel="stylesheet" href="css/loreg.css">
    </head>
    <body background='img/login/gif.gif'>
    <div>
    <form action="login_proses.php" method="post">
        <table border="0" cellpadding="0" class="tab" cellspacing="0" align="center">
            <tr>
                <td style="float:left;">Username</td>
                <td colspan="3"><input name="username" value="" placeholder=" Username anda ..." required></td>
            </tr>
            <tr>
                <td style="float:left;">Password</td>
                <td colspan="3"><input type="password" name="password" placeholder=" Password" required></td>
            </tr>
            <tr>
                <td style="float:left;">Captcha</td>
                <!-- tentukan letak script generate gambar -->
                <td><img src="logincaptcha.php" alt="gambar" /> </td>
            </tr>
                <td>Isikan captcha </td>
                <td><input name="my_captcha" value="" maxlength="5" required/></td><br>
            <tr>
                <td><input id="submit" type ="submit" value="Login"></td>
                <td></td><td></td><td></td>
            </tr>
            <tr>
                <td colspan="3"><a href="registrasi.php" style="float:right;">Kamu tidak memiliki akun?? Daftarkan disini</b></a></td>
            </tr>
        </form>
        </table>
    </div>
    </body>
</html>
