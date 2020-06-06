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
        <h2 align="center"><u>Data Tiket</u><hr></h2><br>
        <table align="center" width="80%" border="1">
            <thead>
                <tr>
                    <th>Nomor Tiket</th>
                    <th>Nama Paket</th>
                    <th>Gambar</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Jadwal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM tiket";
                    $query=mysql_query($sql) or die(mysql_error());
                        while ($data=mysql_fetch_array($query)) {
                ?> 
                <tr>
                    <td style="width:30%;height:30px;" align="center"><?=$data['id_tiket']?></td>
                    <td style="width:30%;" align="center"><?=$data['nama_paket']?></td>
                    <td style="width:60%;"><center><img src="<?php echo 'img2/'.$data['gambar']?>" style='width:280px;height:130px'></center></td>
                    <td style="width:30%;" align="center"><?=$data['stok']?></td>
                    <td style="width:50%;" align="center"><?=$data['harga']?></td>
                    <td style="width:50%;" align="center"><?=$data['jadwal']?> sampai <?=$data['jadwal2']?> </td>
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
