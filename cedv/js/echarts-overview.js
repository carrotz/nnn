var option_radar = {
	tooltip : {
		trigger: 'axis',
		formatter: "{a} <br/>{b} : {c}%"
	},
	toolbox: {
		show : true,
		x : 350,
		feature : {
			dataView : {show: true, readOnly: true},
			restore : {show: true},
			saveAsImage : {show: true}
		}
	},
	polar : [
		{
			indicator : [
				{text : '食管恶性肿瘤', max  : 45},
				{text : '胃恶性肿瘤', max  : 25},
				{text : '支气管和肺\n恶性肿瘤', max  : 20},
				{text : '肝和肝内胆管\n恶性肿瘤', max  : 15},
				{text : '乳房恶性肿瘤', max  : 5},
				{text : '直肠恶性肿瘤', max  : 5},
				{text : '白血病', max  : 5},
				{text : '结肠恶性肿瘤', max  : 5},
				{text : '脑恶性肿瘤', max  : 5},
				{text : '宫颈恶性肿瘤', max  : 5}
			],
			radius : 120
		}
	],
	color: [ '#79CDCD'],
	series : [
		{
			type: 'radar',
			itemStyle: {
				normal: {
					areaStyle: {
						type: 'default'
					}
				}
			},
			data : [
				{
					value : radar_value,
					name : '肿瘤发病率'
				},
			]
		}
	]
};



var option_line1 = {
	color: [ '#79CDCD'],
	tooltip : {
		trigger: 'axis'
	},
	title : {
		text: '肿瘤发病数',
		subtext: '数据来源：第二届“共享杯”大学生科技资源共享与服务创新实践竞赛',
		x : 'center'
	},
	toolbox: {
		show : true,
		x: 800,
		feature : {
			//mark : {show: true},
			dataView : {show: true, readOnly: false},
			//magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
			restore : {show: true},
			saveAsImage : {show: true}
		}
	},
	xAxis : [
		{
			name: '时间',
			type : 'category',
			boundaryGap : false,
			data : ['2006','2007','2008','2009','2010','2011']
		}
	],
	yAxis : [
		{
			name: '数量',
			type : 'value'
		}
	],
	series : [
		{
			name:'整体发病数',
			type:'line',
			data:[data_sum.y06,data_sum.y07,data_sum.y08,data_sum.y09,data_sum.y10,data_sum.y11]
		}
	]
};
	
var option_line2 = {
	tooltip : {
		trigger: 'axis'
	},
	title : {
		text: '肿瘤相关趋势',
		subtext: '数据来源: Google Trends / PubMed / SinoMed',
		x : 'center'
	},
	legend: {
		data: ['Google搜索趋势', 'PubMed文献趋势', 'SinoMed文献趋势'],
		y :  'bottom'
	},
	toolbox: {
		show : true,
		x: 800,
		feature : {
			//mark : {show: true},
			dataView : {show: true, readOnly: false},
			//magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
			restore : {show: true},
			saveAsImage : {show: true}
		}
	},
	xAxis : [
		{
			name: '时间',
			type : 'category',
			boundaryGap : false,
			data : ['2006','2007','2008','2009','2010','2011']
		}
	],
	yAxis : [
		{
			name: '数量',
			type : 'value'
		}
	],
	series : [
		{
			name:'SinoMed文献趋势',
			type:'line',
			data:[93139, 91473, 92616, 97035, 113348, 115717]
		},
		{
			name:'PubMed文献趋势',
			type:'line',
			data:[149773, 156192, 160878, 167647, 177267, 184328]
		},
		{
			name:'Google搜索趋势',
			type:'line',
			data:[10869, 172179, 179716, 194917, 195051, 199772]
		},
		
		
	]
};

