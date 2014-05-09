<?php
if(empty($auth)) {
    header("location:/index.php"); 
    die();
}
?>
		<!-- Scripts -->
		<script src="js/navigation.js"></script>
		
		<!-- Bootstrap scripts -->
		<!--
		<script src="js/bootstrap/bootstrap-tooltip.js"></script>
		<script src="js/bootstrap/bootstrap-dropdown.js"></script>
		<script src="js/bootstrap/bootstrap-button.js"></script>
		<script src="js/bootstrap/bootstrap-alert.js"></script>
		<script src="js/bootstrap/bootstrap-popover.js"></script>
		<script src="js/bootstrap/bootstrap-collapse.js"></script>
		<script src="js/bootstrap/bootstrap-transition.js"></script>
		-->
		<script src="js/bootstrap/bootstrap.min.js"></script>
		
		<!-- jQuery Flot Charts -->
		<!--[if lte IE 8]>
			<script language="javascript" type="text/javascript" src="js/plugins/flot/excanvas.min.js"></script>
		<![endif]-->
		<script src="js/plugins/flot/jquery.flot.js"></script>
		<script src="js/plugins/flot/jquery.flot.resize.min.js"></script>
		<script>
			$(document).ready(function() {
			
				// Demo #1
				// we use an inline data source in the example, usually data would be fetched from a server
				var data = [], totalPoints = 250;
				function getRandomData() {
					if (data.length > 0)
						data = data.slice(1);
				
					// do a random walk
					while (data.length < totalPoints) {
						
						data.push(y);
					}
				
					// zip the generated y values with the x values
					var res = [];
					for (var i = 0; i < data.length; ++i)
						res.push([i, data[i]])
					return res;
				}
				
				// setup control widget
				var updateInterval = 150;
				$("#updateInterval").val(updateInterval).change(function () {
					var v = $(this).val();
					if (v && !isNaN(+v)) {
						updateInterval = +v;
					if (updateInterval < 1)
						updateInterval = 1;
					if (updateInterval > 2000)
						updateInterval = 2000;
					$(this).val("" + updateInterval);
					}
				});
				
				// setup plot
				var options = {
					series: {
						shadowSize: 0,
						color: '#77ab13',
						lines: {
							fill: true
						}
					}, // drawing is faster without shadows
					yaxis: { min: 0, max: 150 },
					xaxis: { show: false },
					grid: { backgroundColor: '#ffffff', borderColor: 'transparent' }
				};
				var plot = $.plot($("#demo-1"), [ getRandomData() ], options);
				
				function update() {
					plot.setData([ getRandomData() ]);
					// since the axes don't change, we don't need to call plot.setupGrid()
					plot.draw();
					setTimeout(update, updateInterval);
				}
				
				update();
			
			});
		</script>
		
		<!-- Slim scroll -->
		<script type="text/javascript" src="js/plugins/slimScroll/jquery.slimscroll.js"></script>
		<script>
			$(document).ready(function() {
			
				$('#slimscroll-todos').slimScroll({
					height: '180px'
				});

			});
		</script>

		<!-- Block TODO list -->
		<script>
			$(document).ready(function() {
				
				$('.todo-block input[type="checkbox"]').click(function(){
					$(this).closest('tr').toggleClass('done');
				});
				$('.todo-block input[type="checkbox"]:checked').closest('tr').addClass('done');
				
			});
		</script>
		
		<!-- jQuery FullCalendar -->
		<script src="js/plugins/fullCalendar/jquery.fullcalendar.min.js"></script>
		
		<!-- Google Calendar plugin for jQuery FullCalendar -->
		<script src="js/plugins/fullCalendar/gcal.js"></script>
		<script>
			$(document).ready(function() {
			
				var date = new Date();
				var d = date.getDate();
				var m = date.getMonth();
				var y = date.getFullYear();
				
				$('.fullcalendar-demo').fullCalendar({
					header: {
						left: 'title',
						center: '',
						right: 'today month,basicWeek prev,next'
					},
					buttonText: {
						prev: '<span class="awe-circle-arrow-left"></span>',
						next: '<span class="awe-circle-arrow-right"></span>'
					},
					editable: true,
					events: [
						{
							title: 'All Day Event',
							start: new Date(y, m, 1)
						},
						{
							title: 'Long Event',
							start: new Date(y, m, d-5),
							end: new Date(y, m, d-2),
							className: 'event-red'
						},
						{
							id: 999,
							title: 'Repeating Event',
							start: new Date(y, m, d-3, 16, 0),
							allDay: false,
							className: 'event-blue'
						},
						{
							id: 999,
							title: 'Repeating Event',
							start: new Date(y, m, d+4, 16, 0),
							allDay: false,
							className: 'event-green'
						},
						{
							title: 'Meeting',
							start: new Date(y, m, d, 10, 30),
							allDay: false,
							className: 'event-orange'
						},
						{
							title: 'Lunch',
							start: new Date(y, m, d, 12, 0),
							end: new Date(y, m, d, 14, 0),
							allDay: false,
							className: 'event-dark'
						},
						{
							title: 'Birthday Party',
							start: new Date(y, m, d+1, 19, 0),
							end: new Date(y, m, d+1, 22, 30),
							allDay: false,
							className: 'event-red'
						},
						{
							title: 'Walking Pixels website',
							start: new Date(y, m, 28),
							end: new Date(y, m, 29),
							url: 'http://www.walkingpixels.com/',
							className: 'event-blue'
						}
					]
				});
				
				$('.fullcalendar-gcal').fullCalendar({
					header: {
						left: 'title',
						center: '',
						right: 'today month,basicWeek prev,next'
					},
					buttonText: {
						prev: '<span class="awe-arrow-left"></span>',
						next: '<span class="awe-arrow-right"></span>'
					},
					events: {
						url: 'http://www.google.com/calendar/feeds/usa__en%40holiday.calendar.google.com/public/basic',
						className: 'gcal-event', // an option!
						currentTimezone: 'America/Chicago' // an option!
					}
				});
				
			});
		</script>
		
		<!-- jQuery sparklines -->
		<script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
		<script>
			$(document).ready(function() {
				
				// Sample bar chart
				$('.sparkline.bar').sparkline([17, 23, 18, 14, 18, 19, 13], {
					type: 'bar',
					height: '35px',
					barWidth: '5px',
					barColor: '#088ec8',
					tooltipFormat: '{{offset:names}}: {{value}} orders',
					tooltipValueLookups: {
					names: {
						0: 'Monday',
						1: 'Tuesday',
						2: 'Wednesday',
						3: 'Thursday',
						4: 'Friday',
						5: 'Saturday',
						6: 'Sunday'
						}
					}
				});
				
			});
		</script>

	
		<!-- jQuery Visualize -->
		<!--[if lte IE 8]>
			<script language="javascript" type="text/javascript" src="js/plugins/visualize/excanvas.js"></script>
		<![endif]-->
		<script src="js/plugins/visualize/jquery.visualize.min.js"></script>
		<script>
			$(document).ready(function() {

				// Draw graph via function
				function responsiveVisualize() {
					var chartWidth = $(('.chart')).parent().width()*0.9;
				
					$('.chart').hide().visualize({
						type: 'pie',
						width: chartWidth,
						height: chartWidth,
						colors: ['#389abe','#fa9300','#6b9b20','#d43f3f','#8960a7','#33363b','#b29559','#6bd5b1','#66c9ee'],
						lineDots: 'double',
						interaction: false
					});
				}

				$(window).on("resize load", function(){
					$('.visualize').remove();
					responsiveVisualize();
				});
			
			});
		</script>


		</div>
	</body>
</html>