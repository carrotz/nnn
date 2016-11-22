<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>科技投入-医院科技影响力评价 数据核对系统</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="/top100_data_check/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/top100_data_check/Public/assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="/top100_data_check/Public/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        
        <!-- page specific plugin styles -->
        
    <link rel="stylesheet" href="/top100_data_check/Public/assets/css/jquery-ui-1.10.3.full.min.css" />
    <link rel="stylesheet" href="/top100_data_check/Public/assets/css/datepicker.css" />
    <link rel="stylesheet" href="/top100_data_check/Public/assets/css/ui.jqgrid.css" />	


		<!-- fonts -->

		<!-- ace styles -->

		<link rel="stylesheet" href="/top100_data_check/Public/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/top100_data_check/Public/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/top100_data_check/Public/assets/css/ace-skins.min.css" />
		
		<!-- admin styles -->
		<link rel="stylesheet" href="/top100_data_check/Public/assets/css/admin.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/top100_data_check/Public/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="/top100_data_check/Public/assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/top100_data_check/Public/assets/js/html5shiv.js"></script>
		<script src="/top100_data_check/Public/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							医院科技影响力评价-数据核对系统
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<i class="icon-user"></i>
								<span class="user-info">
									<small>欢迎光临,</small>
									<?php echo ($username); ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										修改密码
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo U('User/doLogout');?>">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
                                <a href="<?php echo U('Home/Index/index');?>" title="网站前台" class="sidebar-shortcuts-a"><i class="icon-home"></i></a>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li class="active" id="nav_0">
							<a href="<?php echo U('Home/Index/index');?>">
								<i class="icon-paste"></i>
								<span class="menu-text"> 说明 </span>
							</a>
						</li>
                        
                        
						
						<li id="nav_1">
							<a href="#" class="dropdown-toggle">
								<i class="icon-beaker"></i>
								<span class="menu-text"> 科技投入 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">

								<li id="nav_1_1">
									<a href="<?php echo U('Home/Part1/part_1_1');?>">
										<i class="icon-double-angle-right"></i>
										973项目和国家重大研究计划项目
									</a>
								</li>

								<li id="nav_1_2">
									<a href="<?php echo U('Home/Part1/part_1_2');?>">
										<i class="icon-double-angle-right"></i>
										863计划课题
									</a>
								</li>
                                   
                                <li id="nav_1_3">
									<a href="<?php echo U('Home/Part1/part_1_3');?>">
										<i class="icon-double-angle-right"></i>
										国家科技支撑计划课题
									</a>
								</li>
               
                               <li id="nav_1_4">
									<a href="<?php echo U('Home/Part1/part_1_4');?>">
										<i class="icon-double-angle-right"></i>
										国家自然科学基金项目
									</a>
								</li>
               
                                <li id="nav_1_5">
									<a href="<?php echo U('Home/Part1/part_1_5');?>">
										<i class="icon-double-angle-right"></i>
										国家级/部级重点实验室
									</a>
								</li>
               
                                <li id="nav_1_6">
									<a href="<?php echo U('Home/Part1/part_1_6');?>">
										<i class="icon-double-angle-right"></i>
										国家临床医学研究中心
									</a>
								</li>
               
                                <li id="nav_1_7">
									<a href="<?php echo U('Home/Part1/part_1_7');?>">
										<i class="icon-double-angle-right"></i>
										国家临床重点专科
									</a>
								</li>
               
                                <li id="nav_1_8">
									<a href="<?php echo U('Home/Part1/part_1_8');?>">
										<i class="icon-double-angle-right"></i>
										药物临床试验机构专业
									</a>
								</li>
                
								
							</ul>
						</li>
						
						<li id="nav_2">
							<a href="#" class="dropdown-toggle">
								<i class="icon-lightbulb"></i>
								<span class="menu-text"> 科技产出 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

                            <ul class="submenu">
                                <li id="nav_2_1">
									<a href="<?php echo U('Home/Part2/part_2_1');?>">
										<i class="icon-double-angle-right"></i>
										SCIE收录论文
									</a>
								</li>
               
                                <li id="nav_2_2">
									<a href="<?php echo U('Home/Part2/part_2_2');?>">
										<i class="icon-double-angle-right"></i>
										重要国际会议论文
									</a>
								</li>
               
                                <li id="nav_2_3">
									<a href="<?php echo U('Home/Part2/part_2_3');?>">
										<i class="icon-double-angle-right"></i>
										授权的发明专利
									</a>
								</li>
                            </ul>
                    
						</li>
						
						<li id="nav_3">
							<a href="#" class="dropdown-toggle">
								<i class="icon-book"></i>
								<span class="menu-text"> 学术影响 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">

								<li id="nav_3_1">
									<a href="<?php echo U('Home/Part3/part_3_1');?>">
										<i class="icon-double-angle-right"></i>
										两院院士
									</a>
								</li>

								<li id="nav_3_2">
									<a href="<?php echo U('Home/Part3/part_3_2');?>">
										<i class="icon-double-angle-right"></i>
										科技部科技创新领军人才
									</a>
								</li>
               
                                <li id="nav_3_3">
									<a href="<?php echo U('Home/Part3/part_3_3');?>">
										<i class="icon-double-angle-right"></i>
										长江学者
									</a>
								</li>
               
                                <li id="nav_3_4">
									<a href="<?php echo U('Home/Part3/part_3_4');?>">
										<i class="icon-double-angle-right"></i>
										千人计划学者
									</a>
								</li>
               
                                <li id="nav_3_5">
									<a href="<?php echo U('Home/Part3/part_3_5');?>">
										<i class="icon-double-angle-right"></i>
										青年千人计划学者
									</a>
								</li>
               
                                <li id="nav_3_6">
									<a href="<?php echo U('Home/Part3/part_3_6');?>">
										<i class="icon-double-angle-right"></i>
										国家杰出青年基金获得者
									</a>
								</li>
               
                                <li id="nav_3_7">
									<a href="<?php echo U('Home/Part3/part_3_7');?>">
										<i class="icon-double-angle-right"></i>
										优秀青年科学基金获得者
									</a>
								</li>
               
                               <li id="nav_3_8">
									<a href="<?php echo U('Home/Part3/part_3_8');?>">
										<i class="icon-double-angle-right"></i>
										教育部“创新团队发展计划”入选团队
									</a>
								</li>
               
                                <li id="nav_3_9">
									<a href="<?php echo U('Home/Part3/part_3_9');?>">
										<i class="icon-double-angle-right"></i>
										科技部重点领域创新团队
									</a>
								</li>
               
                                <li id="nav_3_10">
									<a href="<?php echo U('Home/Part3/part_3_10');?>">
										<i class="icon-double-angle-right"></i>
										国家自然科学基金创新研究群体
									</a>
								</li>
               
                                <li id="nav_3_11">
									<a href="<?php echo U('Home/Part3/part_3_11');?>">
										<i class="icon-double-angle-right"></i>
										国际重要检索系统收录的中国期刊任职
									</a>
								</li>
               
                                <li id="nav_3_12">
									<a href="<?php echo U('Home/Part3/part_3_12');?>">
										<i class="icon-double-angle-right"></i>
										国家级医学继续教育项目
									</a>
								</li>
               
                                <li id="nav_3_13">
									<a href="<?php echo U('Home/Part3/part_3_13');?>">
										<i class="icon-double-angle-right"></i>
										国家科技奖
									</a>
								</li>
               
                               <li id="nav_3_14">
									<a href="<?php echo U('Home/Part3/part_3_14');?>">
										<i class="icon-double-angle-right"></i>
										中华医学科技奖
									</a>
								</li>
                
								
							</ul>
						</li>
						
				        <?php if($_SESSION['mid']['usertype']== 0): ?><li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 系统管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo U('Home/User/userManage');?>">
										<i class="icon-double-angle-right"></i>
										用户管理
									</a>
								</li>

							</ul>
						</li><?php endif; ?>
						
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						
    <ul class="breadcrumb">
        <li>
            <i class="icon-beaker"></i>
            科技投入
        </li>
        <li class="active">863计划课题</li>
    </ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">
