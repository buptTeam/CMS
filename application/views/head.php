<div class="top">
	<div class="wrap">
		<a href="javascript:;" class="help-logo"><img src="<?php echo base_url(); ?>frontend/img/help-logo.jpg" /></a>
		<ul>
			<li class="help">
				<a href="javascript:;">帮助</a>
				<div class="drop">
					<?php foreach ($help as $help_item): ?>
					<a href="<?php echo base_url()."page/getpage/".$help_item["classid"] ;?>"><?php echo $help_item["help_category"];?></a>
					<?php endforeach; ?>
				</div>
			</li>
			<li><a href="<?php echo base_url()."page/getsource";?>">资源</a></li>
			<li><a href="javascript:;">社区</a></li>
		</ul>
	</div>	
</div>
