<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript">


jQuery(document).ready(function($){ 
    $.ajax({
      url: "../model/HospitalCompare.php",
      method: "GET",
      success: function(data) {
        console.log('test data:',data);
        var date = [];  
        var hospitalized = [];  
        var discharged = [];  
        for (var i in data) {
            date.push(data[i].date); 
            hospitalized.push(data[i].hospitalized);  
            discharged.push(data[i].discharged);  
        }
  
        var chartdata = {
          labels: date,
          datasets : [
            {
              label: "Discharged", 
              backgroundColor: "#3359b8",
              hoverBackgroundColor: "#5e8af7",
              borderColor: "#3359b8",
              data: discharged
            }, 
            {
              label: "Hospitalized",
              backgroundColor: "#c22f2f",
              hoverBackgroundColor: "#ed5858",
              borderColor: "#c22f2f",
              data: hospitalized
              
            },
           
          ]

        }
        ;
  
        var ctx = $("#hospital");
  
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
 
          }
          
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  });
  </script>