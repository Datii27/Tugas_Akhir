<div class="row">
    <div class="col-md-12">
        <div class="card mt-3">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h2 class="card-title">LAPORAN DATA TDS</h2>
                <a href="data/report/printTds.php" target="_blank" class="btn btn-success">
                    <i class="material-icons">print</i>
                </a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th><center>No</center></th>
                            <th><center>DATA TDS</center></th>
                            <th><center>WAKTU PENGUKURAN</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                        $no = 1;
                        $myx = mysqli_query($coon, "SELECT * FROM turbidity ORDER BY id  DESC");
                        while($datas = mysqli_fetch_array($myx)){ 
                        $tgl = date_create($datas['created_at']);
                        $formatted_date = date_format($tgl, 'Y-m-d H:i:s');
                    ?>
                        <tr>
                            <td><center><?php echo $no++ ?></center></td>
                            <td><center><?php echo $datas['data_turbidity'] ?></center></td>
                            <td><center><?php echo $formatted_date ?></center></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>