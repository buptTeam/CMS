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
	<div class="container">
		<div class="wrap bg-grey">
			<div class="sidebar">
				<ul>
					<?php for($i=0;$i<count($source_nav);$i++){?>
					<li><a class="on child" href="javascript:;"> <?php echo $source_nav[$i]["source_category"]; ?>
							<ul>
								<?php for($j=0;$j<count($source_nav[$i]["mes"]);$j++){?>
								<li><a
									href="
									<?php
									$path=$source_nav[$i]["mes"][$j]["path"];
									$path=str_replace("},{","/",$path);
									$path=str_replace("{0","",$path);
									$path=str_replace("}","/",$path);
									echo base_url()."page/getsource".$path.$source_nav[$i]["mes"][$j]["classid"];?>"><?php echo $source_nav[$i]["mes"][$j]["source_category"];?>
								</a></li>
								<?php }?>
							</ul>
					</a>
					</li>
					<?php }?>
				</ul>
			</div>
			<div id="t" class="main">
				<div class="search">
					<select class="select">
						<option value="">所有类型</option>
					</select> <a href="javascript:;" class="btn btn-green">搜索</a>
				</div>
				<?php for($i=0;$i<count($content);$i++){?>
				<?php if(count($content[$i]["mes"])>0){?>
				<div class="hd">
					<?php echo $content[$i]["source_type"]?>
				</div>
				<div class="bd">
					<?php $mes=$content[$i]["mes"];
					  for($j=0;$j<count($mes);$j++){?>
					<div class="item">
						<div class="tit">
							<?php echo $mes[$j]["title"];?>
						</div>
						<div class="img">
							<img
								src="<?php echo base_url()."attachments".$mes[$j]["pic"]; ?>"
								alt="" /> <span class="mask"> <?php if($mes[$j]["source_category"]=="video"){?>
								<a href="<?php echo $mes[$j]["video_link"];?>">查看</a> <a
								href="<?php echo $mes[$j]["video_link"];?>">下载</a> <?php } if($mes[$j]["source_category"]=="file"){?>
								<a
								href="<?php  echo base_url()."attachments".$mes[$j]["file"];?>">查看</a>
								<a download="<?php echo $mes[$j]["file"];?>"
								href="<?php  echo base_url()."attachments".$mes[$j]["file"];?>">下载</a>
								<?php }?>
							</span>
						</div>
						<div class="con">
							<?php echo $mes[$j]["introduction"];?>
						</div>
					</div>
					<?php }?>
				</div>
				<?php }
}?>
			</div>
		</div>
	</div>


	<script type="text/javascript"
		src="<?php echo base_url(); ?>frontend/js/jquery.min.js"></script>
		<script type="text/javascript"
		src="<?php echo base_url(); ?>frontend/js/head.js"></script>
</body>
</html>
















