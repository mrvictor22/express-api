(()=>{function r(r){if(null!==document.getElementById(r)){var o=document.getElementById(r).getAttribute("data-colors");return(o=JSON.parse(o)).map((function(r){var o=r.replace(" ","");if(-1===o.indexOf(",")){var e=getComputedStyle(document.documentElement).getPropertyValue(o);return e||o}var t=r.split(",");if(2==t.length){var a=getComputedStyle(document.documentElement).getPropertyValue(t[0]);return a="rgba("+a+","+t[1]+")"}return o}))}}Chart.defaults.borderColor="rgba(133, 141, 152, 0.1)",Chart.defaults.color="#858d98";var o=document.getElementById("lineChart");if(lineChartColor=r("lineChart"),lineChartColor){o.setAttribute("width",o.parentElement.offsetWidth);new Chart(o,{type:"line",data:{labels:["January","February","March","April","May","June","July","August","September","October"],datasets:[{label:"Sales Analytics",fill:!0,lineTension:.5,backgroundColor:lineChartColor[0],borderColor:lineChartColor[1],borderCapStyle:"butt",borderDash:[],borderDashOffset:0,borderJoinStyle:"miter",pointBorderColor:lineChartColor[1],pointBackgroundColor:"#fff",pointBorderWidth:1,pointHoverRadius:5,pointHoverBackgroundColor:lineChartColor[1],pointHoverBorderColor:"#fff",pointHoverBorderWidth:2,pointRadius:1,pointHitRadius:10,data:[65,59,80,81,56,55,40,55,30,80]},{label:"Monthly Earnings",fill:!0,lineTension:.5,backgroundColor:lineChartColor[2],borderColor:lineChartColor[3],borderCapStyle:"butt",borderDash:[],borderDashOffset:0,borderJoinStyle:"miter",pointBorderColor:lineChartColor[3],pointBackgroundColor:"#fff",pointBorderWidth:1,pointHoverRadius:5,pointHoverBackgroundColor:lineChartColor[3],pointHoverBorderColor:"#eef0f2",pointHoverBorderWidth:2,pointRadius:1,pointHitRadius:10,data:[80,23,56,65,23,35,85,25,92,36]}]},options:{x:{ticks:{font:{family:"Poppins"}}},y:{ticks:{font:{family:"Poppins"}}},plugins:{legend:{labels:{font:{family:"Poppins"}}}}}})}var e=document.getElementById("bar");if(barChartColor=r("bar"),barChartColor){e.setAttribute("width",e.parentElement.offsetWidth);new Chart(e,{type:"bar",data:{labels:["January","February","March","April","May","June","July"],datasets:[{label:"Sales Analytics",backgroundColor:barChartColor[0],borderColor:barChartColor[0],borderWidth:1,hoverBackgroundColor:barChartColor[1],hoverBorderColor:barChartColor[1],data:[65,59,81,45,56,80,50,20]}]},options:{x:{ticks:{font:{family:"Poppins"}}},y:{ticks:{font:{family:"Poppins"}}},plugins:{legend:{labels:{font:{family:"Poppins"}}}}}})}var t=document.getElementById("pieChart");if(pieChartColors=r("pieChart"),pieChartColors)new Chart(t,{type:"pie",data:{labels:["Desktops","Tablets"],datasets:[{data:[300,180],backgroundColor:pieChartColors,hoverBackgroundColor:pieChartColors,hoverBorderColor:"#fff"}]},options:{plugins:{legend:{labels:{font:{family:"Poppins"}}}}}});var a=document.getElementById("doughnut");if(doughnutChartColors=r("doughnut"),doughnutChartColors)new Chart(a,{type:"doughnut",data:{labels:["Desktops","Tablets"],datasets:[{data:[300,210],backgroundColor:doughnutChartColors,hoverBackgroundColor:doughnutChartColors,hoverBorderColor:"#fff"}]},options:{plugins:{legend:{labels:{font:{family:"Poppins"}}}}}});var l=document.getElementById("polarArea");if(polarAreaChartColors=r("polarArea"),polarAreaChartColors)new Chart(l,{type:"polarArea",data:{labels:["Series 1","Series 2","Series 3","Series 4"],datasets:[{data:[11,16,7,18],backgroundColor:polarAreaChartColors,label:"My dataset",hoverBorderColor:"#fff"}]},options:{plugins:{legend:{labels:{font:{family:"Poppins"}}}}}});var n=document.getElementById("radar");if(radarChartColors=r("radar"),radarChartColors)new Chart(n,{type:"radar",data:{labels:["Eating","Drinking","Sleeping","Designing","Coding","Cycling","Running"],datasets:[{label:"Desktops",backgroundColor:radarChartColors[0],borderColor:radarChartColors[1],pointBackgroundColor:radarChartColors[1],pointBorderColor:"#fff",pointHoverBackgroundColor:"#fff",pointHoverBorderColor:radarChartColors[1],data:[65,59,90,81,56,55,40]},{label:"Tablets",backgroundColor:radarChartColors[2],borderColor:radarChartColors[3],pointBackgroundColor:radarChartColors[3],pointBorderColor:"#fff",pointHoverBackgroundColor:"#fff",pointHoverBorderColor:radarChartColors[3],data:[28,48,40,19,96,27,100]}]},options:{plugins:{legend:{labels:{font:{family:"Poppins"}}}}}})})();