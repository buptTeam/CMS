/**
* @desc 	公用的头部与底部
* @author 	wangyanhong
* @date 	2015-08-22
* @version 	v0.0.1
*/
$(function(){
	
	var curHash = document.location.hash.substring(1);	
	if(curHash.indexOf('source')>-1){
		$('div.nav').hide();
	}else{
		$('div.nav').show();
	}
	// 如果有子集时打开子集
	$('div.sidebar>ul>li>a').on('click', function(){
		var $this = $(this);
		$('ul','div.sidebar>ul>li').hide();
		if($this.hasClass('child')){
			var index = $this.index();
			$this.parent().find('ul').show();
		}
	});
	// 帮助导航点击效果
	// $('a', 'div.nav').on('click', function(){
	// 	$('a', 'div.nav').removeClass('on');
	// 	$(this).addClass('on');
	// });
});