var idx = 1;
option_pie = {
	
    timeline : {
		autoPlay: true,
        data : [
            '2006','2007','2008',
			'2009','2010','2011'
        ],
        label : {
            formatter : function(s) {
                return s.slice(0, 5);
            }
        }
    },
    options : [
        {
            title : {
				text: '2006年',
				x:'center',
				y:190
			},
			tooltip : {
				trigger: 'item',
				formatter: "{a} <br/>{b} : {c}%"
			},
			toolbox: {
				show : true,
				x: 'right', 
				y: 'top',
				orient : 'horizontal',
				feature : {
					dataView : {show: true, readOnly: false},
					restore : {show: true},
					saveAsImage : {show: true}
				}
			},
			legend: {
				data: [	data_pie[0][0].cname, data_pie[0][1].cname,
						data_pie[0][2].cname, data_pie[0][3].cname,
						data_pie[0][4].cname, data_pie[0][5].cname,
						data_pie[0][6].cname, data_pie[0][7].cname,
						data_pie[0][8].cname, '其他'],
				orient : 'vertical',
				x : 'right',
				y : 70
			},
			color: [ 	'#0083f9', '#d96a4e', '#7fd3c3', '#f8b44f', '#ff9899', 
						'#cb99cc', '#ff9934', '#999999', '#69a067', '#BB8C44' ],
			series : [
				{
					name:'2006年发病率',
					type:'pie',
					radius : ['30%', '60%'],
					center : ['50%', '45%'],
					selectedMode: 'single',
					clockWise : true,
					itemStyle : {
						normal : {
							label : {
								show : true
							},
							labelLine : {
								show : true
							}
						},
					},
					data:[
						{value:data_pie[0][0].num, name:data_pie[0][0].cname},
						{value:data_pie[0][1].num, name:data_pie[0][1].cname},
						{value:data_pie[0][2].num, name:data_pie[0][2].cname},
						{value:data_pie[0][3].num, name:data_pie[0][3].cname},
						{value:data_pie[0][4].num, name:data_pie[0][4].cname},
						{value:data_pie[0][5].num, name:data_pie[0][5].cname},
						{value:data_pie[0][6].num, name:data_pie[0][6].cname},
						{value:data_pie[0][7].num, name:data_pie[0][7].cname},
						{value:data_pie[0][8].num, name:data_pie[0][8].cname},
						{value:data_else[0], name:'其他'}
					]
				}
			]
        },
        {
            title : {
				text: '2007',
				x:'center',
				y: 190
			},
			tooltip : {
				trigger: 'item',
				formatter: "{a} <br/>{b} : {c}%"
			},
			toolbox: {
				show : true,
				orient : 'horizontal',
				x: 'right', 
				y: 'top',
				feature : {
					dataView : {show: true, readOnly: false},
					restore : {show: true},
					saveAsImage : {show: true}
				}
			},
			legend: {
				data: [	data_pie[1][0].cname, data_pie[1][1].cname,
						data_pie[1][2].cname, data_pie[1][3].cname,
						data_pie[1][4].cname, data_pie[1][5].cname,
						data_pie[1][6].cname, data_pie[1][7].cname,
						data_pie[1][8].cname, '其他'],
				orient : 'vertical',
				x : 'right',
				y : 70
			},
			color: [ 	'#0083f9', '#d96a4e', '#7fd3c3', '#f8b44f', '#ff9899', 
						'#cb99cc', '#ff9934', '#999999', '#69a067', '#BB8C44' ],
			series : [
				{
					name:'2007年发病率',
					type:'pie',
					radius : ['30%', '60%'],
					center : ['50%', '45%'],
					selectedMode: 'single',
					clockWise : true,
					itemStyle : {
						normal : {
							label : {
								show : true
							},
							labelLine : {
								show : true
							}
						},
					},
					data:[
						{value:data_pie[1][0].num, name:data_pie[1][0].cname},
						{value:data_pie[1][1].num, name:data_pie[1][1].cname},
						{value:data_pie[1][2].num, name:data_pie[1][2].cname},
						{value:data_pie[1][3].num, name:data_pie[1][3].cname},
						{value:data_pie[1][4].num, name:data_pie[1][4].cname},
						{value:data_pie[1][5].num, name:data_pie[1][5].cname},
						{value:data_pie[1][6].num, name:data_pie[1][6].cname},
						{value:data_pie[1][7].num, name:data_pie[1][7].cname},
						{value:data_pie[1][8].num, name:data_pie[1][8].cname},
						{value:data_else[1], name:'其他'}
					]
				}
			]
        },
        {
            title : {
				text: '2008',
				x:'center',
				y: 190
			},
			tooltip : {
				trigger: 'item',
				formatter: "{a} <br/>{b} : {c}%"
			},
			toolbox: {
				show : true,
				orient : 'horizontal',
				x: 'right', 
				y: 'top',
				feature : {
					dataView : {show: true, readOnly: false},
					restore : {show: true},
					saveAsImage : {show: true}
				}
			},
			legend: {
				data: [	data_pie[2][0].cname, data_pie[2][1].cname,
						data_pie[2][2].cname, data_pie[2][3].cname,
						data_pie[2][4].cname, data_pie[2][5].cname,
						data_pie[2][6].cname, data_pie[2][7].cname,
						data_pie[2][8].cname, '其他'],
				orient : 'vertical',
				x : 'right',
				y : 70
			},
			color: [ 	'#0083f9', '#d96a4e', '#7fd3c3', '#f8b44f', '#ff9899', 
						'#cb99cc', '#ff9934', '#999999', '#69a067', '#BB8C44' ],
			series : [
				{
					name:'2008年发病率',
					type:'pie',
					radius : ['30%', '60%'],
					center : ['50%', '45%'],
					selectedMode: 'single',
					clockWise : true,
					itemStyle : {
						normal : {
							label : {
								show : true
							},
							labelLine : {
								show : true
							}
						},
					},
					data:[
						{value:data_pie[2][0].num, name:data_pie[2][0].cname},
						{value:data_pie[2][1].num, name:data_pie[2][1].cname},
						{value:data_pie[2][2].num, name:data_pie[2][2].cname},
						{value:data_pie[2][3].num, name:data_pie[2][3].cname},
						{value:data_pie[2][4].num, name:data_pie[2][4].cname},
						{value:data_pie[2][5].num, name:data_pie[2][5].cname},
						{value:data_pie[2][6].num, name:data_pie[2][6].cname},
						{value:data_pie[2][7].num, name:data_pie[2][7].cname},
						{value:data_pie[2][8].num, name:data_pie[2][8].cname},
						{value:data_else[2], name:'其他'}
					]
				}
			]
        },
        {
            title : {
				text: '2009',
				x:'center',
				y: 190
			},
			tooltip : {
				trigger: 'item',
				formatter: "{a} <br/>{b} : {c}%"
			},
			toolbox: {
				show : true,
				orient : 'horizontal',
				x: 'right', 
				y: 'top',
				feature : {
					dataView : {show: true, readOnly: false},
					restore : {show: true},
					saveAsImage : {show: true}
				}
			},
			legend: {
				data: [	data_pie[3][0].cname, data_pie[3][1].cname,
						data_pie[3][2].cname, data_pie[3][3].cname,
						data_pie[3][4].cname, data_pie[3][5].cname,
						data_pie[3][6].cname, data_pie[3][7].cname,
						data_pie[3][8].cname, '其他'],
				orient : 'vertical',
				x : 'right',
				y : 70
			},
			color: [ 	'#0083f9', '#d96a4e', '#7fd3c3', '#f8b44f', '#ff9899', 
						'#cb99cc', '#ff9934', '#999999', '#69a067', '#BB8C44' ],
			series : [
				{
					name:'2009年发病率',
					type:'pie',
					radius : ['30%', '60%'],
					center : ['50%', '45%'],
					selectedMode: 'single',
					clockWise : true,
					itemStyle : {
						normal : {
							label : {
								show : true
							},
							labelLine : {
								show : true
							}
						},
					},
					data:[
						{value:data_pie[3][0].num, name:data_pie[3][0].cname},
						{value:data_pie[3][1].num, name:data_pie[3][1].cname},
						{value:data_pie[3][2].num, name:data_pie[3][2].cname},
						{value:data_pie[3][3].num, name:data_pie[3][3].cname},
						{value:data_pie[3][4].num, name:data_pie[3][4].cname},
						{value:data_pie[3][5].num, name:data_pie[3][5].cname},
						{value:data_pie[3][6].num, name:data_pie[3][6].cname},
						{value:data_pie[3][7].num, name:data_pie[3][7].cname},
						{value:data_pie[3][8].num, name:data_pie[3][8].cname},
						{value:data_else[3], name:'其他'}
					]
				}
			]
        },
        {
            title : {
				text: '2010',
				x:'center',
				y: 190
			},
			tooltip : {
				trigger: 'item',
				formatter: "{a} <br/>{b} : {c}%"
			},
			toolbox: {
				show : true,
				orient : 'horizontal',
				x: 'right', 
				y: 'top',
				feature : {
					dataView : {show: true, readOnly: false},
					restore : {show: true},
					saveAsImage : {show: true}
				}
			},
			legend: {
				data: [	data_pie[4][0].cname, data_pie[4][1].cname,
						data_pie[4][2].cname, data_pie[4][3].cname,
						data_pie[4][4].cname, data_pie[4][5].cname,
						data_pie[4][6].cname, data_pie[4][7].cname,
						data_pie[4][8].cname, '其他'],
				orient : 'vertical',
				x : 'right',
				y : 70
			},
			color: [ 	'#0083f9', '#d96a4e', '#7fd3c3', '#f8b44f', '#ff9899', 
						'#cb99cc', '#ff9934', '#999999', '#69a067', '#BB8C44' ],
			series : [
				{
					name:'2010年发病率',
					type:'pie',
					radius : ['30%', '60%'],
					center : ['50%', '45%'],
					selectedMode: 'single',
					clockWise : true,
					itemStyle : {
						normal : {
							label : {
								show : true
							},
							labelLine : {
								show : true
							}
						},
					},
					data:[
						{value:data_pie[4][0].num, name:data_pie[4][0].cname},
						{value:data_pie[4][1].num, name:data_pie[4][1].cname},
						{value:data_pie[4][2].num, name:data_pie[4][2].cname},
						{value:data_pie[4][3].num, name:data_pie[4][3].cname},
						{value:data_pie[4][4].num, name:data_pie[4][4].cname},
						{value:data_pie[4][5].num, name:data_pie[4][5].cname},
						{value:data_pie[4][6].num, name:data_pie[4][6].cname},
						{value:data_pie[4][7].num, name:data_pie[4][7].cname},
						{value:data_pie[4][8].num, name:data_pie[4][8].cname},
						{value:data_else[4], name:'其他'}
					]
				}
			]
        },
        {
            title : {
				text: '2011',
				x:'center',
				y: 190
			},
			tooltip : {
				trigger: 'item',
				formatter: "{a} <br/>{b} : {c}%"
			},
			toolbox: {
				show : true,
				orient : 'horizontal',
				x: 'right', 
				y: 'top',
				feature : {
					dataView : {show: true, readOnly: false},
					restore : {show: true},
					saveAsImage : {show: true}
				}
			},
			legend: {
				data: [	data_pie[5][0].cname, data_pie[5][1].cname,
						data_pie[5][2].cname, data_pie[5][3].cname,
						data_pie[5][4].cname, data_pie[5][5].cname,
						data_pie[5][6].cname, data_pie[5][7].cname,
						data_pie[5][8].cname, '其他'],
				orient : 'vertical',
				x : 'right',
				y : 70
			},
			color: [ 	'#0083f9', '#d96a4e', '#7fd3c3', '#f8b44f', '#ff9899', 
						'#cb99cc', '#ff9934', '#999999', '#69a067', '#BB8C44' ],
			series : [
				{
					name:'2011年发病率',
					type:'pie',
					radius : ['30%', '60%'],
					center : ['50%', '45%'],
					selectedMode: 'single',
					clockWise : true,
					itemStyle : {
						normal : {
							label : {
								show : true
							},
							labelLine : {
								show : true
							}
						},
					},
					data:[
						{value:data_pie[5][0].num, name:data_pie[5][0].cname},
						{value:data_pie[5][1].num, name:data_pie[5][1].cname},
						{value:data_pie[5][2].num, name:data_pie[5][2].cname},
						{value:data_pie[5][3].num, name:data_pie[5][3].cname},
						{value:data_pie[5][4].num, name:data_pie[5][4].cname},
						{value:data_pie[5][5].num, name:data_pie[5][5].cname},
						{value:data_pie[5][6].num, name:data_pie[5][6].cname},
						{value:data_pie[5][7].num, name:data_pie[5][7].cname},
						{value:data_pie[5][8].num, name:data_pie[5][8].cname},
						{value:data_else[5], name:'其他'}
					]
				}
			]
        }
    ]
};

// 为echarts对象加载数据 
var myChart0 = echarts.init(document.getElementById('overview_Radar'));
myChart0.setOption(option_radar); 

var myChart1 = echarts.init(document.getElementById('overview_line')); 
myChart1.setOption(option_line1);
var myChart2 = echarts.init(document.getElementById('overview_line2'));
myChart2.setOption(option_line2);
myChart1.connect([myChart2]);
myChart2.connect([myChart1]);

var myChart4 = echarts.init(document.getElementById('overview_pie'));
myChart4.setOption(option_pie); 
