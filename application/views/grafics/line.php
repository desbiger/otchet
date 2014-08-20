<!--<pre>--><?// print_r($datas) ?><!--</pre>-->

<script type = "text/javascript">
	var initCharts = function(){
        AmCharts.makeChart("chartdiv<?=$id?>",
                {
                    "type": "serial",
                    "pathToImages": "http://cdn.amcharts.com/lib/3/images/",
                    "categoryField": "category",
                    "startDuration": 1,
                    "theme": "default",
                    "categoryAxis": {
                        "gridPosition": "start"
                    },
                    "trendLines": [],
                    "graphs": [
                        {
                            "balloonText": "[[text]]",
                            "bullet": "round",
                            "id": "AmGraph-1",
                            "title": '<?=$project?>',
                            "type": "smoothedLine",
                            "valueField": "column-1"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {

                            "id": "ValueAxis-1",
                            "title": "Количество потраченных часов"
                        }
                    ],
                    "allLabels": [],
                    "balloon": {},
                    "legend": {
                        "useGraphSettings": true
                    },
                    "titles": [
                        {
                            "id": "Title-1",
                            "size": 12,
                            "text": "Отчет затраченного времени по проекту <?=$project?>"
                        }
                    ],
                    "dataProvider": [
                        <?foreach($datas as $key => $vol):?>
                        {
                            "category": '<?=$key?>',
                            "column-1": <?=$vol?>,
                            "balloonText":'123',
                            'text' : 'Затрачено <?= $vol ?> часов'
                        },
                        <?endforeach?>
                    ]
                }
        );
    };
    $(document).ready(function(){
        $(window).bind({
            "init_charts" : initCharts
        });
    });

</script>
<div id = "chartdiv<?=$id?>" style = "width: 100%; height: 400px; background-color: #FFFFFF;"></div>
