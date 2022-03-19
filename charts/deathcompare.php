<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript">


jQuery(document).ready(function($){ 
    $.ajax({
      url: "../model/DeathCompare.php",
      method: "GET",
      success: function(data) {
        console.log('test data:',data);
        var date = [];  
        var unvax = [];  
        var vax = [];  
        for (var i in data) {
            date.push(data[i].date); 
            unvax.push(data[i].unvax);  
            vax.push(data[i].vax);  
        }
  
        var chartdata = {
          labels: date,
          datasets : [
            {
              label: "vax",
              backgroundColor: "#097969",
              hoverBackgroundColor: "#1f9180",
              borderColor: "#097969",
              data: vax
            },
            {
              label: "unvax",
              backgroundColor: "#5F9EA0",
              hoverBackgroundColor: "#77c4c7",
              borderColor: "#5F9EA0",
              data: unvax
            }, 
          ]

        }
        ;
  
        var ctx = $("#death");
  
        var barGraph = new Chart(ctx, {
          type: 'line',
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