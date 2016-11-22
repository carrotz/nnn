
var option_map = {
	color:['#c051b7','#5180c0','#e6db5c'],
	title : {
		text: '中国人口出生期望寿命',
		subtext: '1990-2010年',
		x:'center',
		y: 'top'
    },
    tooltip : {
        trigger: 'item'
    },
    
    legend: {
        orient: 'vertical',
        x:'left',
        selected:{
            '2000年' : false,
            '2010年' : false
        },
        data:['1990年','2000年','2010年'],
        selectedMode:'single',
        color:['#00448a','#0580b9','#28c6b9','#84e6f1']
        //backgroundColor: 'rgba(178,34,34,0.8)'
    },
    
    dataRange: {
    	
    	  
        min: 55,
        max: 85,
        x: 'left',
        y: 'bottom',
        formatter : function(v) {
            return v + '~'  
        },
       
		    splitNumber:6,
		    color: ['#4a8c1c','#6dae58','#9ad16e','#fb7965','#df4e34','#bd1100']
		  
    },
    toolbox: {
        show: true,
        orient : 'vertical',
        x: 'right',
        y: 'center',
        feature : {
            dataView : {show: true, readOnly: false},
            restore : {show: true},
            saveAsImage : {show: true},
            
        }
    },
    series : [
        {
			mapValueCalculation:'average',
			mapValuePrecision: 2,
            name: '1990年',
            type: 'map',
            mapType: 'china',
            roam: false,
            itemStyle:{
                normal:{label:{show:true}},
                emphasis:{label:{show:true}}
            },
            data:[
				{name: '北京',value: 72.86},
				{name: '天津',value: 72.32},
				{name: '河北',value: 70.35},
				{name: '山西',value: 68.97},
				{name: '内蒙古',value: 65.68},
				{name: '辽宁',value: 70.22},
				{name: '吉林',value: 67.95},
				{name: '黑龙江',value: 66.97},
				{name: '上海',value: 74.90},
				{name: '江苏',value: 71.37},
				{name: '浙江',value: 71.38},
				{name: '安徽',value: 69.48},
				{name: '福建',value: 68.57},
				{name: '江西',value: 66.11},
				{name: '山东',value: 70.57},
				{name: '河南',value: 70.15},
				{name: '湖北',value: 67.25},
				{name: '湖南',value: 66.93},
				{name: '广东',value: 72.52},
				{name: '广西',value: 68.72},
				{name: '海南',value: 70.01},
				{name: '重庆',value: 66.33},
				{name: '四川',value: 66.33},
				{name: '贵州',value: 64.29},
				{name: '云南',value: 63.49},
				{name: '西藏',value: 59.64},
				{name: '陕西',value: 67.40},
				{name: '甘肃',value: 67.24},
				{name: '青海',value: 60.57},
				{name: '宁夏',value: 66.94},
				{name: '新疆',value: 63.59}
            ]
        },
        {
			mapValueCalculation:'average',
			mapValuePrecision: 2,
            name: '2000年',
            type: 'map',
            mapType: 'china',
            roam: false,
            itemStyle:{
                normal:{label:{show:true}},
                emphasis:{label:{show:true}}
            },
            data:[
                {name: '北京',value: 76.10},
				{name: '天津',value: 74.91},
				{name: '河北',value: 72.54},
				{name: '山西',value: 71.65},
				{name: '内蒙古',value: 69.87},
				{name: '辽宁',value: 73.34},
				{name: '吉林',value: 73.10},
				{name: '黑龙江',value: 72.37},
				{name: '上海',value: 78.14},
				{name: '江苏',value: 73.91},
				{name: '浙江',value: 74.70},
				{name: '安徽',value: 71.85},
				{name: '福建',value: 72.55},
				{name: '江西',value: 68.95},
				{name: '山东',value: 73.92},
				{name: '河南',value: 71.54},
				{name: '湖北',value: 71.08},
				{name: '湖南',value: 70.66},
				{name: '广东',value: 73.27},
				{name: '广西',value: 71.29},
				{name: '海南',value: 72.92},
				{name: '重庆',value: 71.73},
				{name: '四川',value: 71.20},
				{name: '贵州',value: 65.96},
				{name: '云南',value: 65.49},
				{name: '西藏',value: 64.37},
				{name: '陕西',value: 70.07},
				{name: '甘肃',value: 67.47},
				{name: '青海',value: 66.03},
				{name: '宁夏',value: 70.17},
				{name: '新疆',value: 67.41}	
            ]
        },
		{
			mapValueCalculation:'average',
			mapValuePrecision: 2,
            name: '2010年',
            type: 'map',
            mapType: 'china',
            roam: false,
            itemStyle:{
                normal:{label:{show:true}},
                emphasis:{label:{show:true}}
            },
            data:[
				{name: '北京',value: 80.18},
				{name: '天津',value: 78.89},
				{name: '河北',value: 74.97},
				{name: '山西',value: 74.92},
				{name: '内蒙古',value: 74.44},
				{name: '辽宁',value: 76.38},
				{name: '吉林',value: 76.18},
				{name: '黑龙江',value: 75.98},
				{name: '上海',value: 80.26},
				{name: '江苏',value: 76.63},
				{name: '浙江',value: 77.73},
				{name: '安徽',value: 75.08},
				{name: '福建',value: 75.76},
				{name: '江西',value: 74.33},
				{name: '山东',value: 76.46},
				{name: '河南',value: 74.57},
				{name: '湖北',value: 74.87},
				{name: '湖南',value: 74.70},
				{name: '广东',value: 76.49},
				{name: '广西',value: 75.11},
				{name: '海南',value: 76.30},
				{name: '重庆',value: 75.70},
				{name: '四川',value: 74.75},
				{name: '贵州',value: 71.10},
				{name: '云南',value: 69.54},
				{name: '西藏',value: 68.17},
				{name: '陕西',value: 74.68},
				{name: '甘肃',value: 72.23},
				{name: '青海',value: 69.96},
				{name: '宁夏',value: 73.38},
				{name: '新疆',value: 72.35}
            ]
        }
    ]
};

