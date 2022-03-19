<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript">


jQuery(document).ready(function($){ 
    $.ajax({
      url: "../model/TestCases.php",
      method: "GET",
      success: function(data) {
        console.log('test data:',data);
        var date = [];
        var total = [];  
        var rtk = [];  
        var pcr = [];  
        for (var i in data) {
            date.push(data[i].date);
            total.push(data[i].total);  
            rtk.push(data[i].rtk);  
            pcr.push(data[i].pcr);  
        }
  
        var chartdata = {
          labels: date,
          datasets : [
            {
              label: "PCR",
              backgroundColor: "#097969",
              hoverBackgroundColor: "#1f9180",
              borderColor: "#097969",
              data: pcr
            },
            {
              label: "RTK",
              backgroundColor: "#5F9EA0",
              hoverBackgroundColor: "#77c4c7",
              borderColor: "#5F9EA0",
              data: rtk
            },
            {
              label: "Total",
              backgroundColor: "#AFE1AF",
              hoverBackgroundColor: "#ccffcc",
              borderColor: "#AFE1AF",
              data: total
            }
          ]

        }
        ;
  
        var ctx = $("#testchart");
  
        var barGraph = new Chart(ctx, {
          type: 'bar',
          data: chartdata,
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            }, 
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10, 
              },

              x: {
                stacked: true,
              },
              y: {
                stacked: true
              }
          }
          
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  });
  </script>