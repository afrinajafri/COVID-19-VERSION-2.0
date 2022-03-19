<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript">


jQuery(document).ready(function($){ 
    $.ajax({
      url: "../model/VaccCases.php",
      method: "GET",
      success: function(data) {
        console.log('test data:',data);
        var date = [];
        var booster = [];  
        var twodose = [];  
        var onedose = [];  
        for (var i in data) {
            date.push(data[i].date);
            booster.push(data[i].booster);  
            twodose.push(data[i].twodose);  
            onedose.push(data[i].onedose);  
        }
  
        var chartdata = {
          labels: date,
          datasets : [
            { 
              label: "One Dose",
              backgroundColor: "#097969",
              hoverBackgroundColor: "#1f9180",
              borderColor: "#097969",
              data: onedose
            },
            {
              label: "Two Dose",
              backgroundColor: "#5F9EA0",
              hoverBackgroundColor: "#77c4c7",
              borderColor: "#5F9EA0",
              data: twodose
            },
            {
              label: "Three Dose",
              backgroundColor: "#AFE1AF",
              hoverBackgroundColor: "#ccffcc",
              borderColor: "#AFE1AF",
              data: booster
            }, 
          ]

        }
        ;
  
        var ctx = $("#vaccination");
  
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