// 为echarts对象加载数据 
var myChart_map = echarts.init(document.getElementById('map_chart'));
myChart_map.setOption(option_map); 


option_bar = {
    timeline:{
        data:[
            '1990-01-01','2000-01-01','2010-01-01'
        ],
        label : {
            formatter : function(s) {
                return s.slice(0, 4);
            }
        },
        autoPlay : true,
        playInterval : 3000
    },
    options:[
        {
            title : {
                'text':'中国人口出生期望寿命性别对比',
                'subtext':'1990年',
				'x': 'center'
            },
            tooltip : {'trigger':'axis'},
            legend : {
                x:'right',
                'data':['男','女'],
                'selected':{
                    '男':true,
                    '女':true,
                }
            },
            toolbox : {
                'show':true, 
                orient : 'vertical',
                x: 'right', 
                y: 'center',
                'feature':{
                	  'mark' : {
					                show : true,
					                title : {
					                    mark : '辅助线-开关',
					                    markUndo : '辅助线-删除',
					                    markClear : '辅助线-清空'
					                },
					                lineStyle : {
					                    width : 1,
					                    color : '#1e90ff',
					                    type : 'dashed'
					                }
					            },
                    'dataView':{'show':true,'readOnly':false},
                    'magicType' : {show: true, type: ['line', 'bar']},
                    'restore':{'show':true},
                    'saveAsImage':{'show':true}
                }
            },
            calculable : true,
            grid : {
				height: 250
			},
            xAxis : [{
				'type':'category',
                'axisLabel':{'interval':0},
                'data':[
                    '北京','\n天津','河北','\n山西','内蒙古','\n辽宁','吉林','\n黑龙江',
                    '上海','\n江苏','浙江','\n安徽','福建','\n江西','山东','\n河南',
                    '湖北','\n湖南','广东','\n广西','海南','\n重庆','四川','\n贵州',
                    '云南','\n西藏','陕西','\n甘肃','青海','\n宁夏','新疆'
                ]
            }],
            yAxis : [
                {
                    'type':'value',
                    'name':'寿命',
					'min': 55,
                    'max':85
                }
            ],
            series : [
                {
                    'name':'男',
                    'type':'bar',
					itemStyle:{
						normal:{color:'#5ca0e6'}
					},
                    'data': [
						{name: '北京',value: 71.07},
						{name: '天津',value: 71.03},
						{name: '河北',value: 68.47},
						{name: '山西',value: 67.33},
						{name: '内蒙古',value: 64.47},
						{name: '辽宁',value: 68.72},
						{name: '吉林',value: 66.65},
						{name: '黑龙江',value: 65.50},
						{name: '上海',value: 72.77},
						{name: '江苏',value: 69.26},
						{name: '浙江',value: 69.66},
						{name: '安徽',value: 67.75},
						{name: '福建',value: 66.49},
						{name: '江西',value: 64.87},
						{name: '山东',value: 68.64},
						{name: '河南',value: 67.96},
						{name: '湖北',value: 65.51},
						{name: '湖南',value: 65.41},
						{name: '广东',value: 69.71},
						{name: '广西',value: 67.17},
						{name: '海南',value: 66.93},
						{name: '重庆',value: 65.06},
						{name: '四川',value: 65.06},
						{name: '贵州',value: 63.04},
						{name: '云南',value: 62.08},
						{name: '西藏',value: 57.64},
						{name: '陕西',value: 66.23},
						{name: '甘肃',value: 66.35},
						{name: '青海',value: 59.29},
						{name: '宁夏',value: 65.95},
						{name: '新疆',value: 61.95}
					]
                },
                {
                    'name':'女',
                    'type':'bar',
					itemStyle:{
						normal:{color:'#f598b2'}
					},
                    'data': [
						{name: '北京',value: 74.93},
						{name: '天津',value: 73.73},
						{name: '河北',value: 72.53},
						{name: '山西',value: 70.93},
						{name: '内蒙古',value: 67.22},
						{name: '辽宁',value: 71.94},
						{name: '吉林',value: 69.49},
						{name: '黑龙江',value: 68.73},
						{name: '上海',value: 77.02},
						{name: '江苏',value: 73.57},
						{name: '浙江',value: 74.24},
						{name: '安徽',value: 71.36},
						{name: '福建',value: 70.93},
						{name: '江西',value: 67.49},
						{name: '山东',value: 72.67},
						{name: '河南',value: 72.55},
						{name: '湖北',value: 69.23},
						{name: '湖南',value: 68.70},
						{name: '广东',value: 75.43},
						{name: '广西',value: 70.34},
						{name: '海南',value: 73.28},
						{name: '重庆',value: 67.70},
						{name: '四川',value: 67.70},
						{name: '贵州',value: 65.63},
						{name: '云南',value: 64.98},
						{name: '西藏',value: 61.57},
						{name: '陕西',value: 68.79},
						{name: '甘肃',value: 68.25},
						{name: '青海',value: 61.96},
						{name: '宁夏',value: 68.05},
						{name: '新疆',value: 63.26}
					]
                }
            ]
        },
		{
            title : {
                'text':'中国人口出生期望寿命性别对比',
                'subtext':'2000年',
				'x': 'center'
            },
            tooltip : {'trigger':'axis'},
            legend : {
                x:'right',
                'data':['男','女'],
                'selected':{
                    '男':true,
                    '女':true,
                }
            },
            toolbox : {
                'show':true, 
                orient : 'vertical',
                x: 'right', 
                y: 'center',
                'feature':{
                    'dataView':{'show':true,'readOnly':false},
                    'restore':{'show':true},
                    'saveAsImage':{'show':true}
                }
            },
            calculable : true,
            grid : {
				height: 250
			},
            xAxis : [{
				'type':'category',
                'axisLabel':{'interval':0},
                'data':[
                    '北京','\n天津','河北','\n山西','内蒙古','\n辽宁','吉林','\n黑龙江',
                    '上海','\n江苏','浙江','\n安徽','福建','\n江西','山东','\n河南',
                    '湖北','\n湖南','广东','\n广西','海南','\n重庆','四川','\n贵州',
                    '云南','\n西藏','陕西','\n甘肃','青海','\n宁夏','新疆'
                ]
            }],
            yAxis : [
                {
                    'type':'value',
                    'name':'寿命',
					'min': 55,
                    'max':85
                }
            ],
            series : [
                {
                    'name':'男',
                    'type':'bar',
					itemStyle:{
						normal:{color:'#5ca0e6'}
					},
                    'data': [
						{name: '北京',value: 74.33},
						{name: '天津',value: 73.31},
						{name: '河北',value: 70.68},
						{name: '山西',value: 69.96},
						{name: '内蒙古',value: 68.29},
						{name: '辽宁',value: 71.51},
						{name: '吉林',value: 71.38},
						{name: '黑龙江',value: 70.39},
						{name: '上海',value: 76.22},
						{name: '江苏',value: 71.69},
						{name: '浙江',value: 72.50},
						{name: '安徽',value: 70.18},
						{name: '福建',value: 70.30},
						{name: '江西',value: 68.37},
						{name: '山东',value: 71.70},
						{name: '河南',value: 69.67},
						{name: '湖北',value: 69.31},
						{name: '湖南',value: 69.05},
						{name: '广东',value: 70.79},
						{name: '广西',value: 69.07},
						{name: '海南',value: 70.66},
						{name: '重庆',value: 69.84},
						{name: '四川',value: 69.25},
						{name: '贵州',value: 64.54},
						{name: '云南',value: 64.24},
						{name: '西藏',value: 62.52},
						{name: '陕西',value: 68.92},
						{name: '甘肃',value: 66.77},
						{name: '青海',value: 64.55},
						{name: '宁夏',value: 68.71},
						{name: '新疆',value: 65.98}
					]
                },
                {
                    'name':'女',
                    'type':'bar',
					itemStyle:{
						normal:{color:'#f598b2'}
					},
                    'data': [
						{name: '北京',value: 78.01},
						{name: '天津',value: 76.63},
						{name: '河北',value: 74.57},
						{name: '山西',value: 73.57},
						{name: '内蒙古',value: 71.79},
						{name: '辽宁',value: 75.36},
						{name: '吉林',value: 75.04},
						{name: '黑龙江',value: 74.66},
						{name: '上海',value: 80.04},
						{name: '江苏',value: 76.23},
						{name: '浙江',value: 77.21},
						{name: '安徽',value: 73.59},
						{name: '福建',value: 75.07},
						{name: '江西',value: 69.32},
						{name: '山东',value: 76.26},
						{name: '河南',value: 73.41},
						{name: '湖北',value: 73.02},
						{name: '湖南',value: 72.47},
						{name: '广东',value: 75.93},
						{name: '广西',value: 73.75},
						{name: '海南',value: 75.26},
						{name: '重庆',value: 73.89},
						{name: '四川',value: 73.39},
						{name: '贵州',value: 67.57},
						{name: '云南',value: 66.89},
						{name: '西藏',value: 66.15},
						{name: '陕西',value: 71.30},
						{name: '甘肃',value: 68.26},
						{name: '青海',value: 67.70},
						{name: '宁夏',value: 71.84},
						{name: '新疆',value: 69.14}
					]
                }
            ]
        },
		{
            title : {
                'text':'中国人口出生期望寿命性别对比',
                'subtext':'2010年',
				'x': 'center'
            },
            tooltip : {'trigger':'axis'},
            legend : {
                x:'right',
                'data':['男','女'],
                'selected':{
                    '男':true,
                    '女':true,
                }
            },
            toolbox : {
                'show':true, 
                orient : 'vertical',
                x: 'right', 
                y: 'center',
                'feature':{
                    'dataView':{'show':true,'readOnly':false},
                    'restore':{'show':true},
                    'saveAsImage':{'show':true}
                }
            },
            calculable : true,
            grid : {
				height: 250
			},
            xAxis : [{
				'type':'category',
                'axisLabel':{'interval':0},
                'data':[
                    '北京','\n天津','河北','\n山西','内蒙古','\n辽宁','吉林','\n黑龙江',
                    '上海','\n江苏','浙江','\n安徽','福建','\n江西','山东','\n河南',
                    '湖北','\n湖南','广东','\n广西','海南','\n重庆','四川','\n贵州',
                    '云南','\n西藏','陕西','\n甘肃','青海','\n宁夏','新疆'
                ]
            }],
            yAxis : [
                {
                    'type':'value',
                    'name':'寿命',
					'min': 55,
                    'max':85
                }
            ],
            series : [
                {
                    'name':'男',
                    'type':'bar',
					itemStyle:{
						normal:{color:'#5ca0e6'}
					},
                    'data': [
						{name: '北京',value: 78.28},
						{name: '天津',value: 77.42},
						{name: '河北',value: 72.70},
						{name: '山西',value: 72.87},
						{name: '内蒙古',value: 72.04},
						{name: '辽宁',value: 74.12},
						{name: '吉林',value: 74.12},
						{name: '黑龙江',value: 73.52},
						{name: '上海',value: 78.20},
						{name: '江苏',value: 74.60},
						{name: '浙江',value: 75.58},
						{name: '安徽',value: 72.65},
						{name: '福建',value: 73.27},
						{name: '江西',value: 71.94},
						{name: '山东',value: 74.05},
						{name: '河南',value: 71.84},
						{name: '湖北',value: 72.68},
						{name: '湖南',value: 72.28},
						{name: '广东',value: 74.00},
						{name: '广西',value: 71.77},
						{name: '海南',value: 73.20},
						{name: '重庆',value: 73.16},
						{name: '四川',value: 72.25},
						{name: '贵州',value: 68.43},
						{name: '云南',value: 67.06},
						{name: '西藏',value: 66.33},
						{name: '陕西',value: 72.84},
						{name: '甘肃',value: 70.60},
						{name: '青海',value: 68.11},
						{name: '宁夏',value: 71.31},
						{name: '新疆',value: 70.30}
					]
                },
                {
                    'name':'女',
                    'type':'bar',
					itemStyle:{
						normal:{color:'#f598b2'}
					},
                    'data': [
						{name: '北京',value: 82.21},
						{name: '天津',value: 80.48},
						{name: '河北',value: 77.47},
						{name: '山西',value: 77.28},
						{name: '内蒙古',value: 77.27},
						{name: '辽宁',value: 78.86},
						{name: '吉林',value: 78.44},
						{name: '黑龙江',value: 78.81},
						{name: '上海',value: 82.44},
						{name: '江苏',value: 78.81},
						{name: '浙江',value: 80.21},
						{name: '安徽',value: 77.84},
						{name: '福建',value: 78.64},
						{name: '江西',value: 77.06},
						{name: '山东',value: 79.06},
						{name: '河南',value: 77.59},
						{name: '湖北',value: 77.35},
						{name: '湖南',value: 77.48},
						{name: '广东',value: 79.37},
						{name: '广西',value: 79.05},
						{name: '海南',value: 80.01},
						{name: '重庆',value: 78.60},
						{name: '四川',value: 77.59},
						{name: '贵州',value: 74.11},
						{name: '云南',value: 72.43},
						{name: '西藏',value: 70.07},
						{name: '陕西',value: 76.74},
						{name: '甘肃',value: 74.06},
						{name: '青海',value: 72.07},
						{name: '宁夏',value: 75.71},
						{name: '新疆',value: 74.86}
					]
                }
            ]
        }
    ]
};
                    
var myChart_bar = echarts.init(document.getElementById('bar_chart'));
myChart_bar.setOption(option_bar); 