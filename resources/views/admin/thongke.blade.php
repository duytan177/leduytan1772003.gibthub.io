@extends('admin.back.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <canvas id="canvas" height="280" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <script>
            var month = <?php echo $months; ?>;
            var total = <?php echo $total; ?>;
            var config = <?php echo $config; ?>;
            var barChartData = {
                labels: month,
                datasets: [{
                        label: 'Doanh Thu',
                        backgroundColor: 'RGBA( 176, 196, 222, 0.2 )',
                        borderColor: "gray",
                        data: total,

                    },
                    {
                        label: 'Lợi nhuận',
                        backgroundColor: 'rgba( 255, 240, 245, 1 )',
                        borderColor: "pink",
                        data: config
                    }
                ]
            };


            window.onload = function() {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: 'line',
                    data: barChartData,
                    options: {
                        elements: {
                            rectangle: {
                                borderWidth: 2,
                                borderColor: '#c1c1c1',
                                borderSkipped: 'bottom'
                            }
                        },
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Bảng doanh thu hàng tháng năm 2022 (Theo VNĐ)'
                        }
                    }
                });
            };
        </script>


    </div>
@endsection
