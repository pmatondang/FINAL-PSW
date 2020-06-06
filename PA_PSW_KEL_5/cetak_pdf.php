<?php
    mysql_connect("localhost","root","");
    mysql_select_db("paket_psw");

    require_once __DIR__ . '/vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf();
    ob_start(); 
?>
    
<!DOCTYPE html>
<html>
    <head>
        <title>.: Admin :.</title>
    </head>
    
    <body>
        <div align="center">
        <h2 align="center"><u>Data Pesanan User</u><hr></h2><br>
        <table align="center" width="80%" border="1">
            <thead>
                <tr>
                    <th>Nomor Pesanan</th>
                    <th>Nomor Pesanan Tiket</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM pemesanan";
                    $query=mysql_query($sql) or die(mysql_error());
                        while ($data=mysql_fetch_array($query)) {
                ?> 
                <tr>
                    <td style="width:30%;height:30px;"><?=$data['id_pesanan']?></td>
                    <td style="width:30%;"><?=$data['id_tiket']?></td>
                    <td style="width:30%;"><?=$data['nama']?></td>
                    <td style="width:30%;"><?=$data['gender']?></td>
                    <td style="width:50%;"><?=$data['email']?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>

<?php
    $html = ob_get_contents(); 
    ob_end_clean();
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output();
?>
