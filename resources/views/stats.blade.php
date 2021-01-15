@include('layouts.app')
<div class="container mt-5" id="stats">
    <h2 style="text-align: center" class="mb-5 custom-heading">Ilość rezerwacji poszczególnych domków w miesiącach ubiegłego roku</h2>
    <div class="row">
    <div class="col-md-4">
        <canvas id="bar_1"></canvas>
    </div>
    <div class="col-md-4">
        <canvas id="bar_2"></canvas>
    </div>
    <div class="col-md-4">
        <canvas id="bar_3"></canvas>
    </div>
</div>
</div>
</body>
<script type="text/javascript"> 
    // Fioletowa Chatka
    $(function(){
        var datas = <?php 
            echo json_encode($stats[1]);
        ?>;
        var bar_1 = $("#bar_1");
        var barChart_1 = new Chart(bar_1,{
            type: 'bar',
            data: {
                labels: ['styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec', 'lipiec', 'sierpień', 'wrzesień', 'październik', 'listopad', 'grudzień'],
                datasets: [
                    {
                        data: datas,
                        backgroundColor: ['#5680E9', '#5AB9EA', '#8860D0', '#5680E9', '#5AB9EA', '#8860D0', '#5680E9', '#5AB9EA', '#8860D0', '#5680E9', '#5AB9EA', '#8860D0']
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: "Fioletowa Chatka"
                },
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: false
                },
                layout: {
                    padding: {
                        top: 20,
                        bottom: 0,
                        left: 0,
                        right: 0
                    }
                },
                scales: {
                    yAxes:[{
                        ticks:{
                            callback: function(value, index, values) {
                                return null;
                            }    
                        }
                    }]
                },
                animation: {
                    onComplete: function () {
                        var chartInstance = this.chart,
                        ctx = chartInstance.ctx;
                        ctx

                        this.data.datasets.forEach(function (dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function (bar, index) {
                                var data = dataset.data[index];                            
                                ctx.fillText(data, bar._model.x, bar._model.y);
                            });
                        });
                    }
                }
            }
        });
    })

    //Dom Hobbita
    $(function(){
        var datas = <?php 
            echo json_encode($stats[2]);
        ?>;
        var bar_2 = $("#bar_2");
        var barChart_2 = new Chart(bar_2,{
            type: 'bar',
            data: {
                labels: ['styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec', 'lipiec', 'sierpień', 'wrzesień', 'październik', 'listopad', 'grudzień'],
                datasets: [
                    {
                        data: datas,
                        backgroundColor: ['#5680E9', '#5AB9EA', '#8860D0', '#5680E9', '#5AB9EA', '#8860D0', '#5680E9', '#5AB9EA', '#8860D0', '#5680E9', '#5AB9EA', '#8860D0']
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: "Dom Hobbita"
                },
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: false
                },
                layout: {
                    padding: {
                        top: 20,
                        bottom: 0,
                        left: 0,
                        right: 0
                    }
                },
                scales: {
                    yAxes:[{
                        ticks:{
                            callback: function(value, index, values) {
                                return null;
                            }    
                        }
                    }]
                },
                animation: {
                    onComplete: function () {
                        var chartInstance = this.chart,
                        ctx = chartInstance.ctx;

                        this.data.datasets.forEach(function (dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function (bar, index) {
                                var data = dataset.data[index];                            
                                ctx.fillText(data, bar._model.x, bar._model.y);
                            });
                        });
                    }
                }
            }
        });
    })

    // Leśny Szałas
    $(function(){
        var datas = <?php 
            echo json_encode($stats[3]);
        ?>;
        var bar_3 = $("#bar_3");
        var barChart_3 = new Chart(bar_3,{
            type: 'bar',
            data: {
                labels: ['styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec', 'lipiec', 'sierpień', 'wrzesień', 'październik', 'listopad', 'grudzień'],
                datasets: [
                    {
                        data: datas,
                        backgroundColor: ['#5680E9', '#5AB9EA', '#8860D0', '#5680E9', '#5AB9EA', '#8860D0', '#5680E9', '#5AB9EA', '#8860D0', '#5680E9', '#5AB9EA', '#8860D0']
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: "Leśny Szałas"
                },
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: false
                },
                layout: {
                    padding: {
                        top: 20,
                        bottom: 0,
                        left: 0,
                        right: 0
                    }
                },
                scales: {
                    yAxes:[{
                        ticks:{
                            callback: function(value, index, values) {
                                return null;
                            }    
                        }
                    }]
                },
                animation: {
                    onComplete: function () {
                        var chartInstance = this.chart,
                        ctx = chartInstance.ctx;

                        this.data.datasets.forEach(function (dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function (bar, index) {
                                var data = dataset.data[index];                            
                                ctx.fillText(data, bar._model.x, bar._model.y);
                            });
                        });
                    }
                }
            }
        });
    })
</script>
</html>