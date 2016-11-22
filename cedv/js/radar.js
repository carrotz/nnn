var series, 
    hours,
    minVal,
    maxVal,
    w = 940,
    h = 600,
    vizPadding = {
        top: 40,
        right: 0,
        bottom: 40,
        left: 0
    },
    radius,
    radiusLength,
    ruleColor = "#CCC";

var loadViz = function(){
  loadData();
  buildBase();
  setScales();
  addAxes();
  draw();
};

var loadData = function(){


    series = [
      [],
      []
    ];

    hours = [];
    //console.log(data_radar);
    for (i = 0; i < data_radar.length; i += 1) {
      //console.log(data_radar[i].count);
        series[0].push(data_radar[i].count);
        //series[1][i] = randomFromTo(5,15);
        hours[i] = i; //in case we want to do different formatting
    }
    //console.log(series[0]);
    mergedArr = series[0];

    minVal = d3.min(mergedArr);
    maxVal = d3.max(mergedArr);
    //give 25% of range as buffer to top
    maxVal = maxVal + ((maxVal - minVal) * 0.25);
    minVal = 0;

    //to complete the radial lines
    for (i = 0; i < series.length; i += 1) {
        series[i].push(series[i][0]);
    }
};

var buildBase = function(){
    var viz = d3.select("div#viz")
        .append('svg:svg')
        .attr('width', w)
        .attr('height', h)
        .attr('class', 'vizSvg');

    viz.append("svg:rect")
        .attr('id', 'axis-separator')
        .attr('x', 0)
        .attr('y', 0)
        .attr('height', 0)
        .attr('width', 0)
        .attr('height', 0);
    
    vizBody = viz.append("svg:g")
        .attr('id', 'body');
};

setScales = function () {
  var heightCircleConstraint,
      widthCircleConstraint,
      circleConstraint,
      centerXPos,
      centerYPos;

  //need a circle so find constraining dimension
  heightCircleConstraint = h - vizPadding.top - vizPadding.bottom;
  widthCircleConstraint = w - vizPadding.left - vizPadding.right;
  circleConstraint = d3.min([
      heightCircleConstraint, widthCircleConstraint]);

  radius = d3.scale.linear().domain([minVal, maxVal])
      .range([0, (circleConstraint / 2)]);
  radiusLength = radius(maxVal);

  //attach everything to the group that is centered around middle
  centerXPos = widthCircleConstraint / 2 + vizPadding.left;
  centerYPos = heightCircleConstraint / 2 + vizPadding.top;

  vizBody.attr("transform",
      "translate(" + centerXPos + ", " + centerYPos + ")");
};

addAxes = function () {
  var radialTicks = radius.ticks(5),
      i,
      circleAxes,
      lineAxes;

  vizBody.selectAll('.circle-ticks').remove();
  vizBody.selectAll('.line-ticks').remove();

  circleAxes = vizBody.selectAll('.circle-ticks')
      .data(radialTicks)
      .enter().append('svg:g')
      .attr("class", "circle-ticks");

  circleAxes.append("svg:circle")
      .attr("r", function (d, i) {
          return radius(d);
      })
      .attr("class", "circle")
      .style("stroke", ruleColor)
      .style("fill", "none");

  /*
  circleAxes.append("svg:text")
      .attr("text-anchor", "middle")
      .attr("dy", function (d) {
          return -1 * radius(d);
      })
      .text(String);
      */
 
      var ord = new Array();
      for(var i=0;i<data.length;i++){
        //console.log(data_radar[i].cname);
        ord.push(data_radar[i].cname);
      }
      //console.log(ord);
  lineAxes = vizBody.selectAll('.line-ticks')
      .data(ord)
      .enter().append('svg:g')
      .attr("transform", function (d, i) {
          return "rotate(" + ((i / ord.length * 360) - 90) +
              ")translate(" + radius(maxVal) + ")";
      })
      .attr("class", "line-ticks");

  lineAxes.append('svg:line')
      .attr("x2", -1 * radius(maxVal))
      .style("stroke", ruleColor)
      .style("fill", "none");

  lineAxes.append('svg:text')   //病名
      .text(String)
      .attr("text-anchor", "middle")
      .attr("transform", function (d, i) {
          return (i / ord.length * 360) < 180 ? null : "rotate(180)";
      })
      .style("font-family", "Arial,Microsoft Yahei")
      .style("font-size", "12px")
      .style("fill","#9a9a9a");
};

var draw = function () {
  var groups,
      lines,
      linesToUpdate;

  highlightedDotSize = 4;

  groups = vizBody.selectAll('.series')
      .data(series);
  groups.enter().append("svg:g")
      .attr('class', 'series')
      .style('fill', "#e4e6e9")
      .style('stroke', function (d, i) {
          if(i === 0){
            return "#e4e6e9";
          } else {
            return "blue";
          }
      });
  groups.exit().remove();
  //path
  lines = groups.append('svg:path')
      .attr("class", "line")
      /*.attr("d", d3.svg.line.radial()
          .radius(function (d,i) {
              return 0;
          })
          .angle(function (d, i) {
              if (i === 10) {
                  i = 0;
              } //close the line
              //console.log((i / 10) * 2 * Math.PI);
              return (i / 10) * 2 * Math.PI;
          }))*/
      //.style("stroke-width", 3)
      .style('fill', "rgba(66,132,226,0.1)")
      .on("mouseover", function(){
        d3.select(this).style("stroke","#4284e2").style("stroke-width", 3);
      })
      .on("mouseout", function(){
        d3.select(this).style("stroke","none");
      });



  groups.selectAll(".curr-point")
      .data(function (d) {
          //console.log(d[0]);
          return [d[0]];
      })
      .enter().append("svg:circle")
      .attr("class", "curr-point")
      .attr("r", 0);

  groups.selectAll(".clicked-point")
      .data(function (d) {
          return [d[0]];
      })
      .enter().append("svg:circle")
      .attr('r', 0)
      .attr("class", "clicked-point");

  lines.attr("d", d3.svg.line.radial()
      .radius(function (d) {
        //console.log(d);
          return radius(d);
      })
      .angle(function (d, i) {
          if (i === 10) {
              i = 0;
          } //close the line
          return (i / 10) * 2 * Math.PI;
      }));
};