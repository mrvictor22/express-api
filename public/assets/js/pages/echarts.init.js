(()=>{function e(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}function t(e){return t="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},t(e)}function a(e){if(null!==document.getElementById(e)){var t=document.getElementById(e).getAttribute("data-colors");return(t=JSON.parse(t)).map((function(e){var t=e.replace(" ","");if(-1===t.indexOf(",")){var a=getComputedStyle(document.documentElement).getPropertyValue(t);return a||t}var i=e.split(",");if(2==i.length){var o=getComputedStyle(document.documentElement).getPropertyValue(i[0]);return o="rgba("+o+","+i[1]+")"}return t}))}}var i=a("chart-line");if(i){var o=document.getElementById("chart-line"),n=echarts.init(o);(I={grid:{left:"0%",right:"0%",bottom:"0%",top:"4%",containLabel:!0},xAxis:{type:"category",data:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],axisLine:{lineStyle:{color:"#858d98"}}},yAxis:{type:"value",axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},series:[{data:[150,230,224,218,135,147,260],type:"line"}],textStyle:{fontFamily:"Poppins, sans-serif"},color:i})&&"object"===t(I)&&I&&n.setOption(I)}var l=a("chart-line-stacked");if(l){var r;o=document.getElementById("chart-line-stacked"),n=echarts.init(o);e(r={tooltip:{trigger:"axis"},legend:{data:["Email","Union Ads","Video Ads","Direct","Search Engine"],textStyle:{color:"#858d98"}},grid:{left:"0%",right:"0%",bottom:"0%",containLabel:!0},toolbox:{feature:{saveAsImage:{}}},textStyle:{fontFamily:"Poppins, sans-serif"},xAxis:{type:"category",boundaryGap:!1,data:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],axisLine:{lineStyle:{color:"#858d98"}}},yAxis:{type:"value",axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},series:[{name:"Email",type:"line",stack:"Total",data:[120,132,101,134,90,230,210]},{name:"Union Ads",type:"line",stack:"Total",data:[220,182,191,234,290,330,310]},{name:"Video Ads",type:"line",stack:"Total",data:[150,232,201,154,190,330,410]},{name:"Direct",type:"line",stack:"Total",data:[320,332,301,334,390,330,320]},{name:"Search Engine",type:"line",stack:"Total",data:[820,932,901,934,1290,1330,1320]}]},"textStyle",{fontFamily:"Poppins, sans-serif"}),e(r,"color",l),(I=r)&&n.setOption(I)}var s=a("chart-area");if(s){o=document.getElementById("chart-area"),n=echarts.init(o);(I={grid:{left:"0%",right:"0%",bottom:"0%",top:"4%",containLabel:!0},xAxis:{type:"category",boundaryGap:!1,data:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],axisLine:{lineStyle:{color:"#858d98"}}},yAxis:{type:"value",axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},series:[{data:[820,932,901,934,1290,1330,1320],type:"line",areaStyle:{}}],textStyle:{fontFamily:"Poppins, sans-serif"},color:s[0],backgroundColor:s[1]})&&n.setOption(I)}var c=a("chart-area-stacked");if(c){o=document.getElementById("chart-area-stacked"),n=echarts.init(o);(I={tooltip:{trigger:"axis",axisPointer:{type:"cross",label:{backgroundColor:"#6a7985"}}},legend:{data:["Email","Union Ads","Video Ads","Direct","Search Engine"],textStyle:{color:"#858d98"}},toolbox:{feature:{saveAsImage:{}}},grid:{left:"0%",right:"0%",bottom:"0%",containLabel:!0},xAxis:[{type:"category",boundaryGap:!1,data:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],axisLine:{lineStyle:{color:"#858d98"}}}],yAxis:{type:"value",axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},textStyle:{fontFamily:"Poppins, sans-serif"},color:c,series:[{name:"Email",type:"line",stack:"Total",areaStyle:{},emphasis:{focus:"series"},data:[120,132,101,134,90,230,210]},{name:"Union Ads",type:"line",stack:"Total",areaStyle:{},emphasis:{focus:"series"},data:[220,182,191,234,290,330,310]},{name:"Video Ads",type:"line",stack:"Total",areaStyle:{},emphasis:{focus:"series"},data:[150,232,201,154,190,330,410]},{name:"Direct",type:"line",stack:"Total",areaStyle:{},emphasis:{focus:"series"},data:[320,332,301,334,390,330,320]},{name:"Search Engine",type:"line",stack:"Total",label:{show:!0,position:"top"},areaStyle:{},emphasis:{focus:"series"},data:[820,932,901,934,1290,1330,1320]}]})&&n.setOption(I)}var d=a("chart-step-line");if(d){o=document.getElementById("chart-step-line"),n=echarts.init(o);(I={tooltip:{trigger:"axis"},legend:{data:["Step Start","Step Middle","Step End"],textStyle:{color:"#858d98"}},grid:{left:"0%",right:"0%",bottom:"0%",containLabel:!0},toolbox:{feature:{saveAsImage:{}}},xAxis:{type:"category",data:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],axisLine:{lineStyle:{color:"#858d98"}}},yAxis:{type:"value",axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},textStyle:{fontFamily:"Poppins, sans-serif"},color:d,series:[{name:"Step Start",type:"line",step:"start",data:[120,132,101,134,90,230,210]},{name:"Step Middle",type:"line",step:"middle",data:[220,282,201,234,290,430,410]},{name:"Step End",type:"line",step:"end",data:[450,432,401,454,590,530,510]}]})&&n.setOption(I)}var m=a("chart-line-y-category");if(m){o=document.getElementById("chart-line-y-category"),n=echarts.init(o);(I={legend:{data:["Altitude (km) vs. temperature (°C)"],textStyle:{color:"#858d98"}},tooltip:{trigger:"axis",formatter:"Temperature : <br/>{b}km : {c}°C"},grid:{left:"1%",right:"0%",bottom:"0%",containLabel:!0},xAxis:{type:"value",axisLabel:{formatter:"{value} °C"},axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},yAxis:{type:"category",axisLine:{onZero:!1,lineStyle:{color:"#858d98"}},axisLabel:{formatter:"{value} km"},boundaryGap:!1,data:["0","10","20","30","40","50","60","70","80"],splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},textStyle:{fontFamily:"Poppins, sans-serif"},color:m,series:[{name:"Altitude (km) vs. temperature (°C)",type:"line",symbolSize:10,symbol:"circle",smooth:!0,lineStyle:{width:3,shadowColor:"rgba(0,0,0,0.3)",shadowBlur:10,shadowOffsetY:8},data:[15,-50,-56.5,-46.5,-22.1,-2.5,-27.7,-55.7,-76.5]}]})&&n.setOption(I)}var y=a("chart-bar");if(y){o=document.getElementById("chart-bar"),n=echarts.init(o);(I={grid:{left:"0%",right:"0%",bottom:"0%",top:"3%",containLabel:!0},xAxis:{type:"category",data:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],axisLine:{lineStyle:{color:"#858d98"}}},yAxis:{type:"value",axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},textStyle:{fontFamily:"Poppins, sans-serif"},color:y,series:[{data:[120,200,150,80,70,110,130],type:"bar",showBackground:!0,backgroundStyle:{color:"rgba(180, 180, 180, 0.2)"}}]})&&n.setOption(I)}var p={},u=a("chart-bar-label-rotation");if(u){o=document.getElementById("chart-bar-label-rotation"),n=echarts.init(o);p.configParameters={rotate:{min:-90,max:90},align:{options:{left:"left",center:"center",right:"right"}},verticalAlign:{options:{top:"top",middle:"middle",bottom:"bottom"}},position:{options:["left","right","top","bottom","inside","insideTop","insideLeft","insideRight","insideBottom","insideTopLeft","insideTopRight","insideBottomLeft","insideBottomRight"].reduce((function(e,t){return e[t]=t,e}),{})},distance:{min:0,max:100}},p.config={rotate:90,align:"left",verticalAlign:"middle",position:"insideBottom",distance:15,onChange:function(){var e={rotate:p.config.rotate,align:p.config.align,verticalAlign:p.config.verticalAlign,position:p.config.position,distance:p.config.distance};n.setOption({series:[{label:e},{label:e},{label:e},{label:e}]})}};var g={show:!0,position:p.config.position,distance:p.config.distance,align:p.config.align,verticalAlign:p.config.verticalAlign,rotate:p.config.rotate,formatter:"{c}  {name|{a}}",fontSize:16,rich:{name:{}}};(I={grid:{left:"0%",right:"0%",bottom:"0%",containLabel:!0},tooltip:{trigger:"axis",axisPointer:{type:"shadow"}},legend:{data:["Forest","Steppe","Desert","Wetland"],textStyle:{color:"#858d98"}},color:u,toolbox:{show:!0,orient:"vertical",left:"right",top:"center",feature:{mark:{show:!0},dataView:{show:!0,readOnly:!1},magicType:{show:!0,type:["line","bar","stack"]},restore:{show:!0},saveAsImage:{show:!0}}},xAxis:[{type:"category",axisTick:{show:!1},data:["2012","2013","2014","2015","2016"],axisLine:{lineStyle:{color:"#858d98"}}}],yAxis:{type:"value",axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},textStyle:{fontFamily:"Poppins, sans-serif"},series:[{name:"Forest",type:"bar",barGap:0,label:g,emphasis:{focus:"series"},data:[320,332,301,334,390]},{name:"Steppe",type:"bar",label:g,emphasis:{focus:"series"},data:[220,182,191,234,290]},{name:"Desert",type:"bar",label:g,emphasis:{focus:"series"},data:[150,232,201,154,190]},{name:"Wetland",type:"bar",label:g,emphasis:{focus:"series"},data:[98,77,101,99,40]}]})&&n.setOption(I)}var h=a("chart-horizontal-bar");if(h){o=document.getElementById("chart-horizontal-bar"),n=echarts.init(o);(I={tooltip:{trigger:"axis",axisPointer:{type:"shadow"}},legend:{textStyle:{color:"#858d98"}},grid:{left:"0%",right:"4%",bottom:"0%",containLabel:!0},xAxis:{type:"value",boundaryGap:[0,.01],axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},yAxis:{type:"category",data:["Brazil","Indonesia","USA","India","China","World"],axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},textStyle:{fontFamily:"Poppins, sans-serif"},color:h,series:[{name:"2011",type:"bar",data:[18203,23489,29034,104970,131744,630230]},{name:"2012",type:"bar",data:[19325,23438,31e3,121594,134141,681807]}]})&&n.setOption(I)}var f=a("chart-horizontal-bar-stacked");if(f){o=document.getElementById("chart-horizontal-bar-stacked"),n=echarts.init(o);(I={tooltip:{trigger:"axis",axisPointer:{type:"shadow"}},legend:{textStyle:{color:"#858d98"}},grid:{left:"1%",right:"3%",bottom:"0%",containLabel:!0},xAxis:{type:"value",axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},color:f,yAxis:{type:"category",data:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},textStyle:{fontFamily:"Poppins, sans-serif"},series:[{name:"Direct",type:"bar",stack:"total",label:{show:!0},emphasis:{focus:"series"},data:[320,302,301,334,390,330,320]},{name:"Mail Ad",type:"bar",stack:"total",label:{show:!0},emphasis:{focus:"series"},data:[120,132,101,134,90,230,210]},{name:"Affiliate Ad",type:"bar",stack:"total",label:{show:!0},emphasis:{focus:"series"},data:[220,182,191,234,290,330,310]},{name:"Video Ad",type:"bar",stack:"total",label:{show:!0},emphasis:{focus:"series"},data:[150,212,201,154,190,330,410]},{name:"Search Engine",type:"bar",stack:"total",label:{show:!0},emphasis:{focus:"series"},data:[820,832,901,934,1290,1330,1320]}]})&&n.setOption(I)}var b=a("chart-pie");if(b){o=document.getElementById("chart-pie"),n=echarts.init(o);(I={tooltip:{trigger:"item"},legend:{orient:"vertical",left:"left",textStyle:{color:"#858d98"}},color:b,series:[{name:"Access From",type:"pie",radius:"50%",data:[{value:1048,name:"Search Engine"},{value:735,name:"Direct"},{value:580,name:"Email"},{value:484,name:"Union Ads"},{value:300,name:"Video Ads"}],emphasis:{itemStyle:{shadowBlur:10,shadowOffsetX:0,shadowColor:"rgba(0, 0, 0, 0.5)"}}}],textStyle:{fontFamily:"Poppins, sans-serif"}})&&n.setOption(I)}var S=a("chart-doughnut");if(S){o=document.getElementById("chart-doughnut"),n=echarts.init(o);(I={tooltip:{trigger:"item"},legend:{top:"5%",left:"center",textStyle:{color:"#858d98"}},color:S,series:[{name:"Access From",type:"pie",radius:["40%","70%"],avoidLabelOverlap:!1,label:{show:!1,position:"center"},emphasis:{label:{show:!0,fontSize:"16",fontWeight:"bold"}},labelLine:{show:!1},data:[{value:1048,name:"Search Engine"},{value:735,name:"Direct"},{value:580,name:"Email"},{value:484,name:"Union Ads"},{value:300,name:"Video Ads"}]}],textStyle:{fontFamily:"Poppins, sans-serif"}})&&n.setOption(I)}var x=a("chart-scatter");if(x){o=document.getElementById("chart-scatter"),n=echarts.init(o);(I={grid:{left:"1%",right:"0%",bottom:"0%",top:"2%",containLabel:!0},xAxis:{axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},yAxis:{axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},textStyle:{fontFamily:"Poppins, sans-serif"},series:[{symbolSize:12,data:[[10,8.04],[8.07,6.95],[13,7.58],[9.05,8.81],[11,8.33],[14,7.66],[13.4,6.81],[10,6.33],[14,8.96],[12.5,6.82],[9.15,7.2],[11.5,7.2],[3.03,4.23],[12.2,7.83],[2.02,4.47],[1.05,3.33],[4.05,4.96],[6.03,7.24],[12,6.26],[12,8.84],[7.08,5.82],[5.02,5.68]],type:"scatter"}],color:x})&&n.setOption(I)}var v=a("chart-candlestick");if(v){o=document.getElementById("chart-candlestick"),n=echarts.init(o);(I={grid:{left:"1%",right:"0%",bottom:"0%",top:"2%",containLabel:!0},xAxis:{data:["2017-10-24","2017-10-25","2017-10-26","2017-10-27"],axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},yAxis:{axisLine:{lineStyle:{color:"#858d98"}},splitLine:{lineStyle:{color:"rgba(133, 141, 152, 0.1)"}}},textStyle:{fontFamily:"Poppins, sans-serif"},series:[{type:"candlestick",data:[[20,34,10,38],[40,35,30,50],[31,38,33,44],[38,15,5,42]],itemStyle:{normal:{color:v[0],color0:v[1],borderColor:v[0],borderColor0:v[1]}}}]})&&n.setOption(I)}var L=a("chart-graph");if(L){o=document.getElementById("chart-graph"),n=echarts.init(o);(I={tooltip:{},animationDurationUpdate:1500,animationEasingUpdate:"quinticInOut",color:L,series:[{type:"graph",layout:"none",symbolSize:50,roam:!0,label:{show:!0},edgeSymbol:["circle","arrow"],edgeSymbolSize:[4,10],edgeLabel:{fontSize:20},data:[{name:"Node 1",x:300,y:300},{name:"Node 2",x:800,y:300},{name:"Node 3",x:550,y:100},{name:"Node 4",x:550,y:500}],links:[{source:0,target:1,symbolSize:[5,20],label:{show:!0},lineStyle:{width:5,curveness:.2}},{source:"Node 2",target:"Node 1",label:{show:!0},lineStyle:{curveness:.2}},{source:"Node 1",target:"Node 3"},{source:"Node 2",target:"Node 3"},{source:"Node 2",target:"Node 4"},{source:"Node 1",target:"Node 4"}],lineStyle:{opacity:.9,width:2,curveness:0}}],textStyle:{fontFamily:"Poppins, sans-serif"}})&&n.setOption(I)}var A=a("chart-treemap");if(A){o=document.getElementById("chart-treemap"),n=echarts.init(o);(I={color:A,series:[{type:"treemap",data:[{name:"nodeA",value:10,children:[{name:"nodeAa",value:4},{name:"nodeAb",value:6}]},{name:"nodeB",value:20,children:[{name:"nodeBa",value:20,children:[{name:"nodeBa1",value:20}]}]}]}],textStyle:{fontFamily:"Poppins, sans-serif"}})&&n.setOption(I)}var k=a("chart-sunburst");if(k){o=document.getElementById("chart-sunburst"),n=echarts.init(o);(I={color:k,series:{type:"sunburst",data:[{name:"Grandpa",children:[{name:"Uncle Leo",value:15,children:[{name:"Cousin Jack",value:2},{name:"Cousin Mary",value:5,children:[{name:"Jackson",value:2}]},{name:"Cousin Ben",value:4}]},{name:"Father",value:10,children:[{name:"Me",value:5},{name:"Brother Peter",value:1}]}]},{name:"Nancy",children:[{name:"Uncle Nike",children:[{name:"Cousin Betty",value:1},{name:"Cousin Jenny",value:2}]}]}],radius:[0,"90%"],label:{rotate:"radial"}},textStyle:{fontFamily:"Poppins, sans-serif"}})&&n.setOption(I)}var w=a("chart-parallel");if(w){o=document.getElementById("chart-parallel"),n=echarts.init(o);(I={parallelAxis:[{dim:0,name:"Price"},{dim:1,name:"Net Weight"},{dim:2,name:"Amount"},{dim:3,name:"Score",type:"category",data:["Excellent","Good","OK","Bad"]}],grid:{left:"0%",right:"0%",bottom:"0%",top:"2%",containLabel:!0},color:w,series:{type:"parallel",lineStyle:{width:4},data:[[12.99,100,82,"Good"],[9.99,80,77,"OK"],[20,120,60,"Excellent"]]},textStyle:{fontFamily:"Poppins, sans-serif"}})&&n.setOption(I)}var E=a("chart-sankey");if(E){o=document.getElementById("chart-sankey"),n=echarts.init(o);(I={color:E,series:{type:"sankey",layout:"none",emphasis:{focus:"adjacency"},data:[{name:"a"},{name:"b"},{name:"a1"},{name:"a2"},{name:"b1"},{name:"c"}],links:[{source:"a",target:"a1",value:5},{source:"a",target:"a2",value:3},{source:"b",target:"b1",value:8},{source:"a",target:"b1",value:3},{source:"b1",target:"a1",value:1},{source:"b1",target:"c",value:2}]},textStyle:{fontFamily:"Poppins, sans-serif"}})&&n.setOption(I)}var B=a("chart-sankey");if(B){o=document.getElementById("chart-funnel"),n=echarts.init(o);(I={tooltip:{trigger:"item",formatter:"{a} <br/>{b} : {c}%"},toolbox:{feature:{dataView:{readOnly:!1},restore:{},saveAsImage:{}}},legend:{data:["Show","Click","Visit","Inquiry","Order"],textStyle:{color:"#858d98"}},color:B,series:[{name:"Funnel",type:"funnel",left:"10%",top:60,bottom:60,width:"80%",min:0,max:100,minSize:"0%",maxSize:"100%",sort:"descending",gap:2,label:{show:!0,position:"inside"},labelLine:{length:10,lineStyle:{width:1,type:"solid"}},itemStyle:{borderColor:"#fff",borderWidth:1},emphasis:{label:{fontSize:20}},data:[{value:60,name:"Visit"},{value:40,name:"Inquiry"},{value:20,name:"Order"},{value:80,name:"Click"},{value:100,name:"Show"}]}],textStyle:{fontFamily:"Poppins, sans-serif"}})&&n.setOption(I)}var O=a("chart-gauge");if(O){o=document.getElementById("chart-gauge"),n=echarts.init(o);(I={tooltip:{formatter:"{a} <br/>{b} : {c}%"},color:O,textStyle:{fontFamily:"Poppins, sans-serif"},series:[{name:"Pressure",type:"gauge",progress:{show:!0},detail:{valueAnimation:!0,formatter:"{value}",color:"#858d98"},axisLabel:{color:"#858d98"},data:[{title:{color:"#858d98"},value:50,name:"SCORE"}]}]})&&n.setOption(I)}var F=a("chart-heatmap");if(F){var I;o=document.getElementById("chart-heatmap"),n=echarts.init(o);I={visualMap:{show:!1,min:0,max:1e4},calendar:{range:"2017"},color:F,textStyle:{fontFamily:"Poppins, sans-serif"},series:{type:"heatmap",coordinateSystem:"calendar",data:function(e){e=e||"2017";for(var t=+echarts.number.parseDate(e+"-01-01"),a=+echarts.number.parseDate(e+"-12-31"),i=[],o=t;o<=a;o+=864e5)i.push([echarts.format.formatTime("yyyy-MM-dd",o),Math.floor(1e4*Math.random())]);return i}("2017")}},I&&n.setOption(I)}})();