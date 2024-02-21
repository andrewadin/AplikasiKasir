<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center><h1> Test Chart </h1></center>
    <div class="container">

    </div>
</body>
</html>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('newchart',{
        title : {
            text : 'Penjualan di tahun 2023'
        },
        subtitle : {
            text : 'Hasil Penjualan di tahun 2023'
        },
        xAxis : {
            categories : ['Minggu 1','Minggu 2','Minggu 3',"Minggu 4"]
        },
        yAxis : {
            title : {
                text: 'Banyaknya terjadi transaksi'
            }
        },
        legend : {
            layout : 'vertical',
            align : 'right',
            verticalAlign : 'middle'
        },
        plotOption : {
            series : {
                allowPointSelect : true
            }
        },
        series : [{
            name : 'Jumlah transaksi',
            data : mdata
        }],
        responsive : {
            rules : [{
                condition : {
                    maxWidth : 500
                },
                chartOption : {
                    legend : {
                        layout : 'horizontal',
                        align : 'center',
                        verticalAlign : 'bottom'
                    }
                }
            }]
        }
    });
</script>
