<canvas id="turbidityChart" style="width: 100%;height: 300px"></canvas>


<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>
    const turCh = document.getElementById('turbidityChart');
        
    new Chart(turCh, {
        type: 'line',
        data: {
            labels: [
                <?php
                    include '../../koneksi.php';
                    $myx = mysqli_query($coon, "SELECT * FROM turbidity ORDER BY id DESC LIMIT 4");
                    while($datas    =mysqli_fetch_array($myx)){ 
                    $tgl = date_create($datas['created_at']);
                    $formatted_date = date_format($tgl, 'Y-m-d H:i');
                ?>
                    <?php echo "'$formatted_date'," ?>
               
                <?php } ?>
            ],
            datasets: [{
                label: 'DATA TDS',
                data: [
                    <?php
                            include '../../koneksi.php';
                            $my = mysqli_query($coon, "SELECT * FROM turbidity ORDER BY id DESC LIMIT 4");
                            while($data = mysqli_fetch_array($my)){ 
                        ?>
                    <?php echo $data['data_turbidity'].','; ?>
                    <?php } ?>
                ],
                borderWidth: 3,
                tension: 0.5,
                borderColor: '#22c55e',
            }]
        },

    });
    
</script>

<script>
    setInterval(function () {
        url = 'http://localhost/Tugas_Akhir/data/turbidity/turbidityApi.php';
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);


        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                const dataParse = JSON.parse(data);
                const newData = dataParse.feeds;
                
                function findLatestEntry(newData) {
                let latestEntry = newData[0];

                for (const entry of newData) {
                    if (entry.created_at > latestEntry.created_at) {
                    latestEntry = entry;
                    }
                }

                return latestEntry;
                }

                // Find the latest entry
                const latestEntry = findLatestEntry(newData);

                var id = latestEntry.entry_id;
                var turbidity = latestEntry.field3;
                var tanggal = latestEntry.created_at;

                if (turbidity != null) {
                    console.log(turbidity);
                    $.post('http://localhost/Tugas_Akhir/data/turbidity/turbiditySimpan.php', { turbidity: turbidity, tanggal: tanggal }, function(response) {
                    // Handle the server response (if needed)
                        console.log(response);
                    });
                    
                } 
            
            }
        };
        xhr.send();
    
    }, 3000);
   
</script>
