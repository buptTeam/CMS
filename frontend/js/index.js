/**
* @desc 	公用的头部与底部
* @author 	wangyanhong
* @date 	2015-08-22
* @version 	v0.0.1
*/
$(function(){
	// slider
	$('div.slider .wrap').flexslider({
		animation: "slide"
	});
	// 帮助点击事件
	var $drop = $('div.drop','div.top');
	$('div.top').on('click', 'li.help', function(e){
		e.stopPropagation();
		$(this).addClass('on').find('.drop').show();
	}).on('click', 'div.drop a', function(e){
		e.stopPropagation();
		$drop.hide();
		$('li.help').removeClass('on');
	});
	$('body').on('click', function(e){
		$drop.hide();
		$('li.help').removeClass('on');
	});

});