<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONITORING KUALITAS AIR</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="./plugins/bootstrap.min.css" rel="stylesheet">
    <link href="./plugins/custom.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 4px !important;
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            display: block;
            padding: 0;
            margin: 0;
            font-size: 20px;
        }
    </style>
</head>

<body>



    <!-- As a heading -->
    <nav class="navbar bg-body-tertiary shadow">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">MONITORING </span>
        </div>
    </nav>
    <!-- #END -->

    <section class="section-content">
        <aside class="sidebar">
            <div class="sidebar-brand">
                <a href="#" class="brand">MONITORING</a>
            </div>
            <ul class="sidebar-menu">
                <li class="sidebar-header">LIST MENU</li>
                <li class="sidebar-items">
                    <a href="index.php">
                        <i class="material-icons">dashboard</i>
                        <span>DASHBOARD</span>
                    </a>
                </li>
                <li class="sidebar-items">
                  
                    <a  data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="material-icons">print</i>
                        <span>LAPORAN</span>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="collapse-menu">
                            <li>
                                <a href="?page=data/report/ph">LAPORAN DATA PH</a>
                            </li>
                            <li>
                                <a href="?page=data/report/amonia">LAPORAN DATA AMONIA</a>
                            </li>
                            <li>
                                <a href="?page=data/report/suhu">LAPORAN DATA SUHU</a>
                            </li>
                            <li>
                                <a href="?page=data/report/tds">LAPORAN DATA TDS</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </aside>
        <div class="container mt-6">
            <?php
            include 'koneksi.php';
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $file = "$page.php";

                if (!file_exists($file)) {
                    include("dashboard.php");
                } else {
                    include("$page.php");
                }
            } else {
                include("dashboard.php");
            }
            ?>

        </div>
    </section>


    <script src="./plugins/jquery-3.7.0.min.js"></script>
    <script src="./plugins/bootstrap.bundle.min.js"></script>
    <script src="./plugins/chart.js"></script>
    <script>
        setInterval(() => {

        }, 1000);

        $("#dataAmonia").load("data/amonia/amonia.php");
        $("#dataPh").load("data/ph/ph.php");
        $("#dataSuhu").load("data/suhu/suhu.php");
        $("#dataTurbidity").load("data/turbidity/turbidity.php");
    </script>
</body>

</html>