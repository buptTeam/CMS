<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url(); ?>frontend/css/reset.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url(); ?>frontend/css/style.css">
</head>
<body class="source">
	<div class="header">
		<?php include 'head.php';?>
	</div>
	<div class="search">
		<select class="select">
			<option value="">所有类型</option>
		</select> <a href="javascript:;" class="btn btn-green">搜索</a>
	</div>
	<div class="sidebar">
		<ul>
		<?php for($i=0;$i<count($source_nav);$i++){?>
			<li><a class="on child" href="javascript:;"> <?php echo $source_nav[$i]["source_category"]; ?>
					<ul>
					<?php for($j=0;$j<count($source_nav[$i]["mes"]);$j++){?>
						<li><a href="
							<?php
							$path=$source_nav[$i]["mes"][$j]["path"];
							$path=str_replace("},{","/",$path);
							$path=str_replace("{0","",$path);
							$path=str_replace("}","/",$path);
							echo base_url()."page/getsource".$path.$source_nav[$i]["mes"][$j]["classid"];?>"><?php echo $source_nav[$i]["mes"][$j]["source_category"];?></a></li>
						<?php }?>
					</ul>
			</a>
			</li>
			<?php }?>
		</ul>
	</div>

	<div id="t">
		<div class="hd">title</div>
		<div class="bd">
			<div class="item">
				<div class="tit">教学视频-2015-12-12</div>
				<div class="img">
					<img src="<?php echo base_url(); ?>frontend/img/banner01.jpg"
						alt="" /> <span class="mask"> <a href="javascript:;">查看</a> <a
						href="javascript:;">下载</a>
					</span>
				</div>
				<div class="con">资源技术资源技术资源技术资源技术资源技术资源技术</div>
			</div>
			<div class="item">
				<div class="tit">教学视频-2015-12-12</div>
				<div class="img">
					<img src="<?php echo base_url(); ?>frontend/img/banner01.jpg"
						alt="" /> <span class="mask"> <a href="javascript:;">查看</a> <a
						href="javascript:;">下载</a>
					</span>
				</div>
				<div class="con">资源技术资源技术资源技术资源技术资源技术资源技术</div>
			</div>
			<div class="item">
				<div class="tit">教学视频-2015-12-12</div>
				<div class="img">
					<img src="<?php echo base_url(); ?>frontend/img/banner01.jpg"
						alt="" /> <span class="mask"> <a href="javascript:;">查看</a> <a
						href="javascript:;">下载</a>
					</span>
				</div>
				<div class="con">资源技术资源技术资源技术资源技术资源技术资源技术</div>
			</div>
		</div>
		<div class="hd">title</div>
		<div class="bd">
			<div class="item">
				<div class="tit">教学视频-2015-12-12</div>
				<div class="img">
					<img src="<?php echo base_url(); ?>frontend/img/banner01.jpg"
						alt="" /> <span class="mask"> <a href="javascript:;">查看</a> <a
						href="javascript:;">下载</a>
					</span>
				</div>
				<div class="con">资源技术资源技术资源技术资源技术资源技术资源技术</div>
			</div>
			<div class="item">
				<div class="tit">教学视频-2015-12-12</div>
				<div class="img">
					<img src="<?php echo base_url(); ?>frontend/img/banner01.jpg"
						alt="" /> <span class="mask"> <a href="javascript:;">查看</a> <a
						href="javascript:;">下载</a>
					</span>
				</div>
				<div class="con">资源技术资源技术资源技术资源技术资源技术资源技术</div>
			</div>
			<div class="item">
				<div class="tit">教学视频-2015-12-12</div>
				<div class="img">
					<img src="<?php echo base_url(); ?>frontend/img/banner01.jpg"
						alt="" /> <span class="mask"> <a href="javascript:;">查看</a> <a
						href="javascript:;">下载</a>
					</span>
				</div>
				<div class="con">资源技术资源技术资源技术资源技术资源技术资源技术</div>
			</div>
		</div>
	</div>

	<script type="text/javascript"
		src="<?php echo base_url(); ?>frontend/js/jquery.min.js"></script>
</body>
</html>
















