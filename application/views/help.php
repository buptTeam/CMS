<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>frontend/css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>frontend/css/style.css">
</head>
<body>
	<div class="header">
		<?php include 'head.php';?>
	</div>
	<div class="nav">
		<div class="wrap">
			<?php include 'mainnav.php';?>
		</div>
			
	</div>
	<div class="container">
		<div class="wrap bg-grey">
			<div class="sidebar">
				<ul>
					<li>
						<a class="on" href="javascript:;">
							txt
						</a>
					</li>
					<li>
						<a class="child" href="javascript:;">
							txt
							<ul>
								<li><a href="javascript:;">aaaaaa</a></li>
								<li><a href="javascript:;">aaaaaa</a></li>
								<li><a href="javascript:;">aaaaaa</a></li>
							</ul>
						</a>
					</li>
				</ul>
			</div>
			<div class="main">
				<iframe class="iframe" src="" scrolling="auto" frameborder="0"></iframe>
			</div>
		</div>
	</div>
	<div class="footer clear">
	</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>frontend/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>frontend/js/head.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>frontend/js/help.js"></script>
</body>
</html>
















