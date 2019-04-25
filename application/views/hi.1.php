<!DOCTYPE html>
<html>
<head>
	<title>HighChart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>

    <style>
#container {
	min-width: 320px;
	max-width: 600px;
	margin: 0 auto;
} 
</style>

</head>
<body>
  
<script type="text/javascript">
  
$(function () { 
  
    var data_click = <?php echo $click; ?>;

  
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Perceraian Tahun 2019'
        },
        xAxis: {
            categories: ['Januari','Februari','Maret', 'April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
        },
        yAxis: {
            title: {
                text: 'Jumlah Perkara'
            }
        },
        series: [{
            name: 'Data Perbulan',
            data: data_click
        }]
    });
});
  
</script>
  
<div class="container">
	<br/>
	<h2 class="text-center">Tabel Data</h2>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tabel Grafik Data Perceraian</div>
                <div class="panel-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
  
</body>
</html>