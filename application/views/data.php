<html>
<head>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

    <style>
    #container {
        min-width: 320px;
        max-width: 600px;
        margin: 0 auto;
    } 
</style>
</head>
<body>
    
    <div id="container"></div>
    <button id="plain">Plain</button>
    <button id="inverted">Inverted</button>
    <button id="polar">Polar</button>

</body>
</html>

<script type="text/javascript">

var data_click = <?php echo $click; ?>;

var chart = Highcharts.chart('container', {

title: {
    text: 'Chart.update'
},

subtitle: {
    text: 'Plain'
},

xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
},

series: [{
    type: 'column',
    colorByPoint: true,
    data: data_click,
    showInLegend: false
}]

});


$('#plain').click(function () {
chart.update({
    chart: {
        inverted: false,
        polar: false
    },
    subtitle: {
        text: 'Plain'
    }
});
});

$('#inverted').click(function () {
chart.update({
    chart: {
        inverted: true,
        polar: false
    },
    subtitle: {
        text: 'Inverted'
    }
});
});

$('#polar').click(function () {
chart.update({
    chart: {
        inverted: false,
        polar: true
    },
    subtitle: {
        text: 'Polar'
    }
});
});

</script>
