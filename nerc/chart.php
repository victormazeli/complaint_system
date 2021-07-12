 <script type="text/javascript">
        var chart = c3.generate({
            bindto: "#nerc_chart",
            data: {
                columns: [
                    ['Not in Progress', <?php echo $notProcess; ?>],
                    ['In Progress', <?php echo $Process; ?>],
                    ['Closed', <?php echo $Closed; ?>]

                ],
                type: 'pie',

                onclick: function(d, i) { console.log("onclick", d, i); },
                onmouseover: function(d, i) { console.log("onmouseover", d, i); },
                onmouseout: function(d, i) { console.log("onmouseout", d, i); },

                colors: {
                    'Not in Progress':'#ff407b',
                    'In Progress': '#5969ff' ,
                    'Closed': '#25d5f2'
                }
            },
            donut: {
                label: {
                    show: true
                }
            },
        });

         var chart = c3.generate({
            bindto: "#nerc_chart2",
            data: {
                columns: [
                    ['Not in Progress', <?php echo $notProcess; ?>],
                    ['In Progress', <?php echo $Process; ?>],
                    ['Closed', <?php echo $Closed; ?>]

                ],
                type: 'bar',

                onclick: function(d, i) { console.log("onclick", d, i); },
                onmouseover: function(d, i) { console.log("onmouseover", d, i); },
                onmouseout: function(d, i) { console.log("onmouseout", d, i); },

                colors: {
                    'Not in Progress':'#ff407b',
                    'In Progress': '#5969ff' ,
                    'Closed': '#25d5f2'
                }
            },
            donut: {
                label: {
                    show: true
                }
            },
        });

           var chart = c3.generate({
            bindto: "#nerc_chart3",
            data: {
                columns: [
                    ['Not in Progress', <?php echo $notProcess; ?>],
                    ['In Progress', <?php echo $Process; ?>],
                    ['Closed', <?php echo $Closed; ?>]

                ],
                type: 'donut',

                onclick: function(d, i) { console.log("onclick", d, i); },
                onmouseover: function(d, i) { console.log("onmouseover", d, i); },
                onmouseout: function(d, i) { console.log("onmouseout", d, i); },

                colors: {
                    'Not in Progress':'#ff407b',
                    'In Progress': '#5969ff' ,
                    'Closed': '#25d5f2'
                }
            },
            donut: {
                label: {
                    show: true
                }
            },
        });
        $(function() {
            "use strict";
            // ============================================================== 
            // Product Sales
            // ============================================================== 

            new Chartist.Bar('.ct-chart-product', {
                labels: ['Not in Progress', 'In Progress', 'Closed'],
                series: [
                    [10000, 1200000, 1400000]
                ]
            }, {
                axisY: {
                    labelInterpolationFnc: function(value) {
                        
                    }
                }
            }).on('draw', function(data) {
                if (data.type === 'bar') {
                    data.element.attr({
                        style: 'stroke-width: 40px'
                    });
                }
            });
        });
    </script>
