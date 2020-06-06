<?php
        require_once 'commons/database.php';
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = LoginAccount($username,$password);
        $row  = mysqli_fetch_assoc($user);

        if($row['username'] ==  $username && $row['password'] == $password){
            $_SESSION['logged_in'] = TRUE;
            $_SESSION['id_akun'] = $row['id_akun'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            if($row['role'] == 1){
                echo "<script>alert('Selamat datang $username');
                window.location = 'dashboard_user.php'</script>";
            }
            elseif($row['role'] == 2){
                echo "<script>alert('Selamat datang $username');
                window.location = 'dasboar_admin.php'</script>";
            }
            echo "Text as entered by user : $_GET[t1] <br>";
            echo "Captcha shown : $_SESSION[my_captcha] <br>";
            if($_GET['t1'] == $_SESSION['my_captcha']){
                echo "Captcha Validation passed";
            }
            else{
                echo "Captcha Validation failed";
            }
            unset($_SESSION['my_captcha']);
        }
        else{
            echo "<script>alert('Username dan Password tidak valid.');
                window.location = 'index.php'</script>"; 
        }

        if (isset($_POST["captcha"])&&$_POST["captcha"]!= ""&&$_SESSION["code"]==$_POST["captcha"])
        {
            echo "<script>alert('Selamat datang $username');
                window.location = 'dashboard_user.php'</script>";
        }
        else{
            die ("Wrong Code Entered");
        }
    

?>