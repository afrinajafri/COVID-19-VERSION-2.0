<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript">



jQuery(document).ready(function($){ 
    $.ajax({
      // url: "../api/epidemic/statecases.php",
      url: "../model/StateCases.php",
      method: "GET",
      success: function(data) {
 
        console.log('bar chart data:',data);
       
        var date = [];
        var cases = [];  
        for (var i in data) { 
          date.push(data[i].date);
          cases.push(data[i].cases);   
            
        }
        console.log('haii', cases);
        var chartdata = {
          labels: date,
          datasets : [
            {
              label: "Confirmed Cases",
              backgroundColor: "#4e73df",
              hoverBackgroundColor: "#2e59d9",
              borderColor: "#4e73df",
              data: cases
            }
          ]
        }
        ;
  
        var ctx = $("#mycanvas");
  
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
          }
          
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  });
  </script>