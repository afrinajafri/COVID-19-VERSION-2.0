<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript">


jQuery(document).ready(function($){ 
    $.ajax({
      url: "https://covid-19.samsam123.name.my/api/state?date=latest",
      method: "GET",
      success: function(data) {
        console.log('malaysia data:',data);
        var state = [];
        var cases_new = [];  
        for (var i in data) { 
          state.push(data[i].state);
          cases_new.push(data[i].cases_new);    
        } 
        var chartdata = {
          labels: state,
          datasets : [
            {
              label: "Malaysia",
                backgroundColor: [
              '#adadad',
              '#ff5454',
              '#fa8748',
              '#1100ff',
              '#ffc640',
              '#b6bd5b',
              '#89d444',
              '#7af0b1',
              '#57d4bd',
              '#409ac9',
              '#960094',
              '#be8cff',
              '#ff9cfd',
              '#ffb0bd',
              '#7d4f67',
              '#0085ad'
              
            ],
              hoverBackgroundColor: "#c2c2c2", 
              data: cases_new
            }
          ]
        }
        ;
 
  
        var ctx = $("#malaysia");
  
        var barGraph = new Chart(ctx, {
          type: 'pie',
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