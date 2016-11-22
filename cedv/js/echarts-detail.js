var option_line1 = {
	color: [ '#79CDCD'],
	tooltip : {
		trigger: 'axis'
	},
	title : {
		text: title_name + '发病数',
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
		text: title_name + '相关趋势',
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
			data: data_sinomed
		},
		{
			name:'PubMed文献趋势',
			type:'line',
			data: data_pubmed
		},
		{
			name:'Google搜索趋势',
			type:'line',
			data: data_google
		},
		
		
	]
};

var option_line3 = {
	tooltip : {
		trigger: 'axis'
	},
	title : {
		text: title_name + '年龄别发病横断面',
		x : 'center'
	},
	legend: {
		data: ['2006','2007','2008','2009','2010','2011'],
		y :  'bottom'
	},
	toolbox: {
		show : true,
		orient : 'vertical',
		x: 430, 
		y: 'center',
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
			name: '年龄段',
			type : 'category',
			boundaryGap : false,
			data : ['0~19','20~39','40~59','60~79','80~99']
		}
	],
	yAxis : [
		{
			name: '发病数',
			type : 'value'
		}
	],
	series : [
		{
			name:'2006',
			type:'line',
			itemStyle: {normal: {areaStyle: {type: 'default'}}},
			data: data_cross[0]
		},
		{
			name:'2007',
			type:'line',
			itemStyle: {normal: {areaStyle: {type: 'default'}}},
			data: data_cross[1]
		},
		{
			name:'2008',
			type:'line',
			itemStyle: {normal: {areaStyle: {type: 'default'}}},
			data: data_cross[2]
		},
		{
			name:'2009',
			type:'line',
			itemStyle: {normal: {areaStyle: {type: 'default'}}},
			data: data_cross[3]
		},
		{
			name:'2010',
			type:'line',
			itemStyle: {normal: {areaStyle: {type: 'default'}}},
			data: data_cross[4]
		},
		{
			name:'2011',
			type:'line',
			itemStyle: {normal: {areaStyle: {type: 'default'}}},
			data: data_cross[5]
		}
		
	]
};
			

var option_line4 = {
	tooltip : {
		trigger: 'axis'
	},
	title : {
		text: title_name + '年龄别发病出生队列',
		x : 'center'
	},
	legend: {
		data: ['1900','1920','1940','1960','1980','2000'],
		y :  'bottom'
	},
	toolbox: {
		show : true,
		orient : 'vertical',
		x: 430, 
		y: 'center',
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
			name: '年龄段',
			type : 'category',
			boundaryGap : false,
			data : ['0~19','20~39','40~59','60~79','80~99']
		}
	],
	yAxis : [
		{
			name: '发病数',
			type : 'value'
		}
	],
	series : [
		{
			name:'1900',
			type:'line',
			data: data_birth[0]
		},
		{
			name:'1920',
			type:'line',
			data: data_birth[1]
		},
		{
			name:'1940',
			type:'line',
			data: data_birth[2]
		},
		{
			name:'1960',
			type:'line',
			data: data_birth[3]
		},
		{
			name:'1980',
			type:'line',
			data: data_birth[4]
		},
		{
			name:'2000',
			type:'line',
			data: data_birth[5]
		}
		
	]
};

// 为echarts对象加载数据 
var myChart1 = echarts.init(document.getElementById('detail_line')); 
myChart1.setOption(option_line1);
var myChart2 = echarts.init(document.getElementById('detail_line2'));
myChart2.setOption(option_line2);
myChart1.connect([myChart2]);
myChart2.connect([myChart1]);

var myChart3 = echarts.init(document.getElementById('detail_cross'));
myChart3.setOption(option_line3);
var myChart4 = echarts.init(document.getElementById('detail_birth'));
myChart4.setOption(option_line4);
myChart3.connect([myChart4]);
myChart4.connect([myChart3]);
