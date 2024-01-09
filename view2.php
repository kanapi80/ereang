<?php
include("config.php");
$koneksi   = mysqli_connect("localhost", "root", "", "ereang");

$merk      = mysqli_query($koneksi, "SELECT NAMA FROM t_belanja group by KdPptk order by KdPptk asc");
/* Getting demo_viewer table data */
$sql = "SELECT SUM(RealisasiAnggaran) as xx FROM t_belanja 
			GROUP BY KdPptk ORDER BY KdPptk";
$viewer = mysqli_query($mysqli, $sql);
$viewer = mysqli_fetch_all($viewer, MYSQLI_ASSOC);
$viewer = json_encode(array_column($viewer, 'xx'), JSON_NUMERIC_CHECK);

/* Getting demo_click table data */
$sql = "SELECT SUM(PaguAnggaran) as count FROM t_belanja 
			GROUP BY  KdPptk ORDER BY KdPptk";
$click = mysqli_query($mysqli, $sql);
$click = mysqli_fetch_all($click, MYSQLI_ASSOC);
$click = json_encode(array_column($click, 'count'), JSON_NUMERIC_CHECK);
?>

<!DOCTYPE html>
<html>
<head>
    <title>HighChart</title>
    <link rel="stylesheet" href="./view/style.css">
    <script type="text/javascript" src="./view/js.js"></script>
    <script src="./view/chart_js.js"></script>
</head>
<body>

    <script type="text/javascript">
        $(function() {
            var data_click = <?php echo $click; ?>;
            var data_viewer = <?php echo $viewer; ?>;
            $('#container').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Realisasi Anggaran'
                },
                xAxis: {
                    categories: [<?php while ($x = mysqli_fetch_array($merk)) {
                                        echo '"' . $x['NAMA'] . '",';
                                    } ?>]
                },
                yAxis: {
                    title: {
                        text: 'Rate'
                    }
                },
                series: [{
                    name: 'P a g u',
                    data: data_click
                }, {
                    name: 'Realisasi',
                    data: data_viewer
                }]
            });
        });
    </script>


    <div class="container">
        <br />
        <h2 class="text-center">Sistem Informasi Monitoring Realisasi Anggaran </h2>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        <div id="container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>