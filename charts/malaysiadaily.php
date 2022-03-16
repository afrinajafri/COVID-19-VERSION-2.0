<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript">


jQuery(document).ready(function($){ 
    $.ajax({
      url: "../model/MalaysiaCases.php",
      method: "GET",
      success: function(data) {
        console.log('malaysia data:',data);
        var state = [];
        var cases = [];  
        for (var i in data) {
            state.push(data[i].state);
            cases.push(data[i].cases);  
        }
  
        var chartdata = {
          labels: state,
          datasets : [
            {
              label: "Malaysia",
                backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)',
              'rgb(235, 69, 54)',
              'rgb(255, 191, 128)',
              'rgb(168, 255, 128)',
              'rgb(128, 168, 255)',
              'rgb(126, 60, 240)',
              'rgb(179, 61, 143)',
              'rgb(237, 187, 197)',
              'rgb(110, 46, 148)',
              'rgb(210, 217, 173)',
              'rgb(71, 161, 87)',
              'rgb(55, 132, 158)',
              
            ],
              hoverBackgroundColor: "#c2c2c2",
              borderColor: "#FFFFF",
              data: cases
            }
          ]
        }
        ;
  
        var ctx = $("#malaysia");
  
        var barGraph = new Chart(ctx, {
          type: 'doughnut',
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