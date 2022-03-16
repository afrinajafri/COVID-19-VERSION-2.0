<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript">


jQuery(document).ready(function($){ 
    $.ajax({
      url: "../model/ICUCase.php",
      method: "GET",
      success: function(data) {
        console.log('icu data:',data);
        var date = [];
        var icu_covid = [];  
        for (var i in data) {
            date.push(data[i].date);
            icu_covid.push(data[i].icu_covid);  
        }
  
        var chartdata = {
          labels: date,
          datasets : [
            {
              label: "ICU",
              backgroundColor: "#4e73df",
              hoverBackgroundColor: "#2e59d9",
              borderColor: "#4e73df",
              data: icu_covid
            }
          ]
        }
        ;
  
        var ctx = $("#icuchart");
  
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