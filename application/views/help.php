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
	</div>
	<div class="nav">
		<div class="wrap">
		</div>
			
	</div>
	<div class="container">
		<div class="wrap bg-grey">
			<div class="sidebar">
			</div>
			<div class="main">
				<iframe class="iframe" src="log.html" scrolling="auto" frameborder="0"></iframe>
			</div>
		</div>
	</div>
	<div class="footer clear">
	</div>
	<script type="text/html" id="model">
		<ul>
			{{each item}}
			<li>
				<a {{if $index == 0}}class="on {{if $value.child}}child{{/if}}"{{/if}} href="{{$value.url||'javascript:;'}}">
					{{$value.txt}}
				</a>
			</li>
			{{/each}}
		</ul>
	</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>frontend/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>frontend/js/template.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>frontend/js/head.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>frontend/js/help.js"></script>
</body>
</html>
















