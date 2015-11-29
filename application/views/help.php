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
			<ul>	
	<li>
		<a class="on " href="#monitor">
			性能监控
		</a>
	</li>
	
<?php foreach ($first as $first_item): ?>
	<li>
		<a href="<?php echo base_url()."page/getpage/".$first_item['parentid']."/".$first_item['classid']; ?>">
			<?php echo $first_item['help_category']?>
		</a>
	</li>
<?php endforeach; ?>
</ul>
		</div>
			
	</div>
	<div class="container">
		<div class="wrap bg-grey">
			<div class="sidebar">
				<ul>
				<?php foreach ($second as $second_item): ?>
	<li>
						<a class="on child" href="javascript:;">
							<?php echo $second_item["help_category"];?>
							<ul>
							<?php foreach ($second_item['mes'] as $mes_item): ?>
								<li><a href="javascript:;"><?php echo $mes_item["help_category"];?></a></li>
								<?php endforeach; ?>
							</ul>
						</a>
					</li>
<?php endforeach; ?>
					
					
				</ul>
			</div>
			<div class="main">
				
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
















