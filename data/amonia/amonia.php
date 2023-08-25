<canvas id="amoniaChart" style="width: 100%;height: 300px"></canvas>

<script src="./../../plugins/jquery-3.7.0.min.js"></script>

<script>
    const cstt = document.getElementById('amoniaChart');

    new Chart(cstt, {
        type: 'line',
        data: {
            labels: [
                <?php
                include '../../koneksi.php';
                $myx = mysqli_query($coon, "SELECT * FROM amonia ORDER BY id  DESC LIMIT 4");
                while ($datas = mysqli_fetch_array($myx)) {
                    $tgl = date_create($datas['created_at']);
                    $formatted_date = date_format($tgl, 'Y-m-d H:i');
                ?>
                    <?php echo "'$formatted_date'," ?>

                <?php } ?>
            ],
            datasets: [{
                label: 'AMONIA',
                data: [
                    <?php
                    include '../../koneksi.php';
                    $my = mysqli_query($coon, "SELECT * FROM amonia ORDER BY id DESC LIMIT 4");
                    while ($data = mysqli_fetch_array($my)) {
                    ?>
                        <?php echo $data['data_amonia'] . ','; ?>
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
    setInterval(function() {
        url = 'http://localhost/Tugas_Akhir/data/amonia/amoniaApi.php';
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);


        xhr.onreadystatechange = function() {
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
                var amonia = latestEntry.field2;
                var tanggal = latestEntry.created_at;

                if (amonia != null) {

                    $.post('http://localhost/Tugas_Akhir/data/amonia/amoniaSimpan.php', {
                        amonia: amonia,
                        tanggal: tanggal
                    }, function(response) {
                        // Handle the server response (if needed)
                        console.log(response);
                    });

                }

            }
        };
        xhr.send();

    }, 3000);
</script>