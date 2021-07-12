 <script type="text/javascript">
        var chart = c3.generate({
            bindto: "#bosso_chart_category",
            data: {
                columns: [
                    ['Not in Progress', <?php echo $bosso_not; ?>],
                    ['In Progress', <?php echo $bosso_in; ?>],
                    ['Closed', <?php echo $bosso_closed; ?>]

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
            bindto: "#bosso_chart_category2",
            data: {
                columns: [
                    ['Not in Progress', <?php echo $bosso_not; ?>],
                    ['In Progress', <?php echo $bosso_in; ?>],
                    ['Closed', <?php echo $bosso_closed; ?>]

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

                
  var chart = c3.generate({
            bindto: "#chanchaga_chart_category",
            data: {
                columns: [
                    ['Not in Progress', <?php echo $chanchaga_not; ?> ],
                    ['In Progress', <?php echo $chanchaga_in; ?>],
                    ['Closed', <?php echo $chanchaga_closed ?>]

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
            bindto: "#chanchaga_chart_category2",
            data: {
                columns: [
                    ['Not in Progress', <?php echo $chanchaga_not; ?>],
                    ['In Progress', <?php echo $chanchaga_in; ?>],
                    ['Closed', <?php echo $chanchaga_closed; ?>]

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

    </script>
