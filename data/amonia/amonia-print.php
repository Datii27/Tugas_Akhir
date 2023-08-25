<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA AMONIA</title>
    <link href="./../../plugins/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    

    <div class="print-header d-flex flex-column align-items-center justify-content-center my-5">
        <h2>LAPORAN DATA AMONIA</h2>
        <h2>CV. SIMPONIC</h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th><center>No</center></th>
                            <th><center>DATA AMONIA</center></th>
                            <th><center>WAKTU PENGUKURAN</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include '../../koneksi.php';
                        $no = 1;
                        $myx = mysqli_query($coon, "SELECT * FROM amonia ORDER BY id  DESC LIMIT 5");
                        while($datas = mysqli_fetch_array($myx)){ 
                        $tgl = date_create($datas['created_at']);
                        $formatted_date = date_format($tgl, 'Y-m-d H:i:s');
                    ?>
                        <tr>
                            <td><center><?php echo $no++ ?></center></td>
                            <td><center><?php echo $datas['data_amonia'] ?></center></td>
                            <td><center><?php echo $formatted_date ?></center></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>