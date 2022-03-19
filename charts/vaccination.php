<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript">


jQuery(document).ready(function($){ 
    $.ajax({
      url: "../model/VaccCases.php",
      method: "GET",
      success: function(data) {
        console.log('line chart data:',data);
        
        var date = [];
        var onedose = [];  
        var deaths_new = [];  
        var twodose = [];  

        for (var i in data) {
            date.push(data[i].date);
            onedose.push(data[i].onedose);  
            twodose.push(data[i].twodose);  
        }
  
        var chartdata = {
          labels: date,
          datasets : [
            {
              label: "One Dose",
              backgroundColor: "#4e73df",
              hoverBackgroundColor: "#2e59d9",
              borderColor: "#4e73df",
              data: onedose,
          // fill: false,        
          // lineTension: 0.4,        
          // radius: 6    
            },
            {
              label: "Two Doses",
              backgroundColor: "#cf4250",
              hoverBackgroundColor: "#cf4250",
              borderColor: "#cf4250",
              data: twodose,
          // fill: false,        
          // lineTension: 0.4,        
          // radius: 6    
            },
          ]
        }
        ;
  
        var ctx = $("#vaccination");

        var opt = {    
        responsive: true,    
        title: {      
          display: true,      
          position: "top",      
          text: "Line Chart",      
          fontSize: 16,      
          fontColor: "#444"  
        },    
        legend: {      
          display: true,      
          position: "bottom",      
          labels: {        
            fontColor: "#555",        
            fontSize: 14      
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
      };  
  
        var barGraph = new Chart(ctx, {
          type: 'line',
          data: chartdata,
          options: opt
          
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  });
</script>