<div class="page-header">
    <h1>
        863计划课题列表
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <table id="grid-table"></table>

        <div id="grid-pager"></div>

        <script type="text/javascript">
            var $path_base = "/";//this will be used in gritter alerts containing images
        </script>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		
		<script type="text/javascript">
            function active_clean(){
                
                for(var i = 0;i < 3;i ++){
                    var str_id = "#nav_"+i;
                    $(str_id).removeClass("active");
                    for(var j = 1;j < 15;j ++){
                        str_id = "#nav_"+i+"_"+j;
                        $(str_id).removeClass("active");
                    }
                }
            }
        </script>

		<!--[if !IE]> -->

		<script src="/top100_data_check/Public/assets/js/jquery-2.0.3.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>

<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/top100_data_check/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/top100_data_check/Public/assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/top100_data_check/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="/top100_data_check/Public/assets/js/bootstrap.min.js"></script>
		<script src="/top100_data_check/Public/assets/js/typeahead-bs2.min.js"></script>
        <!-- page specific plugin scripts -->
        
    <script src="/top100_data_check/Public/assets/js/date-time/bootstrap-datepicker.min.js"></script>
    <script src="/top100_data_check/Public/assets/js/jqGrid/jquery.jqGrid.min.js"></script>
    <script src="/top100_data_check/Public/assets/js/jqGrid/i18n/grid.locale-en.js"></script>


		<!--[if lte IE 8]>
		  <script src="/top100_data_check/Public/assets/js/excanvas.min.js"></script>
		<![endif]-->

		
		<!-- ace scripts -->

		<script src="/top100_data_check/Public/assets/js/ace-elements.min.js"></script>
		<script src="/top100_data_check/Public/assets/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->
		

    <script type="text/javascript">
        
        
        jQuery(function($) {
            active_clean();
            $('#nav_1').addClass("active");
            $('#nav_1_2').addClass("active");
            
            var now_col = "";
            var grid_selector = "#grid-table";
            var pager_selector = "#grid-pager";

            jQuery(grid_selector).jqGrid({
                
                url:"<?php echo U('Home/Part1/getlist_1_2');?>",
                datatype: "json",
                mtype:"POST",
                height: 400,
                colNames:['编号','医院名称','课题编号','课题名称','项目名称','课题负责人','状态','校对信息'],
                colModel:[  {name:'id',index:'id',editable:false,align:'center',width:50},
                            {name:'hospname',index:'hospname',editable:false,align:'center'},
                            {name:'taskno',index:'taskno',editable:true,align:'center'},
                            {name:'taskname',index:'taskname',editable:true,align:'center',width:250},
                            {name:'projectname',index:'projectname',editable:true,align:'center'},
                            {name:'taskleader',index:'taskleader',editable:true,align:'center'},
                            {name:'status',index:'status', editable:false,align:"center",width:80},
                            {name:'remark',index:'remark',editable:false,align:'left'}], 

                viewrecords : true,
                rowNum:10,
                pgtext : "第 {0} 页 共 {1} 页",
                pager : pager_selector,
                //altRows: true,
                //toppager: true,

                multiselect: true,

                loadComplete : function() {
                    var table = this;
                    setTimeout(function(){
                        styleCheckbox(table);

                        updateActionIcons(table);
                        updatePagerIcons(table);
                        enableTooltips(table);
                    }, 0);
                },

                editurl: "<?php echo U('Home/Part1/edit_1_2');?>",
                autowidth: true
            });

           
            //navButtons           
            jQuery(grid_selector).jqGrid('navGrid',pager_selector,
                { 	//navbar options
                    edit: true,
                    editicon : 'icon-pencil blue',
                    edittitle: "编辑校对信息",
                    add: true,
                    addicon : 'icon-plus-sign purple',
                    addtitle:'添加校对信息',
                    del: true,
                    delicon : 'icon-trash red',
                    deltitle: "删除信息",
                    search: false,
                    refresh: true,
                    refreshicon : 'icon-refresh green',
                    refreshtitle: "刷新",
                    alertcap: "错误警告",
                    alerttext: "没有选择要操作的行！",
                
                },
                {
                    //edit record form
                    editCaption:"编辑校对信息",
                    bSubmit: "保存",
                    bCancel: "取消",
                    url:"<?php echo U('Home/Part1/edit_1_2');?>",
                    mtype:"POST",
                    closeAfterEdit: true,
                    recreateForm: true,
                    beforeShowForm : function(e) {
                        now_col = $(grid_selector).jqGrid('getGridParam','selrow');
                        
                        var form = $(e[0]);
                        
                        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                        style_edit_form(form);
                    },
                },                             
                {
                    //new record form
                    addCaption:"添加校对信息",
                    bSubmit: "添加",
                    bCancel: "取消",
                    url:"<?php echo U('Home/Part1/edit_1_2');?>",
                    closeAfterAdd: true,
                    recreateForm: true,
                    viewPagerButtons: false,
                    beforeShowForm : function(e) {
                        now_col = "";
                        var form = $(e[0]);
                        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                        style_edit_form(form);
                    }
                },
                {
                    //delete record form
                    caption: "删除条目",
                    msg: "是否删除所选条目？",
                    bSubmit: "删除",
                    bCancel: "取消",
                    url:"<?php echo U('Home/Part1/edit_1_2');?>",
                    recreateForm: true,
                    beforeShowForm : function(e) {
                        var form = $(e[0]);
                        if(form.data('styled')) return false;

                        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                        style_delete_form(form);

                        form.data('styled', true);
                    },
                    onClick : function(e) {
                        alert(1);
                    }
                }
            ).jqGrid('navButtonAdd',pager_selector,{
                caption:"",
                buttonicon:"icon-undo red", 
                position: "first", 
                title:"取消校对信息", 
                cursor: "pointer",
                onClickButton: function(e) {
                    var ids = $(grid_selector).jqGrid('getGridParam','selarrrow');
                    if(ids.length == 0){
                        alert(" 请选择需要取消校对信息的条目");
                    }else{
                        if (confirm("是否取消校对选中条目？")) {
                            $.ajax({
                                type: "POST",
                                url: "<?php echo U('Home/Part1/edit_1_2');?>",
                                data: {
                                    oper:"undo",
                                    id:ids,
                                },
                                dataType: "json",
                                success: function(data){
                            $(grid_selector).trigger("reloadGrid"); 
                                }
                            });
                        }
                    }
                
                }, })

            function style_edit_form(form) {
                //enable datepicker on "sdate" field and switches for "stock" field
                form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
                    .end().find('input[name=stock]')
                          .addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');

                //update buttons classes
                var buttons = form.next().find('.EditButton .fm-button');
                buttons.addClass('btn btn-sm').find('[class*="-icon"]').remove();//ui-icon, s-icon
                buttons.eq(0).addClass('btn-primary').prepend('<i class="icon-ok"></i>');
                buttons.eq(1).prepend('<i class="icon-remove"></i>')

                buttons = form.next().find('.navButton a');
                buttons.find('.ui-icon').remove();
                buttons.eq(0).append('<i class="icon-chevron-left"></i>');
                buttons.eq(1).append('<i class="icon-chevron-right"></i>');		
            }

            function style_delete_form(form) {
                var buttons = form.next().find('.EditButton .fm-button');
                buttons.addClass('btn btn-sm').find('[class*="-icon"]').remove();//ui-icon, s-icon
                buttons.eq(0).addClass('btn-danger').prepend('<i class="icon-trash"></i>');
                buttons.eq(1).prepend('<i class="icon-remove"></i>')
            }

            function style_search_filters(form) {
                form.find('.delete-rule').val('X');
                form.find('.add-rule').addClass('btn btn-xs btn-primary');
                form.find('.add-group').addClass('btn btn-xs btn-success');
                form.find('.delete-group').addClass('btn btn-xs btn-danger');
            }
            function style_search_form(form) {
                var dialog = form.closest('.ui-jqdialog');
                var buttons = dialog.find('.EditTable')
                buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'icon-retweet');
                buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'icon-comment-alt');
                buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'icon-search');
            }

            function beforeDeleteCallback(e) {
                var form = $(e[0]);
                if(form.data('styled')) return false;

                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_delete_form(form);

                form.data('styled', true);
            }

            function beforeEditCallback(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            }



            //it causes some flicker when reloading or navigating grid
            //it may be possible to have some custom formatter to do this as the grid is being created to prevent this
            //or go back to default browser checkbox styles for the grid
            function styleCheckbox(table) {
            /**
                $(table).find('input:checkbox').addClass('ace')
                .wrap('<label />')
                .after('<span class="lbl align-top" />')


                $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
                .find('input.cbox[type=checkbox]').addClass('ace')
                .wrap('<label />').after('<span class="lbl align-top" />');
            */
            }


            //unlike navButtons icons, action icons in rows seem to be hard-coded
            //you can change them like this in here if you want
            function updateActionIcons(table) {
                /**
                var replacement = 
                {
                    'ui-icon-pencil' : 'icon-pencil blue',
                    'ui-icon-trash' : 'icon-trash red',
                    'ui-icon-disk' : 'icon-ok green',
                    'ui-icon-cancel' : 'icon-remove red'
                };
                $(table).find('.ui-pg-div span.ui-icon').each(function(){
                    var icon = $(this);
                    var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
                    if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
                })
                */
            }

            //replace icons with FontAwesome icons like above
            function updatePagerIcons(table) {
                var replacement = 
                {
                    'ui-icon-seek-first' : 'icon-double-angle-left bigger-140',
                    'ui-icon-seek-prev' : 'icon-angle-left bigger-140',
                    'ui-icon-seek-next' : 'icon-angle-right bigger-140',
                    'ui-icon-seek-end' : 'icon-double-angle-right bigger-140'
                };
                $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
                    var icon = $(this);
                    var $class = $.trim(icon.attr('class').replace('ui-icon', ''));

                    if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
                })
            }

            function enableTooltips(table) {
                $('.navtable .ui-pg-button').tooltip({container:'body'});
                $(table).find('.ui-pg-div').tooltip({container:'body'});
            }

            //var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');


        });
        
        
        $(window).resize(function() {
                jQuery("#grid-table").setGridWidth($('.page-header').width()-10); 
        });
        
        
    </script>

	</div>
</body>
</html>