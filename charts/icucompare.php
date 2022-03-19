<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript">


jQuery(document).ready(function($){ 
    $.ajax({
      url: "../model/ICUCompare.php",
      method: "GET",
      success: function(data) {
        console.log('test data:',data);
        var date = [];  
        var noncovid = [];  
        var covid = [];  
        for (var i in data) {
            date.push(data[i].date); 
            noncovid.push(data[i].noncovid);  
            covid.push(data[i].covid);  
        }
  
        var chartdata = {
          labels: date,
          datasets : [
            {
              label: "Non-Covid", 
              backgroundColor: "#3359b8",
              hoverBackgroundColor: "#5e8af7",
              borderColor: "#3359b8",
              data: covid
            }, 
            {
              label: "Covid",
              backgroundColor: "#c22f2f",
              hoverBackgroundColor: "#ed5858",
              borderColor: "#c22f2f",
              data: noncovid
              
            },
           
          ]

        }
        ;
  
        var ctx = $("#icu");
  
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