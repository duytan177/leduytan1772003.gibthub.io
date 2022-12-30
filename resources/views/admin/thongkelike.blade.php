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
            var luotthich = <?php echo $luotthich; ?>;
            var sanpham = <?php echo $sanpham; ?>;
            var color = <?php echo $color; ?>;
            var barChartData = {
                labels: sanpham,
                datasets: [{
                    label: 'Số lượt thích',
                    data: luotthich,
                    backgroundColor: color,
                    borderColor: "gray"
                    }
                ]
            };


            window.onload = function() {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: 'pie',
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
                            text: 'Biểu đồ tròn thể hiện lượt yêu thích của sản phẩm.'
                        }
                    }
                });
            };
        </script>


    </div>
@endsection
