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
        var labeldate = [];
        var cases = [];  
        for (var i in data) { 
          date.push(data[i].date);
          labeldate.push(data[i].labeldate);
          cases.push(data[i].cases);   
            
        }
        console.log('haii', cases);
        var chartdata = {
          labels: date,
          datasets : [
            {
              label: "Confirmed Cases",
              backgroundColor: "#419466",
              hoverBackgroundColor: "#95c4aa",
              borderColor: "#58806a",
              data: cases
            }
          ]
        }
        ;
  
        var ctx = $("#confirmed_cases");
  
        var barGraph = new Chart(ctx, {
          type: 'bar',
          data: chartdata,
          options: {
            plugins: {
                legend: {
                    display: false
                }
            },
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
              callbacks: {
                label:labeldate
              },
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