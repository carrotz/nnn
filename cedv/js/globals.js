﻿var maxWidth=800;

var outerRadius = (maxWidth / 2),
    innerRadius = outerRadius - 100,
    monthWidth=Math.max(400,(innerRadius*2)-250);


var iText,iChords,eText,eChords;

var angleRange=320,
    baseYear=2007,
    maxMonth=1,
    //maxYear=12,
	maxYear=5,
    monthOffset=(monthWidth)/(maxYear*12+maxMonth),
    countries,
    e_labels=[],
    e_chords=[],
    i_labels=[],
    i_chords=[],
    topCountryCount=9,
    e_buf_indexByName={},
    e_indexByName = {},
    e_nameByIndex = {},
    i_indexByName = {},
    i_nameByIndex = {},
    i_buf_indexByName={},
    export_countries=[],
    import_countries=[],
    e_colorByName={},
    i_colorByName={},
    months=[],
    monthlyExports=[],
    monthlyImports=[],
    countriesGrouped,
    delay=1200,
    refreshIntervalId,
    year= 0,
    month=-1,
    running=true,
    formatNumber = d3.format(",.0f"),
    formatCurrency = function(d) { return formatNumber(d)},
    eTextUpdate,
    eChordUpdate,
    TextUpdate,
    iChordUpdate;

var toolTip = d3.select(document.getElementById("toolTip"));
var header = d3.select(document.getElementById("head"));
var header1 = d3.select(document.getElementById("header1"));
var header2 = d3.select(document.getElementById("header2"));

var e_fill= d3.scale.ordinal().range(["#00AC6B","#20815D","#007046","#35D699","#60D6A9"]);
var i_fill= d3.scale.ordinal().range(["#EF002A","#B32D45","#9B001C","#F73E5F","#F76F87"]);

var monthsMap=["Jan","Feb","Mar","Apr","May","Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];


/*
d3.select(document.getElementById("mainDiv"))
    .style("width",(outerRadius*2 + 200) + "px")
    .style("height",(outerRadius*2 + 200) + "px");

*/

d3.select(document.getElementById("bpg"));


var playPause=d3.select(document.getElementById("playPause"));



var svg = d3.select(document.getElementById("svgDiv"))
    .style("width", (outerRadius*2) + "px")
    .style("height", (outerRadius*2+200) + "px")
    .append("svg")
    .attr("id","svg")
    .style("width", (outerRadius*2) + "px")
    .style("height", (outerRadius*2+200) + "px");


var export_chord = d3.layout.arc_chord()
    .padding(.05)
    .sortSubgroups(d3.descending)
    .sortChords(d3.descending)
    .yOffsetFactor(-0.8);

var import_chord = d3.layout.arc_chord()
    .padding(.05)
    .yOffsetFactor(0.7)
    .sortSubgroups(d3.descending)
    .sortChords(d3.descending);

var arc = d3.svg.arc()
    .innerRadius(innerRadius)
    .outerRadius(innerRadius + 5);


var dGroup = svg.append("g")
    .attr("class","mainLabel")

dGroup.append("text")
    .attr("class","mainLabel")
    .attr("transform", "translate(" + (outerRadius + 13) + ","  + (outerRadius + 48) +")")
    .style("font-size","25px");
dGroup.append("text")
    .attr("class","mainLabel1")
    .attr("transform", "translate(" + (outerRadius - 90) + ","  + (outerRadius + 48) +")")
    .style("fill", "#888")
    .transition()
    .delay(delay)
    .text("当月总发病人数：");

dGroup.append("text")
    .attr("class","secondLabel")
    .attr("transform", "translate(" + (outerRadius - 180) + ","  + (outerRadius + 73) +")")
	.attr("fill", "rgb(136, 136, 136)")
    .text("*数据来源: 第二届“共享杯”大学生科技资源共享与服务创新实践竞赛")
    .style("font-size","0px");

var gY=(outerRadius-(innerRadius *.8/2));

gradientGroup =svg.append("g")
    .attr("class","gradient")
    .attr("transform","translate(" + (outerRadius-6) + "," + (gY+70)  + ")" );

gradientGroup.append("rect")
    .attr("height",((outerRadius + innerRadius *.7/2)-gY))
    .attr("width",0)
    .style("fill","url(#gradient1)");

var mGroup=svg.append("g")
    .attr("class","months")
    .attr("transform", "translate(" + outerRadius/2 + ",30)");

var eGroup=svg.append("g")
    .attr("class","exports")
    .attr("transform", "translate(" + outerRadius + "," + (outerRadius+70) + ")");

var iGroup=svg.append("g")
    .attr("class","imports")
    .attr("transform", "translate(" + outerRadius + "," + (outerRadius+70) + ")");