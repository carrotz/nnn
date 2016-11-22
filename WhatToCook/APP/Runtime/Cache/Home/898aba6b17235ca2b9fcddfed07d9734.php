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
	<div class="col-md-12" id="content2">
	<form class="form-horizontal">
        <?php if($found == 1): ?><div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="recipe_name">分类：</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <div class="recipe_info">
                            <?php echo ($class1); ?> &gt;&gt; <?php echo ($class2); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="recipe_name">菜谱名称：</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <div id="recipe_name" class="recipe_info">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="feature">特性：</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <div id="feature" class="recipe_info">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="material">原料：</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <div id="material" class="recipe_info">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="flavour">调料：</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <div id="flavour" class="recipe_info">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="recipe">做法：</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <div id="recipe" class="recipe_info">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="hit">提示：</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <div id="hit" class="recipe_info">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="hit">更多做法：</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <div class="recipe_info">
                            <a href="http://www.douguo.com/search/recipe/<?php echo ($recipe_name); ?>" target="_blank">豆果</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="http://www.xiachufang.com/search/?keyword=<?php echo ($recipe_name); ?>" target="_blank">下厨房</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="http://www.haodou.com/search/recipe/<?php echo ($recipe_name); ?>" target="_blank">好豆</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="http://so.meishi.cc/?q=<?php echo ($recipe_name); ?>" target="_blank">美食杰</a>
                        </div>

                    </div>
                </div>
            </div>
		<?php else: ?>
           <h3>哎呀，条件太苛刻没找到合适的菜</h3><?php endif; ?>
		

		
		<div class="col-md-12" id="btn_area">
			<input type="button" id="back" class="btn btn-info"  value="返回">
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
        var found = <?php echo ($found); ?>;
        if(found == 1){
            var sel = <?php echo ($sel); ?>;
            $('#recipe_name').html(sel['recipe_name']);
            $('#feature').html(sel['feature']);
            $('#material').html(sel['material']);
            $('#flavour').html(sel['flavour']);
            $('#recipe').html(sel['recipe']);
            $('#hit').html(sel['hit']);
        }
		$('#back').click(function(){
			location.href = "<?php echo U('Home/Index/index');?>";
		})
	</script>


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