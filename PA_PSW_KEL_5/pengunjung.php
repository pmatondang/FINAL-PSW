<?php
    //koneksi ke database
    $conn = new mysqli("localhost", "root", "", "paket_psw");
    if ($conn->connect_errno) {
        echo die("Failed to connect to MySQL: " . $conn->connect_error);
    }
    
    $rows = array();
    $table = array();
    $table['cols'] = array(
        //membuat label untuk nama nya, tipe string
        array('label' => 'Tempat Wisata', 'type' => 'string'),
        //membuat label untuk jumlah siswa, tipe harus number untuk kalkulasi persentasenya
        array('label' => 'Jumlah pengunjung', 'type' => 'number')
    );
    
    //melakukan query ke database select
    $sql = $conn->query("SELECT * FROM pengunjung");
    //perulangan untuk menampilkan data dari database
    while($data = $sql->fetch_assoc()){
        //membuat array
        $temp = array();
        //memasukkan data pertama yaitu nama kelasnya
        $temp[] = array('v' => (string)$data['nama_paket']);
        //memasukkan data kedua yaitu jumlah siswanya
        $temp[] = array('v' => (int)$data['jumlah']);
        //memasukkan data diatas ke dalam array $rows
        $rows[] = array('c' => $temp);
    }
    
    //memasukkan array $rows dalam variabel $table
    $table['rows'] = $rows;
    //mengeluarkan data dengan json_encode. silahkan di echo kalau ingin menampilkan data nya
    $jsonTable = json_encode($table);
    
?>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="img/login/travelword.jpg">
        <title>Diagram Pengunjung</title>
        <script type="text/javascript">
    
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
    
        function drawChart() {
    
            // membuat data chart dari json yang sudah ada di atas
            var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);
    
            // Set options, bisa anda rubah
            var options = {'title':'Data Pengunjung Tempat Wisata'};
    
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        </script>
        <style>
            .a{
                width: 100%;
                height: 90%;
                color: solid;
            }
        </style>
    </head>
    <body style="background-color:lightblue;">
        
        <!--Div yang akan menampilkan chart-->
        <div id="chart_div" class="a"></div><br>
        <div>
            <a href="dashboard_user.php"><button style="height:50px;float:right;margin-right:20px;background-color:silver;cursor:pointer;font-size:20px;">
            <b>Kembali</b></button></a>
        </div>
    </body>
</html>