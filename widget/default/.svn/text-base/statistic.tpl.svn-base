<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>统计图</title>
	<script type="text/javascript" src="/resources/js/jquery/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/resources/js/highcharts.js"></script>
	<!--[if IE]>
		<script type="text/javascript" src="/resources/js/excanvas.compiled.js"></script>
	<![endif]-->
	<script type="text/javascript">
		var chart;
		var stat_data = '';
		<!--{if $assign.stat_data}-->
		stat_data = <!--{$assign.stat_data}-->;
		<!--{/if}-->
		$(document).ready(function() {
			chart = new Highcharts.Chart({
				chart: {
					renderTo: 'container',
					defaultSeriesType: 'area'
				},
				title: {
					text: stat_data.title.text
				},
				subtitle: {
					text: stat_data.subtitle.text
				},
				xAxis: {
					categories: stat_data.categories,
					tickmarkPlacement: 'on',
					title: {
						enabled: true,
						text:'日期(年-月-日)'
					}
				},
				yAxis: {
					title: {
						text: '流量值'
					},
					labels: {
						formatter: function() {
							return this.value;
						}
					}
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.series.name +'</b><br/>'+
							 this.x +': <font color="red">'+ Highcharts.numberFormat(this.y, 0, ',') +'</font>';
					}
				},
				plotOptions: {
					area: {
						stacking: 'normal',
						lineColor: '#666666',
						lineWidth: 1,
						marker: {
							lineWidth: 1,
							lineColor: '#666666'
						}
					}
				},
				series: stat_data.series
			});
			
			
		});
	</script>
	
</head>
<body>
	<div id="container" style="width: 1000px; height: 500px; margin: 0 auto"></div>
</body>
</html>