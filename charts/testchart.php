<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript">


jQuery(document).ready(function($){ 
    $.ajax({
      url: "../model/TestConducted.php",
      method: "GET",
      success: function(data) {
        console.log('test data:',data);
        var date = [];
        var total = [];  
        var rtkag = [];  
        var pcr = [];  
        for (var i in data) {
            date.push(data[i].date);
            total.push(data[i].total);  
            rtkag.push(data[i].rtkag);  
            pcr.push(data[i].pcr);  
        }
  
        var chartdata = {
          labels: date,
          datasets : [
            {
              label: "Test",
              backgroundColor: "#4e73df",
              hoverBackgroundColor: "#2e59d9",
              borderColor: "#4e73df",
              data: total
            },
            {
              label: "RTK",
              backgroundColor: "#d63c31",
              hoverBackgroundColor: "#d63c31",
              borderColor: "#d63c31",
              data: rtkag
            },
            {
              label: "PCR",
              backgroundColor: "#307837",
              hoverBackgroundColor: "#307837",
              borderColor: "#307837",
              data: pcr
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