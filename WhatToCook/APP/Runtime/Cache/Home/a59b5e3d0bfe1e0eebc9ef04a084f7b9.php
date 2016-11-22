<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   	<title>做啥吃</title>
    <!-- basic styles -->
	<link href="/whattocook/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="/whattocook/Public/assets/css/font-awesome.min.css" />

	<!--[if IE 7]>
	  <link rel="stylesheet" href="/whattocook/Public/assets/css/font-awesome-ie7.min.css" />
	<![endif]-->

	<!-- page specific plugin styles -->
	
    <link rel="stylesheet" href="/whattocook/Public/assets/css/jquery-ui-1.10.3.custom.min.css" />
    <link rel="stylesheet" href="/whattocook/Public/assets/css/datepicker.css" />
    <link rel="stylesheet" href="/whattocook/Public/assets/css/select2.css" />
    <link rel="stylesheet" href="/whattocook/Public/assets/css/bootstrap-tagsinput.css" />


	<!-- fonts -->

	<!-- ace styles -->

	<link rel="stylesheet" href="/whattocook/Public/assets/css/ace.min.css" />
	<link rel="stylesheet" href="/whattocook/Public/assets/css/ace-rtl.min.css" />
	<link rel="stylesheet" href="/whattocook/Public/assets/css/ace-skins.min.css" />

	<!-- admin styles -->
	<link rel="stylesheet" href="/whattocook/Public/assets/css/home.css" />

	<!--[if lte IE 8]>
	  <link rel="stylesheet" href="/whattocook/Public/assets/css/ace-ie.min.css" />
	<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->

	<script src="/whattocook/Public/assets/js/ace-extra.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 eleme<extend name="Public:home_base" />nts and media queries -->

	<!--[if lt IE 9]>
	<script src="/whattocook/Public/assets/js/html5shiv.js"></script>
	<script src="/whattocook/Public/assets/js/respond.min.js"></script>
	<![endif]-->
</head>


<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
        
                <div class="navbar-header pull-left">
					<a href="<?php echo U('Home/Index/index');?>" class="navbar-brand">
						<small>
							<i class="icon-food"></i>
							做啥吃 - 为选择恐惧症厨艺爱好者解决心头大患
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->
                
            </div>
            
            <!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">
        <div class="row">
	<div class="col-md-offset-3 col-md-6" id="content">
	<form class="form-horizontal" method="post" action="<?php echo U('Home/Index/recipeDetail');?>">

		<div class="form-group">
			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="classification1">大类：</label>

			<div class="col-xs-12 col-sm-9">
				<div class="clearfix">
				<select id="classification1" name="classification1" class="select2">
					<option value="">没啥要求</option>

					<?php if(is_array($level1)): foreach($level1 as $key=>$val): ?><option value="<?php echo ($key); ?>"><?php echo ($val); ?></option><?php endforeach; endif; ?>
				</select>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="classification2">小类：</label>

			<div class="col-xs-12 col-sm-9">
				<div class="clearfix">
				<select id="classification2" name="classification2" class="select2">
					<option value="">没啥要求</option>

				</select>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="introduction">包含：</label>
			<div class="col-sm-9">
				<input type="text" id="tags1" name="tags1" data-role="tagsinput" class="col-xs-12 col-sm-9" placeholder="输入后按回车分割                " />
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">忌口：</label>

			<div class="col-sm-9">
				<input type="text" id="tags2" name="tags2" data-role="tagsinput" class="col-xs-12 col-sm-9" placeholder="输入后按回车分割                "/>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-12" id="btn_area">
				<input type="submit" class="btn btn-info" type="button" value="开始选菜">
			</div>
		</div>

	</form>
	</div>
</div>
    </div>
    <!-- /.container -->

	<!-- basic scripts -->
		
		<script type="text/javascript">
       
        </script>

		<!--[if !IE]> -->

		<script src="/whattocook/Public/assets/js/jquery-2.0.3.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>

<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/whattocook/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/whattocook/Public/assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/whattocook/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="/whattocook/Public/assets/js/bootstrap.min.js"></script>
		<script src="/whattocook/Public/assets/js/typeahead-bs2.min.js"></script>
        <!-- page specific plugin scripts -->
        
  	<script>
		$(".select2").css('width','200px');
        
		
		var level2 = <?php echo ($level2); ?>;
		$('#classification1').change(function(){ 
            $("#classification2").empty();
			jQuery("#classification2").append("<option value=''>没啥要求</option>");
            level1_code = $(this).children('option:selected').val();
            for(var key in level2[level1_code]){
                 jQuery("#classification2").append("<option value='"+key+"'>"+level2[level1_code][key]+"</option>");
            }
        })
	</script>
   
    <script src="/whattocook/Public/assets/js/jquery.maskedinput.min.js"></script>
    <script src="/whattocook/Public/assets/js/select2.min.js"></script>
    <script src="/whattocook/Public/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="/whattocook/Public/assets/js/bootstrap-tagsinput.min.js"></script>


		<!--[if lte IE 8]>
		  <script src="/whattocook/Public/assets/js/excanvas.min.js"></script>
		<![endif]-->

		
		<!-- ace scripts -->

		<script src="/whattocook/Public/assets/js/ace-elements.min.js"></script>
		<script src="/whattocook/Public/assets/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->
		

		<script type="text/javascript">
			
        </script>

</body>

</html>